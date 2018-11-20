@extends('main')

@section('addressBarTitle')
Wat zal de Sint jou brengen?
@endsection

@section('content')   
        <div class="row">
            <div class="col-md-6 offset-md-3 spacer-50"></div>
        </div>

        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="sint"><img src="{{ asset('/images/sinterklaas.png') }}"></div>
            </div>
            
            <div class="col-md-6 offset-md-3 bg-white padding-top-40">
                <h1 class="display-4 text-align-center page-title">Maak een nieuw lijstje</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 offset-md-3 bg-white">
                <div class="row">
                    <div class="col-md-6">
                        <p>Wat hoop jij dit jaar van de Sint te krijgen?</p>
                        <p>Maak snel een verlanglijstje en begin met het toevoegen van je wensen.</p>
                    </div>

                    <div class="col-md-6">
                        <form method="POST" action="verlanglijstjes.store">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-12 my-2">
                                    <input id="naam" type="text" class="form-control" name="naam" placeholder="lijst naam" required autofocus>
                                </div>

                                <div class="col-md-12 my-2">
                                    <button type="submit" class="btn btn-outline-primary btn-block">Sla op</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


@endsection

@section('footer') 

@endsection

        