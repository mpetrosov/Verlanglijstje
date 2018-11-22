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
        <h1 class="display-5 text-align-center page-title">{{ $verlanglijstje->name }} 
            <a href="#" type="button" data-toggle="modal" data-target="#edit_{{ $verlanglijstje->id }}">
                <i class="fas fa-pencil-alt fa-xs" data-toggle="tooltip" data-placement="right" title="Bewerk de titel"></i>
            </a>
        </h1>
    </div>
</div>

<div class="row">
    <div class="col-md-6 offset-md-3 bg-white">
        <div class="row">
            <div class="col-md-12">
                {{-- ITEM TABLE --}}
                <table class="table table-striped" id="itemsTable">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 25%">Naam</th>
                            <th scope="col" style="width: 25%">Omschrijving</th>
                            <th scope="col" style="width: 25%">Link</th>
                            <th scope="col">edit/delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                        <tr>
                            <td>{{$item->name}}</td>
                            <td>{{$item->description}}</td>
                            <td>{{$item->url}}</td>
                            <td>
                                <a href="#" type="button" data-id="{{ $item->id }}" data-name="{{ $item->name }}" class="getIdToModal">
                                    <i class="fas fa-pencil-alt fa-lg" data-toggle="tooltip" data-placement="right" title="Bewerk de titel"></i>
                                </a>
                                <a href="#" type="button" data-toggle="modal" data-target="#delete_{{ $item->id }}">
                                    <i class="fas fa-trash-alt fa-lg" data-toggle="tooltip" data-placement="right" title="Bewerk de titel"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- ITEM TABLE --}}

                {{-- ADD ITEM --}}

                    <div class="form-group row">
                        <input id="item_name" type="text" class="form-control" name="name" placeholder="Ik wil graag..." required autofocus>
                        <input id="user_id" type="text"  hidden value="{{ Auth::user()->id }}">
                        <input id="list_id" name="list_id" type="hidden" value="{{ $verlanglijstje->id }}">
                    </div>

                    <div class="form-group row">
                        <button id="addItemSubmitButton" class="btn btn-outline-primary btn-block">Voeg toe</button>
                    </div>
                </form>
                {{-- ADD ITEM --}}
            </div>
        </div>
    </div>
</div>


{{-- AJAX TEST --}}
{{-- <div class="col-md-8 offset-md-2">
        <div class="card">
        <table>
        <tbody id="wish-table">
            {{-- jquery.ajax here inserts wishes
        </tbody>
        <tr id="new-wish-row" class="content-justify-center">
            <td id="wish-input-count"></td>
            <td><input type="text" id="new-wish"><input type="text" id="user-id" hidden value="{{ Auth::user()->id }}"></td>
            <td></td>
        </tr>
    </table>
</div> --}}
{{-- AJAX TEST --}}

<!-- EDIT TITLE MODEL -->
<div class="modal fade" id="edit_{{ $verlanglijstje->id }}" tabindex="-1" role="dialog" aria-labelledby="edit_{{ $verlanglijstje->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <i class="material-icons modal-iconerror_outline"></i><h5 class="modal-title text-center"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Verander de naam van: <b>"{{ substr($verlanglijstje->name, 0, 50) }}{{ strlen($verlanglijstje->name) > 50 ? "..." : ""}}"</b></p>
            </div>
            <div class="modal-footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 my-2">
                            <form action="{{ route('verlanglijstjes.update', [$verlanglijstje->id]) }}" method="POST">
                                {{method_field('PATCH')}}
                                {{ csrf_field() }}

                                <div class="form-group row">
                                    <input id="naam" type="text" class="form-control" name="naam" placeholder="nieuwe naam" required autofocus>
                                </div>

                                <div class="form-group row">
                                    <button type="submit" class="btn btn-outline-primary btn-block">Sla op</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>    
            </div>
        </div>
    </div>
</div>
<!-- EDIT TITLE MODEL -->

<!-- EDIT ITEM MODEL -->
<div class="modal fade" id="editItemModal" tabindex="-1" role="dialog" aria-labelledby="editItemModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <i class="material-icons modal-iconerror_outline"></i><h5 class="modal-title text-center"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="item_name"></p>
            </div>
            <div class="modal-footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 my-2" id="editItemForm">
                            <form action="{{ route('item.update', [$item->id]) }}" method="POST">
                                @method('PATCH')
                                @csrf

                                <div class="form-group row" id="itemFormGroup">
                                    {{-- <input id="naam" type="text" class="form-control" name="naam" placeholder="nieuwe naam" required autofocus>
                                    <input id="item_id" name="item_id" type="hidden" value> --}}
                                </div>

                                <div class="form-group row">
                                    <button type="submit" class="btn btn-outline-primary btn-block">Sla op</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>    
            </div>
        </div>
    </div>
</div>
<!-- EDIT TITLE MODEL -->
    

@endsection

@section('footer') 

<script>
document.querySelectorAll('.getIdToModal').forEach(el => {
    el.addEventListener('click', e =>{
        var id = e.currentTarget.dataset.id;
        var name = e.currentTarget.dataset.name;
        console.log(name);
        console.log(id);
        var modal = $('#editItemModal');
        document.getElementById('itemFormGroup').innerHTML = `<input id="naam" type="text" class="form-control" name="naam" placeholder="nieuwe naam" required autofocus><input id="item_id" name="item_id" type="hidden" value="${id}">`



        modal.find('#item_name').html("Verander de naam van: <b>"+name+"</b>");
        // modal.find('#itemFormGroup').html("<input id=\"naam\" type=\"text\" class=\"form-control\" name=\"naam\" placeholder=\"nieuwe naam\" required autofocus><input id=\"item_id\" name=\"item_id\" type=\"hidden\" value="+id+">");
        modal.find('#item_id').value = id;
        $('#editItemModal').modal('toggle');
    });
});     

document.getElementById('addItemSubmitButton').onclick = function() {
    fetch('/item', {
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json, text-plain, */*",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
        },
        method: 'post',
        credentials: "same-origin",
        body: JSON.stringify({
            name: jQuery('#item_name').val(),
            user_id: jQuery('#user_id').val(),
            list_id: jQuery('#list_id').val()
        })
    })
    .then(response => {
        console.log('Success:', JSON.stringify(response));
    })
    .catch(function(error) {
        console.log(error);
    })
}

// document.getElementById('addItemSubmitButton').onclick = function() {
//     console.log('submitting new item');

//         $.ajaxSetup({
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             }
//         });
        
//         jQuery.ajax({
//             url: "/item",
//             method: 'post',
//             data: {
//                 name: jQuery('#item_name').val(),
//                 user_id: jQuery('#user_id').val(),
//                 list_id: jQuery('#list_id').val()
//             },

//             success: function(result){
//                 $('#item_name').value = '';
//                 console.log('ajax success');
//                 // console.log(result);
//             },

//             error: function(jqxhr, status, exception) {
//                 console.log('Exception:', exception);
//                 // console.log(status);
//             }
//         });
// };    


</script>
<script>
    new ClipboardJS('.fas');
    $(function () {
    $('[data-toggle="tooltip"]').tooltip();
    })
</script>
@endsection