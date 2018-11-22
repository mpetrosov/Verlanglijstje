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
        <div class="parent">
            <h1 id="listTitleH1" class="child display-5 text-align-center page-title">{{ $verlanglijstje->name }}</h1>
            <a class="child" href="#" type="button" data-toggle="modal" data-target="#edit_{{ $verlanglijstje->id }}">
                <i class="fas fa-pencil-alt fa-2x fa-fw" data-toggle="tooltip" data-placement="right" title="Bewerk de titel"></i>
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 offset-md-3 bg-white">
        <div class="row">
            <div class="col-md-12">
                @if(!$items->isEmpty())
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
                            <td style ="word-break:break-all;">{{$item->name}}</td>
                            <td style ="word-break:break-all;">{{$item->description}}</td>
                            <td style ="word-break:break-all;">{{$item->url}}</td>
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
                    @else
                    <p>Vul je eerste wens in...</p>
                    @endif 
                    </tbody>
                </table>
                {{-- ITEM TABLE --}}

                {{-- ADD ITEM --}}
                    <div class="form-group row">
                        <div class="col-md-8 offset-md-2 my-2">
                            <input id="item_name" type="text" class="form-control" name="name" placeholder="Naam (verplicht)" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-8 offset-md-2 my-2">
                            <textarea id="item_description" type="text" class="form-control" name="description" placeholder="Omschrijving (optioneel)" required></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-8 offset-md-2 my-2">
                            <input id="item_url" type="text" class="form-control" name="url" placeholder="Link (optioneel)" required>
                            <input id="item_user_id" type="text"  hidden value="{{ Auth::user()->id }}">
                            <input id="item_list_id" name="list_id" type="hidden" value="{{ $verlanglijstje->id }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-8 offset-md-2 my-2">
                            <button id="addItemSubmitButton" class="btn btn-outline-primary btn-block">Voeg toe</button>
                        </div>
                    </div>
                {{-- ADD ITEM --}}
            </div>
        </div>
    </div>
</div>

<!-- EDIT TITLE MODAL -->
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
                            <div class="form-group row">
                                <input id="list_name" type="text" class="form-control" name="naam" placeholder="nieuwe naam" required autofocus>
                            </div>

                            <div class="form-group row">
                                <button id="changeListTitleSubmitButton" class="btn btn-outline-primary btn-block">Sla op</button>
                            </div>
                        </div>
                    </div>
                </div>    
            </div>
        </div>
    </div>
</div>
  
<!-- EDIT TITLE MODEL -->

<!-- EDIT ITEM MODEL -->
@if(!$items->isEmpty())
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
                                    <input id="naam" type="text" class="form-control" name="naam" placeholder="nieuwe naam" required>
                                    <input id="item_id" name="item_id" type="hidden" value>
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
@endif
<!-- EDIT TITLE MODEL -->
    

@endsection

@section('footer') 

<script>
// ITEM EDIT MODAL
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

// ITEM CREATE
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
            description: jQuery('#item_description').val(),
            url: jQuery('#user_url').val(),
            list_id: jQuery('#item_list_id').val()
        })
    })
    .then(response => {
        console.log('Success:', JSON.stringify(response));
    })
    .catch(function(error) {
        console.log(error);
    })
}

// LIST TITLE UPDATE
document.getElementById('changeListTitleSubmitButton').onclick = function() {
    var listId = jQuery('#item_list_id').val();
    fetch('/verlanglijstjes/'+listId, {
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json, text-plain, */*",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
        },
        method: 'put',
        credentials: "same-origin",
        body: JSON.stringify({
            list_name: jQuery('#list_name').val(),
            list_id: jQuery('#item_list_id').val()
        })
    })
    .then(response => {
        console.log('Success:', JSON.stringify(response));
        $(`#edit_${listId}`).modal('hide');
        document.getElementById('listTitleH1').innerText = jQuery('#list_name').val();  

    })
    .catch(function(error) {
        console.log(error);
    })
}

</script>

<script>
    new ClipboardJS('.fas');
    $(function () {
    $('[data-toggle="tooltip"]').tooltip();
    })
</script>
@endsection