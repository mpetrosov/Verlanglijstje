@extends('main')

@section('addressBarTitle')
Wat zal de Sint jou brengen?
@endsection

{{-- @section('pageTitle') 
Verlang-eisje
@endsection --}}

@section('content')   
        <div class="row">
            <div class="col-md-6 offset-md-3 spacer-50"></div>
        </div>

        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="sint"><img src="{{ asset('/images/sinterklaas.png') }}"></div>
            </div>
            
            <div class="col-md-6 offset-md-3 bg-white padding-top-40">
                <h1 class="display-3 text-align-center page-title">Lieve Sint..</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 offset-md-3 bg-white">
                <div class="row">
                    <div class="col-md-6">
                        <p>1 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis, aperiam numquam? Illum cumque est temporibus quod magnam enim, eius amet dolores aliquid architecto?</p>
                    </div>
                            
                    <div class="col-md-6">
                        <p>2 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis, aperiam numquam? Illum cumque est temporibus quod magnam enim, eius amet dolores aliquid architecto?</p>
                    </div>
                </div>
            </div>
        </div>


@endsection

@section('footer') 

@endsection

        