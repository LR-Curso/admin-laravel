[![Latest Stable Version](https://poser.pugx.org/lrcurso/admin-laravel/v/stable)](https://packagist.org/packages/lrcurso/admin-laravel)
[![Total Downloads](https://poser.pugx.org/lrcurso/admin-laravel/downloads)](https://packagist.org/packages/lrcurso/admin-laravel)
[![Latest Unstable Version](https://poser.pugx.org/lrcurso/admin-laravel/v/unstable)](https://packagist.org/packages/lrcurso/admin-laravel)
[![License](https://poser.pugx.org/lrcurso/admin-laravel/license)](https://packagist.org/packages/lrcurso/admin-laravel)
[![composer.lock](https://poser.pugx.org/lrcurso/admin-laravel/composerlock)](https://packagist.org/packages/lrcurso/admin-laravel)
[![Coverage Status](https://coveralls.io/repos/github/LR-Curso/admin-laravel/badge.svg?branch=master)](https://coveralls.io/github/LR-Curso/admin-laravel?branch=master)
[![Build Status](https://travis-ci.org/LR-Curso/admin-laravel.svg?branch=master)](https://travis-ci.org/LR-Curso/admin-laravel)
[![Issue Count](https://codeclimate.com/github/LR-Curso/admin-laravel/badges/issue_count.svg)](https://codeclimate.com/github/LR-Curso/admin-laravel)

# Admin Laravel
Generate admin for Laravel

###Installation

```
composer require lrcurso/admin-laravel
```

Or manually by modifying `composer.json` file:

``` json
{
    "require": {
        "lrcurso/admin-laravel": "0.*"
    }
}
```

run `composer install`

Then add Service provider to `config/app.php`

``` php
    'providers' => [
        // ...
        Lrcurso\Admin\Providers\AdminServiceProvider::class,
        Kris\LaravelFormBuilder\FormBuilderServiceProvider::class,
    ]
```

And Facade (also in `config/app.php`)

``` php
    'aliases' => [
        // ...
        'FormBuilder' => Kris\LaravelFormBuilder\Facades\FormBuilder::class
    ]

```


And add Middleware to `app/Http/Kernel.php`
~~~ php
    $routeMiddleware => [
        //...
        'auth.admin' => \Lrcurso\Admin\Middleware\Authenticate::class,
    ]
~~~

##TODO

- create Units Tests
- create documentation (how to use)
- add config for modifier the dashboard home (default: "DashBoardControler@index")
- add config for modifier the route root (default: "\admin")
