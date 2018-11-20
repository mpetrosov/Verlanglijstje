@if (Session::has('succes'))
    <div class="row">
        <div class="col-md-6 offset-md-3">   
            <div class="alert alert-success" role="alert">
                <p class="text-align-center">{{ Session::get('succes') }}</p>
            </div>
        </div>
    </div>
@endif

@if (count($errors) > 0)
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="alert alert-danger" role="alert">
                <p class="text-align-center"><b>Fout(en)</b></p>
                @foreach ($errors->all() as $error)
                    <p class="text-align-center">{{ $error }}</p>
                @endforeach
            </div>
        </div>
    </div>
@endif