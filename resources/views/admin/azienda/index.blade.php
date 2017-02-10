@extends('layouts.app')

@section('title') Azienda @endsection

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
                                <td class="col-md-11"><h4><strong>Azienda</strong></h4></td>
                                <td class="col-md-1 text-right">
                                    <a title="Modifica" href="{{ url()->current().'/modifica' }}" class="btn btn-warning" role="button"><i class="fa fa-btn fa-pencil"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="panel-body">
                    <address>
                        <h4>{{$azienda->ragione_sociale}}</h4>
                        <em>{{ $azienda->indirizzo }} - {{ $azienda->cap }} {{ $azienda->localita }} ({{ $azienda->provincia }})</em><br>
                        <small>
                            Tel: {{$azienda->telefono}} - Fax: {{$azienda->fax}}<br>
                            Email: <a href="mailto:{{$azienda->email}}">{{$azienda->email}}</a> - Web: {{$azienda->web}}<br>
                            P.IVA: {{$azienda->partita_iva}} - Codice Fiscale: {{$azienda->codice_fiscale}}
                        </small>
                    </address>
                </div>
            </div>
        </div>
    </div>
@endsection
