<?php

namespace App\Nova;

use App\Nova\Actions\ChangeFeature;
use App\Nova\Actions\ChangeStatus;
use Eminiarts\Tabs\Tabs;
use Illuminate\Support\Facades\Auth;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Code;
use Laravel\Nova\Fields\Text;
use Eminiarts\Tabs\TabsOnEdit;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Http\Requests\NovaRequest;
use Kongulov\NovaTabTranslatable\NovaTabTranslatable;
use Kongulov\NovaTabTranslatable\TranslatableTabToRowTrait;
use Laravel\Nova\Panel;

class GlobalSeo extends Resource
{
    use TabsOnEdit;
    use TranslatableTabToRowTrait;
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\GlobalSeo::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';
     public static $group  = 'Setting';
    public static function icon()
    {
        return '<img style="margin-right: .75rem;width: 20px;height: 20px;transform: translateY(3px);"  src="/icons/Icon-27.png" />';
    }

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id','seo_title'
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make(__('ID'), 'id')->sortable()->hideFromIndex(),

            new Tabs('Global Seo Settings',
            [

                'Seo'=> array(
                    BelongsTo::make('Country'),
                    NovaTabTranslatable::make([
                        Text::make('Author')->hideFromIndex(),
                        Text::make('Revisit After')->hideFromIndex(),
                        Text::make('Canonical Url')->hideFromIndex(),
                        Text::make('Page Title','seo_title'),
                        Text::make('Meta Keywords','seo_keywords')->hideFromIndex(),
                        Text::make('Robots','seo_robots')->hideFromIndex(),
                        Textarea::make('Meta Description','seo_description')->hideFromIndex(),
                    ])
                ),

                'Facebook'=>[
                    NovaTabTranslatable::make([
                        Text::make('Facebook Site Name'),
                        Text::make('Facebook Admins')->hideFromIndex(),
                        Text::make('Facebook Page Id')->hideFromIndex(),
                        Text::make('Facebook Image')->hideFromIndex(),
                        Textarea::make('Facebook Description')->hideFromIndex(),
                        Code::make('Facebook Advert Pixel Tag (Used Within "head" tag)','facebook_advert_pixel_tag')->language('javascript')->hideFromIndex(),
                    ])
                ],

                'Twitter'=>[
                    NovaTabTranslatable::make([
                        Text::make('Twitter Site'),
                        Text::make('Twitter Title')->hideFromIndex(),
                        Text::make('Twitter Card')->hideFromIndex(),
                        Text::make('Twitter Image')->hideFromIndex(),
                        Textarea::make('Twitter Description')->hideFromIndex(),
                    ])
                ],


                'Google'=>[
                    NovaTabTranslatable::make([
                        Text::make('Google Site Verification')->hideFromIndex(),
                        Code::make('Google Tag Manager (Used Within "Header" tag)','google_tag_manager_header')->language('javascript')->hideFromIndex(),
                        Code::make('Google Tag Manager (Used Within "Body" tag))','google_tag_manager_body')->language('javascript')->hideFromIndex(),
                        Code::make('Google analytics - Website tracking (Used Within "Header" tag)','google_analytics')->language('javascript')->hideFromIndex(),
                    ])
                ],

                'Global Keys '=>[
                    NovaTabTranslatable::make([
                        Text::make('Yahoo Key')->hideFromIndex(),
                        Text::make('Yandex Verification')->hideFromIndex(),
                        Text::make('Microsoft Validate')->hideFromIndex(),
                        Text::make('Pingback Url')->hideFromIndex(),
                    ])
                ],

                'Global Codes '=>[
                    NovaTabTranslatable::make([
                        Code::make('Alexa Code (Used Within "head" tag)','alexa_code')->language('javascript')->hideFromIndex(),
                        Code::make('Live chat tag (Used Within "Body" tag)','live_chat_tag')->language('javascript')->hideFromIndex(),
                        Code::make('Footer script (Used Within "Body" tag)','footer_script')->language('javascript')->hideFromIndex(),
                    ])
                ],
                'SEO Schema' => [
                    new Panel('SEO Schema', $this->seoSchema()),
                ],

            ]),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
       return get_action(Auth::user());
    }
}
