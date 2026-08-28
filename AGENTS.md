# AGENTS.md — laravel-livewire-confirm-modal

## Purpose
Confirm dialog for destructive or irreversible Livewire actions.

## Hard rules for AI agents
1. Mount once in admin layout: `<livewire:confirm-modal />`.
2. For delete / irreversible actions, **always** confirm via this package.
3. Prefer:
   ```php
   $this->dispatch('confirm',
       message: '...',
       event: 'something-confirmed',
       payload: ['id' => $id],
   );
   ```
4. Do **not** use `window.confirm`, `alert`, or ad-hoc modals for deletes.
5. `wire:confirm` is acceptable only for tiny inline cases; prefer this modal for admin UX consistency.
6. Do not ask the user whether to confirm deletes — just wire confirm → handler.
7. After confirmed delete succeeds, dispatch a toast (`flash-toast` package).
