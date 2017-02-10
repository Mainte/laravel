<?php

namespace App\Observers;

use App\User as Utente;
use App\Storico;
use App\Events\UtenteUpdated;

class UtenteObserver
{
    public function created(Utente $utente){
        Storico::log('Utente "'.$utente->name.'" creato');
    }

    public function updated(Utente $utente){
        Storico::log('Utente "'.$utente->name.'" aggiornato');
    }

    public function deleted(Utente $utente){
        Storico::log('Utente "'.$utente->name.'" eliminata');
    }
}