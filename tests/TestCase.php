<?php

namespace Prajwal\LaraToast\Tests;

use Orchestra\Testbench\TestCase as OrchestraTestCase;
use Prajwal89\LaraToast\LaraToastsServiceProvider;

abstract class TestCase extends OrchestraTestCase
{
    protected function getPackageProviders($app)
    {
        return [
            LaraToastsServiceProvider::class,
        ];
    }
}
