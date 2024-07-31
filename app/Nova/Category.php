<?php

namespace App\Nova;

use App\Nova\Actions\ChangeFeature;
use App\Nova\Actions\ChangeStatus;
use Illuminate\Support\Facades\Auth;
use Kongulov\NovaTabTranslatable\NovaTabTranslatable;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Panel;
use Eminiarts\Tabs\Tabs;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\Text;
use Eminiarts\Tabs\TabsOnEdit;
use MrMonat\Translatable\Translatable;
use Infinety\Filemanager\FilemanagerField;
use Laravel\Nova\Http\Requests\NovaRequest;
use Waynestate\Nova\CKEditor;
use Whitecube\NovaFlexibleContent\Flexible;
use Kongulov\NovaTabTranslatable\TranslatableTabToRowTrait;
use OptimistDigital\NovaSortable\Traits\HasSortableRows;

class Category extends Resource
{
    use TabsOnEdit;
    use TranslatableTabToRowTrait;

    use HasSortableRows;
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Category::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';
    public static $group = '<span class="hidden">2</span>Fundamentals';
    public static function icon()
    {
        return '<img style="margin-right: .75rem;width: 20px;height: 20px;transform: translateY(3px);"  src="/icons/Category.png" />';
    }

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id','name','slug'
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
            new Tabs(
                'Category',
                [
                    ID::make(__('ID'), 'id')->sortable(),

                    'Basic Information' => array(
                        NovaTabTranslatable::make([
                            Text::make('Name'),
                            Slug::make('Slug')
                                ->from('Name')
                                ->sortable()

                                ->rules('required_lang:ar', 'max:255'),
                            CKEditor::make('Description')->hideFromIndex(),
                        ]),
                        BelongsTo::make('Country'),
                        Boolean::make('Status')->canSee(function ($request) {
                            return admin(Auth::user()) || super_global_admin(Auth::user());
                        }),
                    ),
                    'Gallery' => [
                        FilemanagerField::make('Thumb')->displayAsImage()->hideFromIndex(),
                        FilemanagerField::make('Banner')->displayAsImage()->hideFromIndex(),
                        NovaTabTranslatable::make([
                            Text::make('Thumb Alt','thumb_alt')->hideFromIndex(),
                            Text::make('Banner Alt','banner_alt')->hideFromIndex(),
                        ]),
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
        return  get_action(Auth::user());

    }
}
