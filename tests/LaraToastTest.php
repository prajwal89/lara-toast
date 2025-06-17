<?php

namespace Prajwal\LaraToast\Tests;

class LaraToastTest extends TestCase
{
    /** @test */
    public function test_it_can_render_the_toast_component()
    {
        $view = $this->blade('<x-lara-toast::toast type="success" message="Saved!" />');

        $view->assertSee('Saved!');
        $view->assertSee('bg-green-500'); // Tailwind class for success
    }

    /** @test */
    public function test_it_defaults_to_info_if_type_is_not_given()
    {
        $view = $this->blade('<x-lara-toast::toast message="Info message" />');

        $view->assertSee('Info message');
        $view->assertSee('bg-blue-500');
    }
}
