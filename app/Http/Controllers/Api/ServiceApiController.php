<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceApiController extends Controller
{

    public function getCategoryServices($category_id, $country_id, $lang)
    {
        app()->setLocale($lang);

        // Construct the query
        $query = Service::select(
            'services.id as service_id',
            'services.name as service_name',
            'services.slug as service_slug',
            'services.thumb as service_thumb',
            'services.thumb_alt as service_thumb_alt',
            'services.sort_order',
            'categories.seo_title as category_seo_title',
            'categories.seo_keywords as category_seo_keywords',
            'categories.seo_robots as category_seo_robots',
            'categories.seo_description as category_seo_description',
            'categories.facebook_description as category_facebook_description',
            'categories.facebook_image as category_facebook_image',
            'categories.twitter_title as category_twitter_title',
            'categories.twitter_description as category_twitter_description',
            'categories.twitter_image as category_twitter_image',
            'categories.description as category_description',
            'categories.banner_alt as category_banner_alt',
            'categories.banner as category_banner',
            'countries.id as country_id',
            'countries.name as country_name',
            'countries.slug as country_slug',
            'categories.id as category_id',
            'categories.name as category_name',
            'categories.slug as category_slug'
        );

        $query->leftJoin('categories', 'services.category_id', '=', 'categories.id');
        $query->leftJoin('countries', 'services.country_id', '=', 'countries.id');

        // Applying filters
        if (is_numeric($category_id)) {
            $query->where('services.category_id', $category_id);
        } else {
            $query->whereRaw("(categories.slug like '%" . $category_id . "%')");
        }

        if (is_numeric($country_id)) {
            $query->where('services.country_id', $country_id);
        } else {
            $query->whereRaw("(countries.slug like '%" . $country_id . "%')");
        }

        $query->where('services.status', 1);

        // Execute the query
        $categories = $query->oldest('sort_order')->get();

        // Initialize arrays to hold the unique objects
        $uniqueCategories = array();
        $uniqueServices = array();
        $uniqueCountries = array();
        $uniqueSeo = array();

        // Iterate over the results
        foreach ($categories as $item) {
            $service_id = $item->service_id;
            $category_id = $item->category_id;
            $country_id = $item->country_id;

            // Add unique services
            if (!isset($uniqueServices[$service_id])) {
                $uniqueServices[$service_id] = [
                    'id' => $service_id,
                    'name' => $item->service_name,
                    'slug' => $item->service_slug,
                    'thumb' => asset('storage/' . $item->service_thumb),
                    'thumb_alt' => $item->service_thumb_alt,
                ];
            }

            // Add unique categories
            if (!isset($uniqueCategories[$category_id])) {
                $uniqueCategories[$category_id] = [
                    'id' => $category_id,
                    'name' => $item->category_name,
                    'slug' => $item->category_slug,
                    'description' => $item->category_description,
                    'banner' => asset('storage/' . $item->category_banner),
                    'banner_alt' => $item->category_banner_alt,
                ];
            }

            // Add unique countries
            if (!isset($uniqueCountries[$country_id])) {
                $uniqueCountries[$country_id] = [
                    'id' => $country_id,
                    'name' => $item->country_name,
                    'slug' => $item->country_slug,
                ];
            }

            // Add unique SEO data
            if (!isset($uniqueSeo[$category_id])) {
                $uniqueSeo[$category_id] = [
                    'title' => $item->category_seo_title,
                    'keywords' => $item->category_seo_keywords,
                    'robots' => $item->category_seo_robots,
                    'description' => $item->category_seo_description,
                    'facebook_description' => $item->category_facebook_description,
                    'facebook_image' => $item->category_facebook_image,
                    'twitter_title' => $item->category_twitter_title,
                    'twitter_description' => $item->category_twitter_description,
                    'twitter_image' => $item->category_twitter_image,
                ];
            }
        }

        // Return the response
        return response()->json([
            'data' => [
                'country' => array_values($uniqueCountries),
                'category' => array_values($uniqueCategories),
                'services' => array_values($uniqueServices),
                'seo' => array_values($uniqueSeo),
            ]
        ], 200);
    }
}
