<?php
/**
 * Created by PhpStorm.
 * User: leand
 * Date: 09/07/2016
 * Time: 15:12.
 */

namespace Lrcurso\Admin\Providers;

use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../Config/lr-admin.php', 'lr-admin'
        );
    }

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'lrcurso_admin');
        $this->loadTranslationsFrom(__DIR__.'/../resources/langs', 'lrcurso_admin');

        $this->publishes([
            __DIR__.'/../resources/assets/' => public_path(''),
        ], 'public');

        $this->publishes([
            __DIR__.'/../Config/lr-admin.php' => config_path('lr-admin.php'),
        ], 'config');
    }
}
