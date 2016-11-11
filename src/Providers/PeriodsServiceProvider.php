<?php

namespace Acacha\Periods\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class PeriodsServiceProvider.
 *
 * @package Acacha\Periods\Providers
 */
class PeriodsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishConfig();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        if (!defined('ACACHA_PERIODS_PATH')) {
            define('ACACHA_PERIODS_PATH', realpath(__DIR__.'/../../'));
        }
    }

    /**
     * Publish config
     */
    private function publishConfig()
    {
        $this->publishes([
            ACACHA_PERIODS_PATH . '/config/periods.php' => config_path('periods.php'),
        ],'acacha_periods');
    }
}
