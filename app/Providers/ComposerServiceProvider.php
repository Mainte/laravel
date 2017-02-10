<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(){
		$this->composeBottom();
        $this->composeUtente();
    }

    
    public function composeBottom(){
    	view()->composer('layouts.bottom', 'App\Http\Composers\BottomComposer');
    }

     public function composeUtente(){
        view()->composer('admin.utenti.modifica', 'App\Http\Composers\UtenteComposer');
        view()->composer('admin.utenti.ruolo', 'App\Http\Composers\UtenteComposer');
        view()->composer('admin.utenti.password', 'App\Http\Composers\UtenteComposer');
        view()->composer('admin.utenti.elimina', 'App\Http\Composers\UtenteComposer');
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
