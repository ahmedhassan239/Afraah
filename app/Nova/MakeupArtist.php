<?php

namespace App\Nova;

use Eminiarts\Tabs\Tabs;
use Eminiarts\Tabs\TabsOnEdit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Infinety\Filemanager\FilemanagerField;
use Kongulov\NovaTabTranslatable\NovaTabTranslatable;
use Kongulov\NovaTabTranslatable\TranslatableTabToRowTrait;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Code;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Panel;
use MrMonat\Translatable\Translatable;
use Waynestate\Nova\CKEditor;
use Whitecube\NovaFlexibleContent\Flexible;

class MakeupArtist extends Resource
{
    use TabsOnEdit;
    use TranslatableTabToRowTrait;
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\MakeupArtist::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';
    public static function icon()
    {
        return '<img style="margin-right: .75rem;width: 20px;height: 20px;transform: translateY(3px);"  src="/icons/Makeup-artist.png" />';
    }
    public static $search = [
        'id','name','slug'
    ];
    public static function indexQuery(NovaRequest $request, $query)
    {
        if(Auth::user()->is_admin == 0){
            return $query->where('user_id', Auth::user()->id);
        }
    }
    public static $group  = '<span class="hidden">4</span>Health & Beauty';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make(__('ID'), 'id')->sortable(),
            new Tabs(
                'Makeup Artist',
                [
                    'Basic Information' => array(
                        NovaTabTranslatable::make([
                            Text::make('Name'),
                            Slug::make('Slug')
                                ->from('Name')
                                ->sortable()
                                ->rules('required_lang:ar', 'max:255'),
                            CKEditor::make('Description')->hideFromIndex(),
                        ]),
                        new Panel('Basic Information', $this->relations()),
                        new Panel('Basic Information', $this->hidden_fields()),
                        new Panel('Basic Information', $this->hasOffer()),
                        Boolean::make('Status')->canSee(function ($request) {
                            return admin(Auth::user()) || super_global_admin(Auth::user());
                        }),
                        Boolean::make('Feature')->canSee(function ($request) {
                            return admin(Auth::user()) || super_global_admin(Auth::user());
                        }),
                    ),
                    'Contact' => [
                        Text::make('Email')->hideFromIndex(),
                        Number::make('phone')->hideFromIndex(),

                    ],
                    'Packages' => [
                        Flexible::make('Package')
                            ->addLayout('Package', 'wysiwyg', [
                                Translatable::make('Package Name')->rules('required'),
                                FilemanagerField::make('Package Image')->rules('required')->hideFromIndex(),
                                Translatable::make('Description')->rules('required')->hideFromIndex(),
                                Number::make('Package Price')->rules('required')
                            ])->confirmRemove()->button('Add Package')
                    ],
                    'Location' => [
                        Text::make('Location','location')->hideFromIndex(),
                        Code::make('Location URL','location_url')->hideFromIndex(),
                    ],
                    'Gallery' => [
                        new Panel('Gallery', $this->images()),
                        Flexible::make('Gallery')
                            ->addLayout('Gallery', 'wysiwyg', [
                                FilemanagerField::make('Image')->displayAsImage()->hideFromIndex(),
                            ])->confirmRemove()->button('Add Gallery')
//                            ->privateFiles()
//                            ->folder(function() {
//                                return auth()->user()->id;
//                            })
                    ],
                    'Seo' => [
                        new Panel('Seo', $this->seo()),
                    ],
                    'SEO Schema' => [
                        new Panel('SEO Schema', $this->seoSchema()),
                    ],
                ]
            )
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
        return [];
    }
}
