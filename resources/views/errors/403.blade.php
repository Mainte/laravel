@extends('layouts.app')

    @section('title') Diritti insufficienti @endsection

    @section('content')
    <div class="container">
        <div class="row">
            <div class="alert alert-danger col-md-12">
                <table class="table">
                    <tbody>
                        <tr>
                            <td class="col-md-11"><strong>{{trans('messages.forbidden')}}</strong></td>
                            <td class="col-md-1 text-right"><a title="Indietro" href="{{ url()->previous() }}" class="btn btn-danger"><i class="fa fa-btn fa-reply"></i></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endsection
