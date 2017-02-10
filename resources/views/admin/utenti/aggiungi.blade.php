@extends('layouts.app')

@section('title') Aggiungi utente @endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @include('common.info')
            <form method="POST" action="{{ url()->current() }}">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    	<div class="row">
                            <div class="col-xs-6"><h4>Aggiungi utente</h4></div>
                            <div class="col-xs-6 text-right">
                                <a title="Indietro" href="{{ route('RUtenti') }}" class="btn btn-info" role="button"><i class="fa fa-btn fa-reply"></i></a>
                                <button title="Salva" type="submit" class="btn btn-default btn-success"><i class="fa fa-btn fa-save"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">       
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label for="nome">Nome e cognome</label>
                            <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome e cognome utente" value="{{ old('nome') }}" autofocus>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Indirizzo email valido" value="{{ old('email') }}">
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Inserisci la tua password" value="{{ old('password') }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="password_confirmation">Conferma password</label>
                                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Conferma la tua password" value="{{ old('password_confirmation') }}">
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <a title="Indietro" href="{{ route('RUtenti') }}" class="btn btn-info" role="button"><i class="fa fa-btn fa-reply"></i></a>
                                <button title="Salva" type="submit" name="salva" class="btn btn-default btn-success"><i class="fa fa-btn fa-save"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
