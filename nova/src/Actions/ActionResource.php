<?php

namespace Laravel\Nova\Actions;

use App\Nova\Filters\UserFilter;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\KeyValue;
use Laravel\Nova\Fields\MorphToActionTarget;
use Laravel\Nova\Fields\Status;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Resource;
use Titasgailius\SearchRelations\SearchesRelations;

class ActionResource extends Resource
{
    use SearchesRelations;

    public static $searchRelations = [
        'user' => ['name'],
    ];

    public static $search = [
        'id', 'name', 'status',
    ];
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = ActionEvent::class;

    /**
     * Indicates if the resource should be globally searchable.
     *
     * @var bool
     */
    public static $globallySearchable = false;

    /**
     * Indicates whether the resource should automatically poll for new resources.
     *
     * @var bool
     */
    public static $polling = true;

    /**
     * Determine if the current user can create new resources.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    public static function authorizedToCreate(Request $request)
    {
        return false;
    }

    /**
     * Determine if the current user can edit resources.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    public function authorizedToUpdate(Request $request)
    {
        return false;
    }

    /**
     * Determine if the current user can delete resources.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    public function authorizedToDelete(Request $request)
    {
        return false;
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
            ID::make('ID', 'id')->sortable(),
            Text::make(__('Action Name'), 'name', function ($value) {
                return __($value);
            })->sortable(),

            Text::make(__('Action Initiated By'), function () {
                return $this->user->name ?? $this->user->email ?? __('Nova User');
            }),

            MorphToActionTarget::make(__('Action Target'), 'target'),

            Status::make(__('Action Status'), 'status', function ($value) {
                return __(ucfirst($value));
            })->loadingWhen([__('Waiting'), __('Running')])->failedWhen([__('Failed')])->sortable(),

            $this->when(isset($this->original), function () {
                return KeyValue::make(__('Original'), 'original');
            }),

            $this->when(isset($this->changes), function () {
                return KeyValue::make(__('Changes'), 'changes');
            }),

            Textarea::make(__('Exception'), 'exception'),

            DateTime::make(__('Action Happened At'), 'created_at')->exceptOnForms()->sortable(),
        ];
    }

    /**
     * Build an "index" query for the given resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query->with('user');
    }

    /**
     * Determine if this resource is available for navigation.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    public static function availableForNavigation(Request $request)
    {
        return true;
    }



    /**
     * Determine if this resource is searchable.
     *
     * @return bool
     */
    public static function searchable()
    {
        return true;
    }


    public function filters(Request $request)
    {
        return [
           new UserFilter,
        ];
    }

    /**
     * Get the displayable label of the resource.
     *
     * @return string
     */
    public static function label()
    {
        return __('Actions');
    }

    public static $group = 'Setting';

    public static function icon()
    {
        return '<img style="margin-right: .75rem;width: 20px;height: 20px;transform: translateY(3px);"  src="/icons/Actions.png" />';
    }
    /**
     * Get the displayable singular label of the resource.
     *
     * @return string
     */
    public static function singularLabel()
    {
        return __('Action');
    }

    /**
     * Get the URI key for the resource.
     *
     * @return string
     */
    public static function uriKey()
    {
        return 'action-events';
    }
}
