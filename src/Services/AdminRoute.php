<?php

namespace Lrcurso\Admin\Services;

use Illuminate\Support\Facades\Route;

class AdminRoute
{
    public static function auth()
    {
        Route::group([
            'prefix' => 'admin',
        ], function () {
            Route::get('login', '\\Lrcurso\\Admin\\Controllers\\AuthController@getLogin');
            Route::post('login', [
                'uses' => '\\Lrcurso\\Admin\\Controllers\\AuthController@postLogin',
                'as' => 'admin.login.post',
            ]);
            Route::get('logout', [
                'uses' => '\\Lrcurso\\Admin\\Controllers\\AuthController@logout',
                'as' => 'admin.login.logout',
            ]);
        });
    }

    public static function admin(
        string $dashboard_action = '\\Lrcurso\\Admin\\Controllers\\DashboardController@index',
        string $prefix = 'admin',
        string $middleware = 'auth.admin'
    )
    {
        Route::group([
            'prefix' => $prefix,
            'middleware' => $middleware,
        ], function () use ($dashboard_action) {
            Route::get('/', $dashboard_action);

            foreach (config('lr-admin.controllers') as $controller) {
                Route::resource($controller::getRoute(), '\\'.$controller);
            }
        });
    }
}
