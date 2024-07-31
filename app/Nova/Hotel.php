<?php

namespace App\Nova;

use App\Nova\Actions\ChangeFeature;
use App\Nova\Actions\ChangeStatus;
use IziDev\VCalendar\Attributes\HighlightAttributeVCalendar;
use IziDev\VCalendar\Popover\HoverPopoverVCalendar;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Panel;
use Eminiarts\Tabs\Tabs;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Code;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\Text;
use OptimistDigital\NovaSortable\Traits\HasSortableRows;
use Waynestate\Nova\CKEditor;
use Eminiarts\Tabs\TabsOnEdit;
use NovaAjaxSelect\AjaxSelect;
use Laravel\Nova\Fields\Hidden;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\BelongsTo;
use Illuminate\Support\Facades\Auth;
use IziDev\VCalendar\SuperDatePicker;
use MrMonat\Translatable\Translatable;
use Infinety\Filemanager\FilemanagerField;
use Laravel\Nova\Http\Requests\NovaRequest;
use Whitecube\NovaFlexibleContent\Flexible;
use Kongulov\NovaTabTranslatable\NovaTabTranslatable;
use Kongulov\NovaTabTranslatable\TranslatableTabToRowTrait;

class Hotel extends Resource
{
    use TabsOnEdit;
    use TranslatableTabToRowTrait;
    use HasSortableRows;
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */

    public static $model = \App\Models\Hotel::class;

    public static $group = '<span class="hidden">3</span>Wedding Halls';
    public static function canSort(NovaRequest $request, $resource)
    {
        // Do whatever here, ie:
        // return user()->isAdmin();
        // return $resource->id !== 5;
        return true;
    }
    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    public static $priority = 1;
    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id','name','slug'
    ];
    public static function icon()
    {
        return '<img style="margin-right: .75rem;width: 20px;height: 20px;transform: translateY(3px);"  src="/icons/Hotel.png" />';
    }
    public static function indexQuery(NovaRequest $request, $query)
    {
        if(Auth::user()->is_admin == 0){
            return $query->where('user_id', Auth::user()->id);
        }
    }
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
                'Hotels',
                [
                    'Basic Information' => array(
                        NovaTabTranslatable::make([
                            Text::make('Name'),
                            Slug::make('Slug')
                                ->from('Name')

                            ->hideFromIndex()
                            ->rules('required_lang:ar', 'max:255'),
                            CKEditor::make('Description')->hideFromIndex(),
                        ]),
                        Number::make('Price Starting From','price')->hideFromIndex(),
                        Number::make('Capacity')->hideFromIndex(),
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
                    'Halls' => [
                        Flexible::make('Hall')
                        ->addLayout('Hall', 'wysiwyg', [
                            Translatable::make('Hall Name'),
                            Text::make('Hall Slug'),
                            Translatable::make('Description')->trix()->hideFromIndex(),
                            Translatable::make('Hall Thumb Alt'),
                            Translatable::make('Hall Banner Alt'),
                            FilemanagerField::make('Hall Thumb')->displayAsImage()->privateFiles()
                                ->folder(function() {
                                    return auth()->user()->id;
                                })->hideFromIndex()->hideFromIndex(),
                            FilemanagerField::make('Hall Banner')->displayAsImage()->privateFiles()
                                ->folder(function() {
                                    return auth()->user()->id;
                                })->hideFromIndex()->hideFromIndex(),

                            Flexible::make('Hall Images')
                            ->addLayout('image', 'wysiwyg', [
                                FilemanagerField::make('Image')->displayAsImage()->privateFiles()
                                    ->folder(function() {
                                        return auth()->user()->id;
                                    })->hideFromIndex()->hideFromIndex(),
                                Translatable::make('Image Alt')
                            ])->confirmRemove()->button('Add Image'),

                            Number::make('Hall Capacity'),
                            Number::make('Hall Price'),

//                            SuperDatePicker::make(__("Birthdate"), 'birthdate')->attributeCalendar(
//                                (new HighlightAttributeVCalendar('red'))
//
//                                    ->popover(new HoverPopoverVCalendar("Creation Record Contact."))
//                            ),
                        ])->confirmRemove()->button('Add Hall'),

                    ],
                    'Location' => [
                        Translatable::make('Location Description','location')->hideFromIndex(),
                        Text::make('Location URL','location_url')->hideFromIndex(),
                    ],
                    'Offers' => [
                        Number::make('Discount')->hideFromIndex(),
                        Translatable::make('Offer Details')->hideFromIndex(),
                    ],
                    'Gallery' => [
                        new Panel('Gallery', $this->images()),
                        Flexible::make('Gallery')
                        ->addLayout('Gallery', 'wysiwyg', [
                            FilemanagerField::make('Image')->displayAsImage()->hideFromIndex(),
//                            ->privateFiles()
//                            ->folder(function() {
//                                return auth()->user()->id;
//                            })->hideFromIndex()
                            Translatable::make('Image Alt')
                        ])->confirmRemove()->button('Add Gallery')
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
        return get_action(Auth::user());

    }
}
