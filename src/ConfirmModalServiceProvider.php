<?php

namespace EnesEkinci\ConfirmModal;

use EnesEkinci\ConfirmModal\Livewire\ConfirmHost;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class ConfirmModalServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'confirm-modal');
        $this->loadTranslationsFrom(__DIR__.'/../lang', 'confirm-modal');

        Livewire::component('confirm-modal', ConfirmHost::class);
        Livewire::component('confirm-host', ConfirmHost::class);

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/confirm-modal'),
            ], 'confirm-modal-views');

            $this->publishes([
                __DIR__.'/../lang' => lang_path('vendor/confirm-modal'),
            ], 'confirm-modal-lang');
        }
    }
}
