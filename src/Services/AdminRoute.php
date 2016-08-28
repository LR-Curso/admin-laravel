<?php namespace Lrcurso\Admin\Services;


use Illuminate\Support\Facades\Route;

class AdminRoute
{
    public static function auth()
    {
        Route::group([
            'prefix' => "admin",
            'middleware' => 'web',
        ], function (){
            Route::get('login', '\\Lrcurso\\Admin\\Controllers\\AuthController@getLogin');
            Route::post('login', [
                'uses' => '\\Lrcurso\\Admin\\Controllers\\AuthController@postLogin',
                'as' => 'admin.login.post'
            ]);
            Route::post('logout', [
                'uses' => '\\Lrcurso\\Admin\\Controllers\\AuthController@logout',
                'as' => 'admin.login.logout'
            ]);
        });
    }
}