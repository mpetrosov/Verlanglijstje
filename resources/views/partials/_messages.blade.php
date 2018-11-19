@if (Session::has('succes'))
    <section class="flex-section">
        <div class="flex-item flex-item-800 flex-margin-10 rounded-borders">     
            <div class="alert alert-success" role="alert">
                <p>{{ Session::get('succes') }}</p>
            </div>
        </div>
    </section>
@endif

@if (count($errors) > 0)
    <section class="flex-section"> 
        <div class="flex-item flex-item-800 flex-margin-10 rounded-borders">     
            <div class="alert alert-danger" role="alert">
                <b>Fout(en)</b>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
@endif