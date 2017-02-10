<?php

namespace App\Http\Composers;

use Illuminate\Contracts\View\View;

use App\User as Utente;
use Route;

class UtenteComposer{

    public function compose(View $view){
    	$utente=Utente::findOrFail(Route::current()->parameter('id_utente'));
    	$view->with('utente', $utente);
    }
    
}