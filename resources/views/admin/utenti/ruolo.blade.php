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
                                <a title="Indietro" href="{{ route('RUtenteModifica', ['id_utente' => $utente->id]) }}" class="btn btn-info" role="button"><i class="fa fa-btn fa-reply"></i></a>
                                <button title="Aggiorna" type="submit" class="btn btn-default btn-success"><i class="fa fa-btn fa-refresh"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">       
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="id_regola">Permessi accesso utente</label>
                                <select id="id_regola" name="id_regola" class="form-control">
                                    @foreach($regole as $r)
                                        <option value="{{$r->id}}" @if($r->id === $regola->id) selected="selected" @endif>{{$r->display_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <a title="Indietro" href="{{ route('RUtenteModifica', ['id_utente' => $utente->id]) }}" class="btn btn-info" role="button"><i class="fa fa-btn fa-reply"></i></a>
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
