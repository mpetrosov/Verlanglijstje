@extends('main')
<?php
// dd($verlanglijstje);
?>
@section('addressBarTitle')
{{ $verlanglijstje->name }}
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
                <h1 class="display-4 text-align-center page-title">{{ $verlanglijstje->name }}</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 offset-md-3 bg-white">
                
        </div>
    </div>
    

@endsection

@section('footer') 

@endsection