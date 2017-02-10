@extends('layouts.app')

@section('title') Modifica azienda @endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @include('common.info')
            <form method="POST" action="{{ url()->current() }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td class="col-md-10"><h4><strong>Dettagli azienda</strong></h4></td>
                                    <td class="col-md-2 text-right">
                                        <a title="Indietro" href="{{ url()->route('RAzienda')}}" class="btn btn-info" role="button"><i class="fa fa-btn fa-reply"></i></a>
                                        <button title="Aggiorna" type="submit" name="aggiorna" class="btn btn-default btn-success"><i class="fa fa-btn fa-refresh"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="ragione_sociale">Ragione sociale</label>
                            <input type="text" class="form-control" name="ragione_sociale" id="ragione_sociale" placeholder="Nominativo o ragione sociale" value="{{ old('ragione_sociale', $azienda->ragione_sociale) }}">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="partita_iva">Partita IVA</label>
                                    <input type="text" class="form-control" name="partita_iva" id="partita_iva" placeholder="Inserisci la partita iva" value="{{ old('partita_iva', $azienda->partita_iva) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="codice_fiscale">Codice fiscale</label>
                                    <input type="text" class="form-control" name="codice_fiscale" id="codice_fiscale" placeholder="Inserisci il codice fiscale" value="{{ old('codice_fiscale', $azienda->codice_fiscale) }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="indirizzo">Indirizzo</label>
                            <input type="text" class="form-control" name="indirizzo" id="indirizzo" placeholder="Inserisci un'indirizzo" value="{{ old('indirizzo', $azienda->indirizzo) }}">
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                      <label for="cap">Cap</label>
                                      <input type="text" class="form-control" name="cap" id="cap" placeholder="Inserisci cap" value="{{ old('cap', $azienda->cap) }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                      <label for="localita">Località</label>
                                      <input type="text" class="form-control" name="localita" id="localita" placeholder="Inserisci la località" value="{{ old('localita', $azienda->localita) }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="provincia">Provincia</label>
                                    <input type="text" class="form-control" name="provincia" id="provincia" placeholder="Inserisci la provincia" value="{{ old('provincia', $azienda->provincia) }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="telefono">Telefono</label>
                                    <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Inserisci un numero di telefono fisso" value="{{ old('telefono', $azienda->telefono) }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="fax">Fax</label>
                                    <input type="text" class="form-control" name="fax" id="fax" placeholder="Inserisci un numero di fax" value="{{ old('fax', $azienda->fax) }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="cellulare">Cellulare</label>
                                    <input type="text" class="form-control" name="cellulare" id="cellulare" placeholder="Inserisci un numero di telefono mobile" value="{{ old('cellulare', $azienda->cellulare) }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" name="email" id="email" placeholder="Inserisci un'indirizzo email" value="{{ old('email', $azienda->email) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="web">Web</label>
                                    <input type="text" class="form-control" name="web" id="web" placeholder="Inserisci il sito web" value="{{ old('web', $azienda->web) }}">
                                </div>
                            </div>
                        </div>
                    </div>
		                <div class="panel-footer text-right">
                        <a title="Indietro" href="{{ url()->route('RAzienda')}}" class="btn btn-info" role="button"><i class="fa fa-btn fa-reply"></i></a>
		                    <button title="Aggiorna" type="submit" name="aggiorna" class="btn btn-default btn-success"><i class="fa fa-btn fa-refresh"></i></button>
		                </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
