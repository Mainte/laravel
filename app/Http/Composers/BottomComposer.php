<?php

namespace App\Http\Composers;

use Illuminate\Contracts\View\View;

use App\Azienda;

class BottomComposer{

    public function compose(View $view){
    	$azienda=Azienda::first();
    	$view->with('azienda', $azienda);
    }
    
}