<?php

namespace EnesEkinci\ConfirmModal\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class ConfirmHost extends Component
{
    public bool $open = false;

    public string $title = '';

    public string $message = '';

    public string $confirmText = '';

    public string $cancelText = '';

    public string $event = '';

    /** @var array<string, mixed> */
    public array $payload = [];

    public string $tone = 'danger';

    #[On('confirm')]
    public function openConfirm(
        string $message,
        string $event,
        string $title = '',
        string $confirmText = '',
        string $cancelText = '',
        string $tone = 'danger',
        array $payload = [],
    ): void {
        $this->title = $title !== '' ? $title : __('confirm-modal::messages.title');
        $this->message = $message;
        $this->event = $event;
        $this->payload = $payload;
        $this->tone = in_array($tone, ['danger', 'primary'], true) ? $tone : 'danger';
        $this->confirmText = $confirmText !== '' ? $confirmText : __('confirm-modal::messages.confirm');
        $this->cancelText = $cancelText !== '' ? $cancelText : __('confirm-modal::messages.cancel');
        $this->open = true;
    }

    public function cancel(): void
    {
        $this->resetState();
    }

    public function confirm(): void
    {
        $event = $this->event;
        $payload = $this->payload;
        $this->resetState();

        if ($event !== '') {
            $this->dispatch($event, ...$payload);
        }
    }

    protected function resetState(): void
    {
        $this->open = false;
        $this->title = '';
        $this->message = '';
        $this->confirmText = '';
        $this->cancelText = '';
        $this->event = '';
        $this->payload = [];
        $this->tone = 'danger';
    }

    public function render(): View
    {
        return view('confirm-modal::livewire.host');
    }
}
