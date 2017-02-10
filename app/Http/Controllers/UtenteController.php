<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\admin\Utenti\SalvaRequest;
use App\Http\Requests\admin\Utenti\AggiornaRequest;
use App\Http\Requests\admin\Utenti\PasswordRequest;
use App\Http\Requests\admin\Utenti\RuoloRequest;

use Auth;
use App\User as Utente;
use App\Role as Regole;

class UtenteController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
    	$r['utenti']=Utente::orderBy('name')->get();
    	return view('admin.utenti.index', $r);
    }

    public function aggiungi(){
    	return view('admin.utenti.aggiungi');
    }

    public function salva(SalvaRequest $request){
    	$utente=new Utente;
    	$utente->name=$request->nome;
    	$utente->email=$request->email;
    	$utente->password=bcrypt($request->password);
    	if($utente->save()) $utente->attachRole(2); //Utente standard
    	return redirect()->route('RUtenti')->with('info', trans('messaggi.aggiunto'));
    }

    public function modifica($id){
    	return view('admin.utenti.modifica');
    }

    public function aggiorna(AggiornaRequest $request, $id){
        $utente=Utente::findOrFail($id);
        $utente->name=$request->nome;
        $utente->email=$request->email;

        if($utente->isDirty()){
            $utente->save();
            return back()->with('info', trans('messaggi.aggiornato'));
        }
        else return back()->with('info', trans('messaggi.nessun_cambiamento'));
    }

    public function ruolo($id){
        $r['regola']=Utente::findOrFail($id)->roles->first();
        $r['regole']=Regole::all();
        return view('admin.utenti.ruolo', $r);
    }

    public function ruoloAggiorna(RuoloRequest $request, $id){
        $utente=Utente::findOrFail($id);
        $regola=$utente->roles()->sync([$request->id_regola]);

        if(count($regola['attached'])) return back()->with('info', trans('messaggi.aggiornato'));
        else return back()->with('info', trans('messaggi.nessun_cambiamento'));
    }

    public function password($id){
        $r['utente']=Utente::findOrFail($id);
        return view('admin.utenti.password', $r);
    }

    public function passwordAggiorna(PasswordRequest $request, $id){
        $utente=Utente::findOrFail($id);
        $utente->password=bcrypt($request->password);
        $utente->save();
        return redirect()->route('RUtenti')->with('info', trans('messaggi.aggiornato'));
    }

    public function passwordUtente(){
        $r['utente']=Utente::findOrFail(Auth::user()->id);
        return view('utente.password', $r);
    }

    public function passwordUtenteAggiorna(PasswordRequest $request){
        $utente=Utente::findOrFail(Auth::user()->id);
        if($utente->password === bcrypt($request->password_corrente)){
            $utente->password=bcrypt($request->password);
            $utente->save();
            return back()->with('info', trans('messaggi.aggiornato')); 
        }
        else return back()->with('info', trans('messaggi.password_attuale')); 
    }  

    public function elimina($id){
    	$r['utente']=Utente::findOrFail($id);
    	return view('admin.utenti.elimina', $r);
    }

    public function distruggi($id){
    	if(Utente::all()->count() === 1) return redirect()->route('RUtenti')->with('error', ora().'Impossibile eliminare l\'unico utente disponibile.');
    	else{
    		$utente=Utente::findOrFail($id);
    		$utente->delete();
    		return redirect()->route('RUtenti')->with('info', trans('messaggi.eliminato'));
    	}
    }
}
