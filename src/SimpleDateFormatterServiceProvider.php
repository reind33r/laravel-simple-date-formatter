<?php

namespace reind33r\SimpleDateFormatter;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Blade;

use reind33r\SimpleDateFormatter\SimpleDateFormatter;

class SimpleDateFormatterServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'reind33r');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'reind33r');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }

        $this->registerHelpers();

        Blade::directive('localized_date', function($date, $date_format='null', $time_format='null') {
            return "<?php echo localized_date({$date}, {$date_format}, {$time_format}); ?>";
        });
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/simpledateformatter.php', 'simpledateformatter');

        // Register the service the package provides.
        $this->app->singleton('simpledateformatter', function ($app) {
            return new SimpleDateFormatter;
        });
    }

    /**
     * Register helpers file
     */
    public function registerHelpers()
    {
        require_once('helpers.php');
    }


    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['simpledateformatter'];
    }
    
    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/simpledateformatter.php' => config_path('simpledateformatter.php'),
        ], 'simpledateformatter.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/reind33r'),
        ], 'simpledateformatter.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/reind33r'),
        ], 'simpledateformatter.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/reind33r'),
        ], 'simpledateformatter.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
