<?php

namespace App\Nova;

use ChrisWare\NovaBreadcrumbs\Traits\Breadcrumbs;
use Illuminate\Support\Facades\Auth;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Hidden;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Infinety\Filemanager\FilemanagerField;
use Laravel\Nova\Resource as NovaResource;
use Laravel\Nova\Http\Requests\NovaRequest;
use Kongulov\NovaTabTranslatable\NovaTabTranslatable;
use Laravel\Nova\Fields\Code;
use NovaAjaxSelect\AjaxSelect;
use SaintSystems\Nova\ResourceGroupMenu\DisplaysInResourceGroupMenu;


abstract class Resource extends NovaResource
{

    use DisplaysInResourceGroupMenu;
    use Breadcrumbs;

    /**
     * Build an "index" query for the given resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query;
    }

    /**
     * Build a Scout search query for the given resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @param  \Laravel\Scout\Builder  $query
     * @return \Laravel\Scout\Builder
     */
    public static function scoutQuery(NovaRequest $request, $query)
    {
        return $query;
    }

    /**
     * Build a "detail" query for the given resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function detailQuery(NovaRequest $request, $query)
    {
        return parent::detailQuery($request, $query);
    }

    /**
     * Build a "relatable" query for the given resource.
     *
     * This query determines which instances of the model may be attached to other resources.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function relatableQuery(NovaRequest $request, $query)
    {
        return parent::relatableQuery($request, $query);
    }

    public function relations(){
        return[
            BelongsTo::make('Category')->default(Auth::user()->category_id)->hideFromIndex()->withMeta(['extraAttributes' => [
                'readonly' => admin(Auth::user()) || super_global_admin(Auth::user()) ? false : true
            ]])->canSee(function ($request) {
                return admin(Auth::user()) || super_global_admin(Auth::user()) ;
            }),
            AjaxSelect::make('Service','service_id')
                ->default(Auth::user()->service_id)->hideFromIndex()->withMeta(['extraAttributes' => [
                    'readonly' => admin(Auth::user()) || super_global_admin(Auth::user()) ? false : true
                ]])
                ->get('/api/category/{category}')
                ->parent('category')->canSee(function ($request) {
                    return admin(Auth::user()) || super_global_admin(Auth::user()) ;
                }),

            BelongsTo::make('Country')->default(Auth::user()->country_id)->withMeta(['extraAttributes' => [
                'readonly' => admin(Auth::user()) || super_global_admin(Auth::user()) ? false : true
            ]])->canSee(function ($request) {
                return admin(Auth::user()) || super_global_admin(Auth::user()) ;
            }),
            AjaxSelect::make('City','city_id')
                ->get('/api/country/{country}')
                ->parent('country')->default(function ($request) {
                    return $request->user()->id;
                })->canSee(function ($request) {
                    return admin(Auth::user()) || super_global_admin(Auth::user()) ;
                }),
        ];
    }
    public function seo()
    {
        return[
            NovaTabTranslatable::make([
                Text::make('Page Title','seo_title')->hideFromIndex(),
                Text::make('Meta Keywords','seo_keywords')->hideFromIndex(),
                Text::make('Robots','seo_robots')->hideFromIndex(),
                Textarea::make('Meta Description','seo_description')->hideFromIndex(),
                Text::make('Facebook Title','og_title')->hideFromIndex(),
                Textarea::make('Facebook Description')->hideFromIndex(),
                Text::make('Twitter Title')->hideFromIndex(),
                Textarea::make('Twitter Description')->hideFromIndex(),
            ]),
            FilemanagerField::make('Facebook Image')->hideFromIndex(),

            FilemanagerField::make('Twitter Image')->hideFromIndex(),
        ];
    }

    public function seoSchema(){
        return[
            Code::make('SEO Schema','seo_schema')->hideFromIndex(),
        ];
    }
    public function hidden_fields(){
        return [
            Hidden::make('User', 'user_id')->default(function ($request) {
                return $request->user()->id;
            }),
            Hidden::make('Country', 'country_id')->default(function ($request) {
                return $request->user()->country_id;
            })->canSee(function ($request) {
                return Auth::user()->is_admin == 0 ;
            }),
            Hidden::make('City', 'city_id')->default(function ($request) {
                return $request->user()->city_id;
            })->canSee(function ($request) {
                return Auth::user()->is_admin == 0 ;
            }),
            Hidden::make('Category', 'category_id')->default(function ($request) {
                return $request->user()->category_id;
            })->canSee(function ($request) {
                return Auth::user()->is_admin == 0 ;
            }),
            Hidden::make('Service', 'service_id')->default(function ($request) {
                return $request->user()->service_id;
            })->canSee(function ($request) {
                return Auth::user()->is_admin == 0 ;
            }),
        ];
    }
    public function images(){
        return [
            NovaTabTranslatable::make([
                Text::make('Banner Alt','alt')->hideFromIndex(),
                Text::make('Thumb Alt')->hideFromIndex(),

            ]),
            FilemanagerField::make('Thumb')->displayAsImage()->hideFromIndex(),
            FilemanagerField::make('Banner')->displayAsImage()->hideFromIndex(),
        ];
//        ->privateFiles()
//            ->folder(function() {
//                return auth()->user()->id;
//            })
    }

    public function hasOffer(): array
    {
        return[
            Number::make('Offer Percentage','offer_percentage')->hideFromIndex(),
            Boolean::make('Has Offer','has_offer')->hideFromIndex(),

        ];
    }

}
