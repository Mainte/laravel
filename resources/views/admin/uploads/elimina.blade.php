@extends('layouts.app')

@section('title') Elimina file @endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <table class="table">
                            <tbody>
                                <tr>   
                                    <td class="col-md-10"><h4>Sei veramente sicuro di volere eliminare questo file?</h4></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td class="col-md-12"><strong>{{$file}}</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <form method="POST" class="form-inline" action="{{ url()->current() }}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <a title="Indietro" href="{{ url()->route('RUpload') }}" class="btn btn-info" role="button"><i class="fa fa-btn fa-reply"></i></a>
                                    <button title="Elimina" type="submit" name="si" class="btn btn-default btn-danger"><i class="fa fa-btn fa-trash"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
