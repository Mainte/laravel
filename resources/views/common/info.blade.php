@if(session('info'))
    <div class="alert alert-success">
        <strong><i class="fa fa-arrow-right"></i> {{ session('info') }}</strong>
    </div>
@endif

@if (count($errors) > 0)
    <!-- Form Error List -->
    <div class="alert alert-danger">
        <strong>Ops! C'&egrave; qualcosa di sbagliato!</strong>

        <br>

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


@if(session('error'))
    <div class="alert alert-danger">
        <strong><i class="fa fa-arrow-right"></i> {{ session('error') }}</strong>
    </div>
@endif
