<?php

namespace App\Observers;

use App\Azienda;
use App\Storico;

class AziendaObserver
{
    public function created(Azienda $azienda){
        Storico::log('Azienda "'.$azienda->ragione_sociale.'" creata');
    }

    public function updated(Azienda $azienda){
        Storico::log('Azienda "'.$azienda->ragione_sociale.'" aggiornata');
    }

    public function deleted(Azienda $azienda){
        Storico::log('Azienda "'.$azienda->ragione_sociale.'" eliminata');
    }
}