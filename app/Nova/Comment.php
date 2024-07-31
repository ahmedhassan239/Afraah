<?php

namespace App\Nova;

use App\Nova\Actions\ChangeStatus;
use Eminiarts\Tabs\TabsOnEdit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Kongulov\NovaTabTranslatable\TranslatableTabToRowTrait;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;
use Nikaia\Rating\Rating;
use Laravel\Nova\Fields\MorphTo;

class Comment extends Resource
{
    use TabsOnEdit;
    use TranslatableTabToRowTrait;
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Comment\Comment::class;


    public static function label() {
        return 'Comments';
    }

    public static $displayInNavigation = false;

    public static $group = 'Setting';
    public static function icon()
    {
        return '<img style="margin-right: .75rem;width: 20px;height: 20px;transform: translateY(3px);"  src="/icons/Comments.png" />';
    }

    /**
     * The columns that should be searched.
     *
     * @var array
     */

    public function title()
    {
        return $this->commentable->name;
    }
    public static $with = ['user'];

    public static $search = [
        'id','comment',
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
            ID::make(__('ID'), 'id')->sortable(),
            BelongsTo::make('User')->canSee(function ($request) {
                return  super_global_admin(Auth::user());
            })->readonly(),
            MorphTo::make(__('Article'),'commentable')->canSee(function ($request){
                return  super_global_admin(Auth::user());
            })->onlyOnIndex(),
            Textarea::make('Comment')->readonly(),

            Text::make(__('Date'), 'updated_at')
                ->displayUsing(function($updatedAt) {
                    return $updatedAt ? $updatedAt->diffForHumans() : $this->created_at->diffForHumans();
                })
                ->sortable()
                ->exceptOnForms(),

            Boolean::make(__('Status'),'status')->canSee(function ($request) {
                return  super_global_admin(Auth::user());
            }),

            // Defining a custom style for the index page. stars
            Rating::make('Rate')->min(0)->max(5)->increment(1)->hideRating()
                ->withStyles([
                    'star-size' => 15,
                    'rounded-corners' => true,
                ])->onlyOnIndex()->sortable(),


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

        if (super_global_admin(Auth::user())){
            return [
                new ChangeStatus,
            ];
        }else{
            return [];
        }
    }
}
