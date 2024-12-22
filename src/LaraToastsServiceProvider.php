<?php

declare(strict_types=1);

namespace Prajwal89\LaraToast;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class LaraToastsServiceProvider extends ServiceProvider
{
    public function register() {}

    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'lara-toast');

        Blade::directive('laraToastCSS', function () {
            return '<style><?php echo laraToastCss(); ?></style>';
        });

        Blade::directive('laraToastJs', function () {
            return '<script><?php echo laraToastJs(); ?></script>';
        });
    }
}
