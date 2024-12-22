<?php

namespace Prajwal89\LaraToast;

use Illuminate\Support\Facades\Session;

class LaraToast
{
    public function info(string $title, string $description = null, int $autoCloseInMs = 5000)
    {
        return session()->flash('lara-toast', [
            'type' => 'info',
            'title' => (string) $title,
            'description' => (string) $description,
            'autoCloseInMs' => (int) $autoCloseInMs
        ]);
    }

    public function success(string $title, string $description = null, int $autoCloseInMs = 5000)
    {
        return session()->flash('lara-toast', [
            'type' => 'success',
            'title' => (string) $title,
            'description' => (string) $description,
            'autoCloseInMs' => (int) $autoCloseInMs
        ]);
    }

    public function danger(string $title, string $description = null, int $autoCloseInMs = 5000)
    {
        return session()->flash('lara-toast', [
            'type' => 'danger',
            'title' => (string) $title,
            'description' => (string) $description,
            'autoCloseInMs' => (int) $autoCloseInMs
        ]);
    }
}
