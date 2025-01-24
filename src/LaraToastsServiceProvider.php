<?php

declare(strict_types=1);

namespace Prajwal89\LaraToast;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class LaraToastsServiceProvider extends ServiceProvider
{
    public function register() {}

    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'lara-toast');

        $this->publishes([
            __DIR__ . '/../public' => public_path('vendor/prajwal89/lara-toast'),
        ], 'lara-toast-assets');

        Blade::directive('laraToastJs', function () {
            return "<script src=\"{{ asset('/vendor/prajwal89/lara-toast/lara-toast.js') }}\" defer></script>";
        });

        Blade::directive('laraToastCSS', function () {
            return "<link href=\"{{ asset('/vendor/prajwal89/lara-toast/lara-toast.css') }}\" rel=\"stylesheet\">";
        });
    }
}
