<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Azienda;

class AziendaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function Index(){
        $r['azienda']=Azienda::first();
        return view('admin.azienda.index', $r);    
    }

    public function Modifica(){
    	$r['azienda']=Azienda::first();
    	return view('admin.azienda.modifica', $r);
    }
    
	public function Aggiorna(Request $request){
        $data=Azienda::first();
        $data->ragione_sociale=$request->ragione_sociale;
        $data->partita_iva=$request->partita_iva;
        $data->codice_fiscale=$request->codice_fiscale;
        $data->indirizzo=$request->indirizzo;
        $data->cap=$request->cap;
        $data->localita=$request->localita;
        $data->provincia=$request->provincia;
        $data->telefono=$request->telefono;
        $data->fax=$request->fax;
        $data->cellulare=$request->cellulare;
        $data->email=$request->email;
        $data->web=$request->web;
        if($data->isDirty()){
            $data->save();
            return back()->with('info', trans('messaggi.aggiornato'));
        }
        else return back()->with('info', trans('messaggi.nessun_cambiamento'));
    }
    
}
