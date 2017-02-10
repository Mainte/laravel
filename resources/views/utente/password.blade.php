@extends('layouts.app')

@section('title') Cambio password utente @endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @include('common.info')
            <form method="POST" action="{{ url()->current() }}">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    	<div class="row">
                            <div class="col-xs-6"><h4>Cambio password</h4></div>
                            <div class="col-xs-6 text-right">
                                <button title="Salva" type="submit" class="btn btn-default btn-success"><i class="fa fa-btn fa-save"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">       
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label for="password">Password corrente</label>
                            <input type="password" class="form-control" name="password_corrente" id="password_corrente" placeholder="Inserisci la password attuale" value="{{ old('password_corrente') }}">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Inserisci la nuova password" value="{{ old('password') }}">
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Conferma password</label>
                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Conferma la nuova password" value="{{ old('password_confirmation') }}">
                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-md-12 text-right">
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
