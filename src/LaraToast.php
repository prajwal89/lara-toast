<?php

declare(strict_types=1);

namespace Prajwal89\LaraToast;

use Illuminate\Support\Facades\Session;

class LaraToast
{
    protected bool $isPersistent = false;

    protected array $toast = [
        'type' => 'info',
        'title' => 'Title',
        'description' => 'Description',
        'autoCloseInMs' => 5000,
    ];

    /**
     * Mark the toast as persistent, preventing auto-close.
     */
    public function persistent(): self
    {
        $this->isPersistent = true;
        $this->toast['autoCloseInMs'] = null;
        $this->updateSession();

        return $this;
    }

    /**
     * Set an informational toast.
     */
    public function info(string $title, ?string $description = null, ?int $autoCloseInMs = 5000): self
    {
        return $this->setToast('info', $title, $description, $autoCloseInMs);
    }

    /**
     * Set a success toast.
     */
    public function success(string $title, ?string $description = null, ?int $autoCloseInMs = 5000): self
    {
        return $this->setToast('success', $title, $description, $autoCloseInMs);
    }

    /**
     * Set a danger toast.
     */
    public function danger(string $title, ?string $description = null, ?int $autoCloseInMs = 5000): self
    {
        return $this->setToast('danger', $title, $description, $autoCloseInMs);
    }

    /**
     * Set a toast with the given type and properties.
     */
    protected function setToast(string $type, string $title, ?string $description, ?int $autoCloseInMs): self
    {
        $this->toast = [
            'type' => $type,
            'title' => $title,
            'description' => $description,
            'autoCloseInMs' => $this->isPersistent ? null : $autoCloseInMs,
        ];

        $this->updateSession();

        return $this;
    }

    /**
     * Update the session with the current toast data.
     */
    protected function updateSession(): void
    {
        Session::flash('lara-toast', $this->toast);
    }
}
