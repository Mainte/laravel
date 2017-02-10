@extends('layouts.app')

@section('title') Utenti @endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @include('common.info')
            <div class="panel panel-default">
                <div class="panel-heading">
                	<table class="table">
                        <tbody>
                            <tr>
                                <td class="col-md-10"><h4>Utenti</h4></td>
                                <td class="col-md-2 text-right text-nowrap">
                                    <a title="Aggiungi" href="{{ url()->current().'/aggiungi' }}" class="btn btn-success" role="button"><i class="fa fa-btn fa-plus"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <tbody>
                        @foreach($utenti as $utente)
                            <tr>
                                <td class="col-md-9">{{$utente->name}}</td>
                                <td class="col-md-4 text-right text-nowrap">
                                    <a title="Modifica" href="{{ url()->current().'/'.$utente->id.'/modifica' }}" class="btn btn-warning" role="button"><i class="fa fa-btn fa-pencil"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
