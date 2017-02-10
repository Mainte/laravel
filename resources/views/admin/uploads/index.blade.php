@extends('layouts.app')

@section('title') Upload @endsection

    @section('css')
        @parent
        <link rel="stylesheet" href="{{ url('/assets/jqueryFileUpload/css/jquery.fileupload.css') }}">
    @endsection

    @section('js')
        @parent
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
        <script src="{{ url('/assets/jqueryFileUpload/js/vendor/jquery.ui.widget.js') }}"></script>
        <!-- The Load Image plugin is included for the preview images and image resizing functionality -->
        <script src="//blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
        <!-- The Canvas to Blob plugin is included for image resizing functionality -->
        <script src="//blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
        <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
        <script src="{{ url('/assets/jqueryFileUpload/js/jquery.iframe-transport.js') }}"></script>
        <!-- The basic File Upload plugin -->
        <script src="{{ url('/assets/jqueryFileUpload/js/jquery.fileupload.js') }}"></script>
        <!-- The File Upload processing plugin -->
        <script src="{{ url('/assets/jqueryFileUpload/js/jquery.fileupload-process.js') }}"></script>
        <!-- The File Upload image preview & resize plugin -->
        <script src="{{ url('/assets/jqueryFileUpload/js/jquery.fileupload-image.js') }}"></script>
        <!-- The File Upload audio preview plugin -->
        <script src="{{ url('/assets/jqueryFileUpload/js/jquery.fileupload-audio.js') }}"></script>
        <!-- The File Upload video preview plugin -->
        <script src="{{ url('/assets/jqueryFileUpload/js/jquery.fileupload-video.js') }}"></script>
        <!-- The File Upload validation plugin -->
        <script src="{{ url('/assets/jqueryFileUpload/js/jquery.fileupload-validate.js') }}"></script>
        <script>
        /*jslint unparam: true, regexp: true */
        /*global window, $ */
        $(function () {
            'use strict';
            // Change this to the location of your server-side upload handler:
            var url = 'uploads',
                uploadButton = $('<button/>')
                    .addClass('btn btn-primary')
                    .prop('disabled', true)
                    .text('Processing...')
                    .on('click', function () {
                        var $this = $(this),
                            data = $this.data();
                        $this
                            .off('click')
                            .text('Abort')
                            .on('click', function () {
                                $this.remove();
                                data.abort();
                            });
                        data.submit().always(function () {
                            $this.remove();
                        });
                    });
            $('#fileupload').fileupload({
                url: url,
                dataType: 'json',
                autoUpload: false,                
                acceptFileTypes: /(\.|\/)(mp4)$/i,
                maxFileSize: 999000000,
                maxChunkSize: 1000000,
                maxRetries: 100,
                retryTimeout: 500,
                // Enable image resizing, except for Android and Opera,
                // which actually support image resizing, but fail to
                // send Blob objects via XHR requests:
                disableImageResize: /Android(?!.*Chrome)|Opera/
                    .test(window.navigator.userAgent),
                previewMaxWidth: 100,
                previewMaxHeight: 100,
                previewCrop: true,
            }).on('fileuploadadd', function (e, data) {
                data.context = $('<div/>').appendTo('#files');
                $.each(data.files, function (index, file) {
                    var node = $('<p/>')
                            .append($('<span/>').text(file.name+' '));
                    if (!index) {
                        node
                            .append(uploadButton.clone(true).data(data));
                    }
                    node.append('<hr>');
                    node.appendTo(data.context);
                });
            }).on('fileuploadprocessalways', function (e, data) {
                var index = data.index,
                    file = data.files[index],
                    node = $(data.context.children()[index]);
                if (file.preview) {
                    node
                        .prepend('<br>')
                        .prepend(file.preview);
                }
                if (file.error) {
                    node
                        .append('<br>')
                        .append($('<span class="text-danger"/>').text(file.error));
                }
                if (index + 1 === data.files.length) {
                    data.context.find('button')
                        .text('Upload')
                        .prop('disabled', !!data.files.error);
                }
            }).on('fileuploadprogressall', function (e, data){
                var progress = parseInt(data.loaded / data.total * 100, 10);
                $('#progress .progress-bar').css(
                    'width',
                    progress + '%'
                );
                $("#progress-rate").empty().prepend(progress+'%');
            }).on('fileuploaddone', function (e, data) {
                $.each(data.result.files, function (index, file) {
                    if (file.url) {
                        var link = $('<a>')
                            .attr('target', '_blank')
                            .prop('href', file.url);
                        var success= $('<span class="text-success"/>').text('Upload completato');
                        $(data.context.children()[index])
                            .wrap(link);
                        $(data.context.children()[index])
                            .wrap(success);
                    } else if (file.error) {
                        var error = $('<span class="text-danger"/>').text(file.error);
                        $(data.context.children()[index])
                            .append('<br>')
                            .append(error);
                    }
                    $("#progress-rate").empty();
                    location.reload();
                });
            }).on('fileuploadfail', function (e, data) {
                console.log(data.errorThrown);
                console.log(data.textStatus);
                console.log(data.jqXHR);
                $.each(data.files, function (index) {
                    var error = $('<span class="text-danger"/>').text('File upload failed.');
                    $(data.context.children()[index])
                        .append('<br>')
                        .append(error);
                });
            }).prop('disabled', !$.support.fileInput)
                .parent().addClass($.support.fileInput ? undefined : 'disabled');
        });
        </script>
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>
    @endsection

@section('content')
    <div class="container">
        @include('common.info')
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4><strong>Carica file</strong></h4>
            </div>
            <div class="panel-body">
                <!-- The fileinput-button span is used to style the file input field as button -->
                <span class="btn btn-success fileinput-button">
                    <i class="glyphicon glyphicon-plus"></i>
                    <span>Add files...</span>
                    <!-- The file input field used as target for the file upload widget -->
                    <input id="fileupload" type="file" name="files[]" multiple>
                </span>
                <br>
                <br>
                <!-- The global progress bar -->
                <div id="progress" class="progress">
                    <span id="progress-rate"></span>
                    <div class="progress-bar progress-bar-success"></div>
                </div>
                <!-- The container for the uploaded files -->
                <div id="files" class="files"></div>
                <br>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4><strong>Attualmente caricati</strong></h4>
            </div>
            <div class="panel-body">
                @if(count($files))
                    <table class="table">
                        <tbody>
                        @foreach($files as $f)
                            <tr>
                                <td class="col-xs-11">{{$f}}</td>
                                <td class="col-xd-1 text-right">
                                    <a title="Elimina" href="{{ url()->current().'/'.$f.'/elimina'}}" class="btn btn-danger" role="button"><i class="fa fa-btn fa-trash"></i></a>
                                </td>
                            </tr> 
                        @endforeach
                        </tbody>
                    </table>
                   
                @else
                    <div class="row">
                        <div class="col-md-12">Nessun file caricato.</div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
