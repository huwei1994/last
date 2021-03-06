<?php

namespace Huwei1994\Last;

use Illuminate\Support\ServiceProvider;

class TestServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        if (! $this->app->routesAreCached()) {
            require __DIR__.'/routes.php';
        }
        $this->loadViewsFrom(__DIR__.'/views/scms/admin', 'last');
        $this->loadViewsFrom(__DIR__.'/views/scms/api', 'last');

        $this->publishes([
            __DIR__.'/views/scms' => base_path('resources/views/scms'),
            __DIR__.'/config' => config_path('filesystems.php'),
        ]);
        $this->publishes([
            __DIR__.'/public/assets/bootstrap' => public_path('assets/bootstrap'),
            __DIR__.'/public/assets/css' => public_path('assets/css'),
            __DIR__.'/public/assets/jquery' => public_path('assets/jquery'),
            __DIR__.'/public/assets/sass' => public_path('assets/sass'),
            __DIR__.'/public/assets/scms' => public_path('assets/scms'),
            __DIR__.'/public/assets/web' => public_path('assets/web'),
        ], 'public');


        //控制器和模型
        $this->publishes([
            __DIR__.'/Scms' => app_path('Http/Controllers/Scms'),
            __DIR__.'/Models' => app_path('Models'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //合并配置文件
        $this->mergeConfigFrom(
            __DIR__.'/config/filesystems.php', 'filesystems'
        );
    }
}
