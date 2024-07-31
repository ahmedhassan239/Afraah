<?php

namespace App\Providers;


use App\Nova\Metrics\Comments;
use Laravel\Nova\Nova;
use App\Nova\Metrics\Count;
use Anaseqal\NovaSidebarIcons\NovaSidebarIcons;
use Infinety\Filemanager\FilemanagerTool;
use Laravel\Nova\NovaApplicationServiceProvider;
use Silvanite\NovaToolPermissions\NovaToolPermissions;
use Spatie\BackupTool\BackupTool;

// use SaintSystems\Nova\ResourceGroupMenu\ResourceGroupMenu;


class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */


    public function boot()
    {
        parent::boot();
        Nova::sortResourcesBy(function ($resource) {
            return method_exists($resource, 'sortOrder') ?
                $resource::sortOrder() : $resource::label();
        });
    }
    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
                ->withAuthenticationRoutes()
                ->withPasswordResetRoutes()
                ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
//        Gate::define('Cannot-Access-Nova', function ($user) {
//           return abort(401);
//        });z
    }

    /**
     * Get the cards that should be displayed on the default Nova dashboard.
     *
     * @return array
     */

    protected function cards()
    {
        return [
            new Count(),
            (new Comments)->width('1/3')
                ->route('index', ['resourceName' => 'comments'])
            ->canSee(function (){
                return super_global_admin(auth()->user());
            }),
        ];
    }

    /**
     * Get the extra dashboards that should be displayed on the Nova dashboard.
     *
     * @return array
     */
    protected function dashboards()
    {
        return [

        ];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [
            \ChrisWare\NovaBreadcrumbs\NovaBreadcrumbs::make(),
            new NovaToolPermissions(),
            new NovaSidebarIcons,
            new FilemanagerTool(),
            (new BackupTool())->canSee(function (){
                return super_global_admin(auth()->user());
            }),
            \Mirovit\NovaNotifications\NovaNotifications::make(),



            // new \Czemu\NovaCalendarTool\NovaCalendarTool,

           //  new ResourceGroupMenu

        ];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    // public function register()
    // {
    //     //
    // }
    public function register()
    {
        Nova::sortResourcesBy(function ($resource) {
            return $resource::$priority ?? 99999;
        });
    }
}
