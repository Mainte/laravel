@extends('layouts.app')

@section('title') Backup @endsection

@section('content')
<div class="container">
	<div id="filtro"></div>
    <div class="row">
        <div class="col-md-12">
            @include('common.info')
            <div class="panel panel-default">
                <div class="panel-heading">
                    <form method="POST" action="{{ url()->current() }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td class="col-md-11"><h4>Esegui un nuovo backup</h4></td>
                                    <td class="col-md-1 text-right">
                                        <button title="Esegui!" type="submit" id="esegui" name="esegui" class="btn btn-default btn-primary"><i class="fa fa-btn fa-arrow-circle-o-right"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
                <div class="panel-body">
                	<div class="table-responsive">
	                    <table class="table table-responsive">
	                        <tbody>
	                        	@if(count($backups))
		                            <tr>
		                                <td class="col-md-6"><strong>Backup disponibili</strong></td>
		                                <td class="col-md-3 text-right"><strong>Dimensione (KB)</strong></td>
		                                <td class="col-md-3 text-right"><strong>Data e ora</strong></td>
		                            </tr>
		                            @foreach($backups as $b)
		                                <tr>
		                                    <td class="col-md-5"><a title="Scarica backup" href="{{ url()->current().'/'.$b['nome'] }}">{{$b['nome']}}</a></td>
		                                    <td class="col-md-3 text-right">{{number_format(round($b['size']/1024), 0, '.', '.')}}</td>
		                                    <td class="col-md-3 text-right">{{$b['date']}}</td>
		                                </tr>
		                            @endforeach
		                        @else
			                        <tr>
			                        	<td class="col-md-12">Nessun backup disponibile</td>
			                        </tr>
		                        @endif
	                        </tbody>
	                    </table>
	                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
