<?php

namespace App\Nova;

use Eminiarts\Tabs\TabsOnEdit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Kongulov\NovaTabTranslatable\TranslatableTabToRowTrait;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\MorphTo;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;
use Nikaia\Rating\Rating;

class Inquiry extends Resource
{
    use TabsOnEdit;
    use TranslatableTabToRowTrait;
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Inquiry\Inquiry::class;

    public static function label() {
        return 'Inquiries';
    }
    public static $group = 'Setting';
    public static function icon()
    {
        return '<img style="margin-right: .75rem;width: 20px;height: 20px;transform: translateY(3px);"  src="/icons/Comments.png" />';
    }

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var array
     */
    public function title()
    {
        return $this->inquirable->name;
    }

    public static $with = ['user'];
    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id','name','email','message'
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
                return admin(Auth::user()) || super_global_admin(Auth::user());
            })->readonly(),
            Text::make('Name'),
            Text::make('Email'),
            MorphTo::make(__('Model'),'inquirable')->canSee(function ($request){
                return admin(Auth::user()) || super_global_admin(Auth::user());
            })->onlyOnIndex(),
            Textarea::make('Message')->readonly()->hideFromIndex(),
             Date::make(__('Wedding Date'))
                ->sortable()
                ->exceptOnForms(),
            Text::make(__('Inquiry Date'), 'created_at')
                ->displayUsing(function($created_at) {
                    return  $created_at->diffForHumans();
                })
                ->sortable()
                ->exceptOnForms()->hideFromIndex(),
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
