<?php

namespace App\Providers;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
       $this->routes(function () {
            Route::get('/', function(){
                return redirect()->route('installer.welcome.index');
            });

            Route::get('/db-test', function () {
                try {
                    \Illuminate\Support\Facades\DB::connection()->getPdo();
                    return "Database connection successful!";
                } catch (\Exception $e) {
                    return "Database connection failed: " . $e->getMessage();
                }
            });
       });
    }
}
