# Laravel Livewire Confirm Modal

Destructive-action confirm dialog for Livewire.

## Install

```bash
composer require enesekinci/laravel-livewire-confirm-modal:^1.0
```

Layout:

```blade
<livewire:confirm-modal />
```

## Usage

In a Livewire page:

```php
// Ask for confirmation
$this->dispatch('confirm',
    message: 'Bu kayıt silinsin mi?',
    event: 'delete-confirmed',
    payload: ['id' => $id],
);

#[On('delete-confirmed')]
public function deleteConfirmed(int $id): void
{
    // delete...
}
```

From Blade:

```blade
<button
    type="button"
    wire:click="$dispatch('confirm', { message: 'Silinsin mi?', event: 'delete-confirmed', payload: { id: {{ $id }} } })"
>
    Sil
</button>
```

## License

MIT
