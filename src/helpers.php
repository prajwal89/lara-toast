<?php

declare(strict_types=1);

use Prajwal89\LaraToast\LaraToast;

if (!function_exists('laraToast')) {
    function laraToast(): LaraToast
    {
        return new LaraToast;
    }
}
