@extends('layouts.app')

@section('title') Storico @endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <form method="POST" action="{{url()->current()}}">
                {{csrf_field()}}

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6">
                                <h4><strong>Cerca</strong></h4>
                            </div>
                            <div class="col-xs-6 text-right">
                                <button title="Cerca" type="submit" class="btn btn-default btn-info"><i class="fa fa-btn fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="ip">IP</label>
                            <input class="form-control" type="text" id="ip" name="ip" value="{{old('ip')}}">
                        </div>
                        <div class="form-group">
                            <label for="utente">Utente</label>
                            <input class="form-control" type="text" id="utente" name="utente" value="{{old('utente')}}">
                        </div>
                        <div class="form-group">
                            <label for="evento">Evento</label>
                            <input class="form-control" type="text" id="evento" name="evento" value="{{old('evento')}}">
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-9">
            @include('common.info')
            <div class="panel panel-default">
                <div class="panel-heading">
                	<h4><strong>Storico</strong></h4>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td class="col-md-3"><strong>Data e ora</strong></td>
                                <td class="col-md-1"><strong>IP</strong></td>
                                <td class="col-md-2"><strong>Utente</strong></td>
                                <td class="col-md-6"><strong>Descrizione</strong></td>
                            </tr>
                        @if($storico->isEmpty())
                            <tr><td>{{trans('messaggi.nessun_risultato')}}</td></tr>
                        @else
                            @foreach($storico as $s)
                                <tr>
                                    <td class="col-md-3 text-nowrap">{{vw_timestamp($s->created_at)}}</td>
                                    <td class="col-md-1 text-nowrap">{{$s->ip}}</td>
                                    <td class="col-md-2 text-nowrap">{{$s->utente}}</td>
                                    <td class="col-md-6">{{$s->evento}}</td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
