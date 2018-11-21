
@extends('main')

@section('addressBarTitle')
Bewerk {{ $verlanglijstje->name }}
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
                <h1 class="display-4 text-align-center page-title">Bewerk {{ $verlanglijstje->name }}</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 offset-md-3 bg-white">
                <div class="row">
                    <div class="col-md-6">
                        <p>Bewerk je verlanglijstje. Verander de naam, voeg items toe, of verwijder ze.</p>
                    </div>

                    <div class="col-md-6">
                        <form action="{{ route('verlanglijstjes.update', [$verlanglijstje->id]) }}" method="POST">
                            {{method_field('PATCH')}}
                            {{ csrf_field() }}

                            <div class="form-group row">
                                <div class="col-md-12 my-2">
                                    <input id="naam" type="text" class="form-control" name="naam" placeholder="{{ $verlanglijstje->name }}" required autofocus>
                                </div>

                                <div class="col-md-12 my-2">
                                    <button type="submit" class="btn btn-outline-primary btn-block">Sla op</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 offset-md-3 bg-white">
                <div class="col-md-12">
                    <form>
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <input id="item_name" type="text" class="form-control" name="item_name" placeholder="item naam" required>
                            {{-- <input id="omschrijving" type="text" class="form-control" name="omschrijving" placeholder="omschrijving" required>
                            <input id="link" type="text" class="form-control" name="link" placeholder="link" required> --}}
                            
                            <input name="list_id" type="hidden" value="{{ $verlanglijstje->id }}">
                        </div>
                        <div class="form-group row">
                            <button type="submit" id="submitItem" class="btn btn-outline-primary btn-block">Voeg toe</button>
                        </div>
                    </form>
                </div>   
            </div>
        </div>
@endsection

@section('footer') 
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
<script>
    jQuery(document).ready(function(){
        
        jQuery('#submitItem').click(function(e){
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });

            jQuery.ajax({
                url: "{{ url('/item/store') }}",
                method: 'post',
                data: {
                    name: jQuery('#item_name').val(),
                    description: jQuery('#description').val(),
                    url: jQuery('#url').val(),
                    name: jQuery('#item').val(),
                    list_id: jQuery('#list_id').val()
                },

                success: function(result){
                    console.log(result);
                    jQuery('.alert').show();
                    jQuery('.alert').html(result.success);
                }
            });
        });
    });
</script>
@endsection

        