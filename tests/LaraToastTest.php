<?php

namespace Prajwal89\LaraToast\Tests;

use PHPUnit\Framework\Attributes\Test;

class LaraToastTest extends TestCase
{
    #[Test]
    public function test_it_renders_the_toast_component_when_session_is_present()
    {
        session()->put('lara-toast', [
            'type' => 'success',
            'title' => 'Saved!',
            'description' => 'Your data has been saved.',
            'autoCloseInMs' => 5000,
        ]);

        $view = $this->blade('<x-lara-toast::toast />');

        $view->assertSee('Saved!');
        $view->assertSee('Your data has been saved.');
        $view->assertSee('success');
    }

    #[Test]
    public function test_it_does_not_render_when_session_is_not_present()
    {
        $view = $this->blade('<x-lara-toast::toast />');

        $this->assertEmpty((string) $view);
    }
}
