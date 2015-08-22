<?php

namespace Jackmarshall\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Storage;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'Jackmarshall\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot(Router $router)
    {
        //

        parent::boot($router);
        
        $router->model('game', 'Jackmarshall\Game');
        $router->model('map', 'Jackmarshall\Map');
        $router->model('player', 'Jackmarshall\Player');
        $router->model('report', 'Jackmarshall\Report');
        $router->model('round', 'Jackmarshall\Round');
        $router->model('scenario', 'Jackmarshall\Scenario');
        $router->model('tournament', 'Jackmarshall\Tournament');
        $router->model('user', 'Jackmarshall\User');
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {
        $router->group(['namespace' => $this->namespace], function ($router) {
			foreach(Storage::disk('routes')->files() as $file) {
				require app_path('Http/routes/'.$file);
			}
        });
    }
}
