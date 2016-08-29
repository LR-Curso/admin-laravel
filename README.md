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
