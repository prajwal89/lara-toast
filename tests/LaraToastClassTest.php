<?php

declare(strict_types=1);

namespace Prajwal89\LaraToast\Tests;

use PHPUnit\Framework\Attributes\Test;

use Illuminate\Support\Facades\Session;
use Prajwal89\LaraToast\LaraToast;

class LaraToastClassTest extends TestCase
{
    protected LaraToast $laraToast;

    protected function setUp(): void
    {
        parent::setUp();

        $this->laraToast = new LaraToast();
    }

    #[Test]
    public function test_it_can_create_an_info_toast(): void
    {
        $this->laraToast->info('Info Title', 'Info Description');

        $toast = Session::get('lara-toast');

        $this->assertEquals('info', $toast['type']);
        $this->assertEquals('Info Title', $toast['title']);
        $this->assertEquals('Info Description', $toast['description']);
        $this->assertEquals(5000, $toast['autoCloseInMs']);
    }

    #[Test]
    public function test_it_can_create_a_success_toast(): void
    {
        $this->laraToast->success('Success Title', 'Success Description');

        $toast = Session::get('lara-toast');

        $this->assertEquals('success', $toast['type']);
        $this->assertEquals('Success Title', $toast['title']);
        $this->assertEquals('Success Description', $toast['description']);
        $this->assertEquals(5000, $toast['autoCloseInMs']);
    }

    #[Test]
    public function test_it_can_create_a_danger_toast(): void
    {
        $this->laraToast->danger('Danger Title', 'Danger Description');

        $toast = Session::get('lara-toast');

        $this->assertEquals('danger', $toast['type']);
        $this->assertEquals('Danger Title', $toast['title']);
        $this->assertEquals('Danger Description', $toast['description']);
        $this->assertEquals(5000, $toast['autoCloseInMs']);
    }

    #[Test]
    public function test_it_can_create_a_persistent_toast(): void
    {
        $this->laraToast->info('Info Title', 'Info Description')->persistent();

        $toast = Session::get('lara-toast');

        $this->assertNull($toast['autoCloseInMs']);
    }

    #[Test]
    public function test_it_can_clear_the_toast(): void
    {
        $this->laraToast->info('Info Title', 'Info Description');

        $this->assertTrue(Session::has('lara-toast'));

        $this->laraToast->clear();

        $this->assertFalse(Session::has('lara-toast'));
    }
}
