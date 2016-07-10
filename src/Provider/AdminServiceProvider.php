<?php
/**
 * Created by PhpStorm.
 * User: leand
 * Date: 09/07/2016
 * Time: 15:12
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
    }
}