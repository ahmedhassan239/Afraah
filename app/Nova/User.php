<?php

namespace App\Nova;

use Eminiarts\Tabs\Tabs;
use Epartment\NovaDependencyContainer\NovaDependencyContainer;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Eminiarts\Tabs\TabsOnEdit;
use NovaAjaxSelect\AjaxSelect;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Gravatar;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\BelongsTo;
use Illuminate\Support\Facades\Auth;
use Laravel\Nova\Fields\BelongsToMany;
use Silvanite\NovaToolPermissions\Role;
use Laravel\Nova\Http\Requests\NovaRequest;
use Kongulov\NovaTabTranslatable\TranslatableTabToRowTrait;
use DigitalCreative\ConditionalContainer\ConditionalContainer;

class User extends Resource
{
    use TabsOnEdit;
    use TranslatableTabToRowTrait;
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\User::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';
    public static $group = 'User Setting';
    public static function indexQuery(NovaRequest $request, $query)
    {
        if(Auth::user()->is_admin == 0){
            return $query->where('id', Auth::user()->id);
        }
    }

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'name', 'email',
    ];
    public static function icon()
    {
        return '<img style="margin-right: .75rem;width: 20px;height: 20px;transform: translateY(3px);"  src="/icons/User.png" />';
    }
    public function authorizedToDelete(Request $request)
    {
        if (super_global_admin(Auth::user())){
            return true;
        }else{
            return false;
        }
    }

    public static function authorizedToCreate(Request $request)
    {
        if (super_global_admin(Auth::user())){
            return true;
        }else{
            return false;
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
            ID::make()->sortable(),

            Gravatar::make()->maxWidth(50),
            new Tabs(
                'Users',
                [
                    'Basic Information' => array(
                        Text::make('English Name','name')
                            ->sortable()
                            ->rules('required', 'max:255'),
                        Text::make('Arabic Name')
                            ->sortable()
                            // ->hideFromIndex()
                            ->rules('required', 'max:255'),

                        Number::make('Phone'),

                        Boolean::make('Is Admin','is_admin') ->canSee(function ($request) {
                            return  super_global_admin(Auth::user());
                        }),
                    ),
                    'Account Data' => [
                        Text::make('Email')
                            ->sortable()
                            ->rules('required', 'email', 'max:254')
                            ->creationRules('unique:users,email')
                            ->updateRules('unique:users,email,{{resourceId}}'),

                        Password::make('Password')
                            ->onlyOnForms()
                            ->hideFromIndex()
                            ->creationRules('required', 'string', 'min:8')
                            ->updateRules('nullable', 'string', 'min:8'),

                    ],
                    'Service' => [
                        BelongsTo::make('Service'),
                        BelongsTo::make('Country'),
                        AjaxSelect::make('City','city_id')
                            ->get('/api/country/{country}')
                            ->parent('country'),
                    ],
                    'Role' => [
                        BelongsToMany::make('Roles', 'roles', Role::class),
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
