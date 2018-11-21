@extends('main')
@section('addressBarTitle')
{{ $verlanglijstje->name }}
@endsection

@section('customHead')

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
        <h1 class="display-5 text-align-center page-title">{{ $verlanglijstje->name }} <i class="fas fa-pencil-alt fa-xs" data-toggle="tooltip" data-placement="right" title="Bewerk de titel"></i></h1>
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
</div>
<div class="row">
    <div class="col-md-6 offset-md-3 bg-white">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 25%">Naam</th>
                            <th scope="col" style="width: 25%">Omschrijving</th>
                            <th scope="col" style="width: 25%">Link</th>
                            <th scope="col" style="width: 25%">listID</th>
                            {{-- <th scope="col">Gemaakt op</th>
                            <th scope="col">Laatst bewerkt op</th> --}}
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                @foreach ($items as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->description}}</td>
                    <td>{{$item->url}}</td>
                    <td>{{$item->list_id}}</td>
                </tr>
                @endforeach
            </table>
            
            {{-- AJAX TEST --}}
            <div class="col-md-8 offset-md-2">
                    <div class="card">
                    <table>
                    <tbody id="wish-table">
                        {{-- jquery.ajax here inserts wishes --}}
                    </tbody>
                    <tr id="new-wish-row" class="content-justify-center">
                        <td id="wish-input-count"></td>
                        <td><input type="text" id="new-wish"><input type="text" id="user-id" hidden value="{{ Auth::user()->id }}"></td>
                        <td></td>
                    </tr>
                </table>
            </div>
            {{-- AJAX TEST --}}



        </div>
    </div>
</div>
    

@endsection

@section('footer') 

<script>
jQuery(document).ready(function(){

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
});

$('#new-wish')[0].onkeydown = function(e){
    console.log('submit');
    if (e.keyCode == 13){
        console.log('keycode'+e.keyCode);
        e.preventDefault();
        
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        })

        jQuery.ajax({
            url: "/item",
            method: 'post',
            data: {
                name: jQuery('#new-wish').val(),
                user_id: jQuery('#user-id').val()
            },
            success: function(result){
                //what to do on success
                console.log('ajax success');
                $('#new-wish')[0].value = '';
                console.log(result);
                refreshWishList();
            },
            error: function(jqxhr, status, exception) {
                console.log('Exception:', exception);
                console.log(status);
            }
        });
    };
};


});


refreshWishList();

function refreshWishList(){
jQuery.ajax({
    url: "/item/"+jQuery('#user-id').val(),
    method: 'get',
    success: function(result){
        //what to do on success
        wishTable = document.getElementById('wish-table');
        wishTable.innerHTML = '';
        let count = 1;
        for (let i of result){
            wishTable.innerHTML += `
            <tr data-user-id="${i.user_id}" class="content-justify-center">
                <td>${count++} -</td>
                <td>${i.wish}</td>
                <td><h3 data-wish-id="${i.id}" class="wish-delete" id="wish${i.id}" onclick=deleteWish("wish${i.id}");>X</h3></td>
            </tr>`;
        };
        document.getElementById('wish-input-count').innerHTML = `${count++} -`

    },
    error: function(jqxhr, status, exception) {
        console.log('Exception:', exception);
        console.log(status);
        console.log(jqxhr);
    }
});
};

function deleteWish (e){
self = document.getElementById(e);
console.log("/item/"+self.dataset.wishId)
jQuery.ajax({
    url: "/item/"+self.dataset.wishId,
    method: 'delete',
    data: {id: self.dataset.wishId},
    success: function(msg){
        //what to do on success
        refreshWishList();
        console.log(msg);
    },
    error: function(jqxhr, status, exception) {
        console.log('Exception:', exception);
        console.log(status);
        console.log(jqxhr);
    }
});
}
</script>
<script>
    new ClipboardJS('.fas');
    $(function () {
    $('[data-toggle="tooltip"]').tooltip()
    })
</script>
@endsection