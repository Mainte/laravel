<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Auth;
use Request;

class Storico extends Model
{
    protected $table = "storico";

    public static function log($evento){
    	$log=new Storico;
    	$log->ip=Request::ip();
    	$log->utente=Auth::check() ? Auth::user()->name : 'Sconosciuto';
    	$log->path=Request::path();
    	$log->evento=$evento;
    	$log->save();
    }
}
