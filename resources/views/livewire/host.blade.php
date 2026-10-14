<div>
    @if ($open)
        <div style="position:fixed;inset:0;z-index:10001;display:flex;align-items:center;justify-content:center;padding:1rem;background:rgba(15,23,42,.55);backdrop-filter:blur(2px);"
            wire:click.self="cancel" role="dialog" aria-modal="true" aria-label="{{ $title }}">
            <div @click.stop class="w-full max-w-md overflow-hidden rounded-2xl bg-white shadow-2xl">
                <div class="border-b border-slate-100 px-5 py-4">
                    <h2 class="text-base font-semibold text-slate-900">{{ $title }}</h2>
                    <p class="mt-1 text-sm text-slate-600">{{ $message }}</p>
                </div>
                <div class="flex justify-end gap-2 px-5 py-4">
                    <button type="button" wire:click="cancel" class="rounded-xl border border-slate-200 bg-white px-3.5 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-50">
                        {{ $cancelText }}
                    </button>
                    <button type="button" wire:click="confirm" @class([
                        'rounded-xl px-3.5 py-2 text-sm font-semibold text-white',
                        'bg-red-700 hover:bg-red-800' => $tone === 'danger',
                        'bg-[#0b5cab] hover:bg-[#094a8c]' => $tone === 'primary',
                    ])>
                        {{ $confirmText }}
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>
