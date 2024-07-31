<?php

namespace App\Nova;

use App\Nova\Actions\ChangeFeature;
use App\Nova\Actions\ChangeStatus;
use Eminiarts\Tabs\Tabs;
use Eminiarts\Tabs\TabsOnEdit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Infinety\Filemanager\FilemanagerField;
use Kongulov\NovaTabTranslatable\NovaTabTranslatable;
use Kongulov\NovaTabTranslatable\TranslatableTabToRowTrait;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Panel;
use MrMonat\Translatable\Translatable;
use OptimistDigital\MultiselectField\Multiselect;
use OptimistDigital\NovaSortable\Traits\HasSortableRows;
use Waynestate\Nova\CKEditor;
use Whitecube\NovaFlexibleContent\Flexible;

class Blog extends Resource
{
    use TabsOnEdit;
    use TranslatableTabToRowTrait;
    use HasSortableRows;
    /**
     * The model the resource corresponds to
     *
     * @var string
     */
    public static $model = \App\Models\Blog::class;
//    public static $displayInNavigation = false;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    public static $group = '<span class="hidden">3</span>Content';
    public static function icon()
    {
        return '<img style="margin-right: .75rem;width: 20px;height: 20px;transform: translateY(3px);"  src="/icons/Blog.png" />';
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
            ID::make()->sortable()->hideFromIndex(),

            new Tabs('Blogs',
                [
                    'Basic Information'=> array(
                        NovaTabTranslatable::make([
                            Text::make('Name','name')
                                ->sortable()
                                ->rules('required_lang:ar', 'max:255'),
                            Slug::make('Slug')
                                ->from('Name')
                                ->sortable()
                                ->rules('required_lang:ar'),
                            CKEditor::make('Description')->rules('required_lang:ar')->hideFromIndex(),
                        ]),
                            BelongsTo::make('Country'),
                            Boolean::make('Status'),
                            Boolean::make('Feature'),

                    ),
                    'Related Pages' => [
                        Heading::make('Choose Related Pages'),
                        Multiselect::make('Related Blogs')->options(
                            \App\Models\Blog::where('status',1)->pluck('name', 'id')
                        )->reorderable()->hideFromIndex(),
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
    public function filters(Request $request): array
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
