[![Latest Stable Version](https://poser.pugx.org/lrcurso/admin-laravel/v/stable)](https://packagist.org/packages/lrcurso/admin-laravel)
[![Total Downloads](https://poser.pugx.org/lrcurso/admin-laravel/downloads)](https://packagist.org/packages/lrcurso/admin-laravel)
[![Latest Unstable Version](https://poser.pugx.org/lrcurso/admin-laravel/v/unstable)](https://packagist.org/packages/lrcurso/admin-laravel)
[![License](https://poser.pugx.org/lrcurso/admin-laravel/license)](https://packagist.org/packages/lrcurso/admin-laravel)
[![composer.lock](https://poser.pugx.org/lrcurso/admin-laravel/composerlock)](https://packagist.org/packages/lrcurso/admin-laravel)

# Admin Laravel
Generate admin for Laravel

##Instalation
- composer require lrcurso/admin-laravel


### add ServiceProvider to config/app.php
~~~
Lrcurso\Admin\Providers\AdminServiceProvider::class
~~~

### add Middleware to $routeMiddleware in app/Http/Kernel.php
~~~
'auth.admin' => \Lrcurso\Admin\Middleware\Authenticate::class,
~~~

##TODO

1. create view for list data
2. create view for insert/update data
