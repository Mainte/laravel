@extends('layouts.app')

@section('title') Modifica utente @endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            @include('common.info')
            <form method="POST" action="{{ url()->current() }}">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    	<div class="row">
                            <div class="col-sm-8"><h4>Modifica utente</h4></div>
                            <div class="col-sm-4 text-right text-nowrap">
                                <a title="Indietro" href="{{ route('RUtenti') }}" class="btn btn-info" role="button"><i class="fa fa-btn fa-reply"></i></a>
                                <a title="Assegna ruolo" href="{{ url()->route('RUtenti').'/'.$utente->id.'/ruolo' }}" class="btn btn-primary" role="button"><i class="fa fa-btn fa-hand-stop-o"></i></a>
                                <a title="Cambia password" href="{{ url()->route('RUtenti').'/'.$utente->id.'/password' }}" class="btn btn-danger" role="button"><i class="fa fa-btn fa-key"></i></a>
                                <a title="Elimina" href="{{ '/utenti/'.$utente->id.'/elimina' }}" class="btn btn-danger" role="button"><i class="fa fa-btn fa-trash"></i></a>
                                <button title="Aggiorna" type="submit" class="btn btn-default btn-success"><i class="fa fa-btn fa-refresh"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">       
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="row">
                            <div class="form-group col-md-5">
                                <label for="nome">Nome e cognome</label>
                                <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome e cognome utente" value="{{ old('nome', $utente->name) }}">
                            </div>
                            <div class="form-group col-md-7">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" name="email" id="email" placeholder="Indirizzo email valido" value="{{ old('email', $utente->email) }}">
                            </div>
                        </div>

                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <a title="Indietro" href="{{ route('RUtenti') }}" class="btn btn-info" role="button"><i class="fa fa-btn fa-reply"></i></a>
                                <a title="Assegna ruolo" href="{{ url()->route('RUtenti').'/'.$utente->id.'/ruolo' }}" class="btn btn-primary" role="button"><i class="fa fa-btn fa-hand-stop-o"></i></a>
                                <a title="Cambia password" href="{{ url()->route('RUtenti').'/'.$utente->id.'/password' }}" class="btn btn-danger" role="button"><i class="fa fa-btn fa-key"></i></a>
                                <a title="Elimina" href="{{ '/utenti/'.$utente->id.'/elimina' }}" class="btn btn-danger" role="button"><i class="fa fa-btn fa-trash"></i></a>
                                <button title="Aggiorna" type="submit" class="btn btn-default btn-success"><i class="fa fa-btn fa-refresh"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
