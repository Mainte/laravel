<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\User as Utente;
use App\Observers\UtenteObserver;

use App\Azienda;
use App\Observers\AziendaObserver;

class ObserverServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Utente::observe(UtenteObserver::class);
        Azienda::observe(AziendaObserver::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
