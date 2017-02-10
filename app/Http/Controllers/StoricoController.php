<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Storico;

class StoricoController extends Controller
{
    public function index(){
    	$r['storico']=
    		Storico::select('storico.created_at', 'storico.evento', 'storico.ip', 'storico.utente')
    		->orderby('created_at', 'desc')
    		->orderby('id', 'desc')
    		->limit('50')
    		->get();
    	return view('admin.storico.index', $r);
    }

    public function cerca(Request $request){
    	$request->flash();
        $r['storico']=
    		Storico::select('storico.created_at', 'storico.evento', 'storico.ip', 'storico.utente')
    		->where('ip', 'like', '%'.$request->ip.'%')
    		->where('utente', 'like', '%'.$request->utente.'%')
    		->where('evento', 'like', '%'.$request->evento.'%')
    		->orderby('created_at', 'desc')
    		->orderby('id', 'desc')
    		->get();
    	return view('admin.storico.index', $r);
    }
}
