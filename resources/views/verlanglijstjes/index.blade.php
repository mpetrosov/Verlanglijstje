@extends('main')

@section('addressBarTitle')
Jouw verlanglijstje(s)
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
                <h1 class="display-4 text-align-center page-title">Jouw verlanglijstje(s)</h1>
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
                                {!! Form::open(array('route' => 'verlanglijstjes.store' )) !!}
                                {{ csrf_field() }}
    
                                <div class="form-group row">
                                    <div class="col-md-12 my-2">
                                        <input id="naam" type="text" class="form-control" name="naam" placeholder="lijst naam" required autofocus>
                                    </div>
    
                                    <div class="col-md-12 my-2">
                                        <button type="submit" class="btn btn-outline-primary btn-block">Sla op</button>
                                    </div>
                                </div>
                            {!! Form::close() !!}
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
                                    <th scope="col" style="width: 20%">Titel</th>
                                    <th scope="col" style="width: 10%">Auteur</th>
                                    <th scope="col" style="width: 25%" class="px-0">URL</th>
                                    <th scope="col" style="width: 10%"></th>
                                    {{-- <th scope="col">Gemaakt op</th>
                                    <th scope="col">Laatst bewerkt op</th> --}}
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                        @foreach ($verlanglijstjes as $verlanglijstje)
                        <tr>
                            <td><a href="/verlanglijstjes/{{$verlanglijstje->id}}">{{ $verlanglijstje->name }}</a>
                            </td>
                            <td>{{ $verlanglijstje->user['name'] }}</td>
                            <td class="px-0">
                                <a href="{{ url('/') . '/' . $verlanglijstje->url }}" id="{{ $verlanglijstje->url }}">{{ url('/') . '/' . $verlanglijstje->url }}</a>
                            </td>
                            <td class="px-0">   
                                <button class="btn btn-link" data-clipboard-text="{{ url('/') . '/' . $verlanglijstje->url }}" data-toggle="tooltip" data-placement="right" title="Kopieer de link">
                                    <i class="far fa-copy"></i>
                                </button>
                            </td>
                            {{-- <td>{{ date('j F, o', strtotime($verlanglijstje->created_at)) }}</td>
                            <td>{{ date('j F, o', strtotime($verlanglijstje->updated_at)) }}</td> --}}
                            <td>
                                <div class="buttongroup flex-margin-10">
                                    {{-- EDIT BUTTON --}}
                                    {!! Html::LinkRoute('verlanglijstjes.edit', 'Bewerk', array($verlanglijstje->id), array('class' => 'btn btn-outline-dark btn-sm mx-2')) !!} 
                                    
                                    {{-- DELETE BUTTON --}}
                                    <button type="button" class="btn btn-outline-danger btn-sm mx-2" data-toggle="modal" data-target="#delete_{{ $verlanglijstje->id }}">Verwijder</button>
                                    
                                    <!-- DELETE MODEL -->
                                    <div class="modal fade" id="delete_{{ $verlanglijstje->id }}" tabindex="-1" role="dialog" aria-labelledby="delete_{{ $verlanglijstje->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <i class="material-icons modal-iconerror_outline"></i><h5 class="modal-title text-center">Weet je het zeker?</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Wil je de lijst <b>"{{ substr($verlanglijstje->name, 0, 50) }}{{ strlen($verlanglijstje->name) > 50 ? "..." : ""}}"</b> verwijderen?
                                                </div>
                                                <div class="modal-footer">
                                                    {!! Form::open(['route' => ['verlanglijstjes.destroy', $verlanglijstje->id], 'method' => 'DELETE', 'class' => 'red-btn'] )!!}
                                                    {!! Form::submit('Ja', array($verlanglijstje->id), array('class' => 'btn btn-danger mx-2 button150 btn-sm')) !!}
                                                    {!! Form::close() !!}
                                                    <button type="button" class="btn btn-secondary mx-2 button150 btn-sm" data-dismiss="modal">Nee</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- DELETE MODEL -->
                                </div>  
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <section class="flex-section">    
                <div class="text-center text-align-center">
                    {!! $verlanglijstjes->links() !!}
                </div>
            </section>
        </div>
    </div>
    

@endsection

@section('footer') 
<script>
    new ClipboardJS('.btn');
    $(function () {
    $('[data-toggle="tooltip"]').tooltip()
    })
</script>
@endsection