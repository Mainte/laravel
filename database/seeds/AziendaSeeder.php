<?php

use Illuminate\Database\Seeder;

use App\Azienda;

class AziendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$d=new Azienda;
    	$d->ragione_sociale="Mainte S.r.l.";
    	$d->partita_iva="02010120992";
    	$d->codice_fiscale=NULL;
    	$d->indirizzo="Via Branega 42/6";
    	$d->cap="16157";
    	$d->localita="Genova";
    	$d->provincia="GE";
    	$d->telefono="0106973189";
    	$d->fax="0106672614";
    	$d->web="www.mainte.it";
    	$d->email="mainte@mainte.it";
        $d->save();
    }
}
