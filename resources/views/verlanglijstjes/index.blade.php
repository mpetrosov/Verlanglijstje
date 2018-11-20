@extends('verlanglijstje')

@section('addressBarTitle')
Alle verhalen
@endsection

@section('customHead')

@endsection

@section('pageTitle') 
Alle verhalen
@endsection

@section('content')
    <section class="flex-section">    
        <div class="flex-item flex-item-1000 bg-white rounded-borders shadow-bottom flex-margin-10"> 
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col" >#</th>
                        <th scope="col" >Titel</th>
                        <th scope="col" >Auteur</th>
                        <th scope="col" >Publicatie datum</th>
                        <th scope="col" ></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($verlanglijstjes as $verlanglijstje)
                        <tr>
                            <th scope="row">{{ $verlanglijstje->id }}</th>
                            <td><a href="/verlanglijstjes/{{$verlanglijstje->id}}">{{ $verlanglijstje->name }}</a>
                            </td>
                            <td>{{ App\verlanglijstje::find(1)->user['name'] }}</td>
                            <td>{{ date('j F, o', strtotime($verlanglijstje->created_at)) }}</td>
                            <td>
                                <div class="buttongroup flex-margin-10">
                                {!! Html::LinkRoute('verlanglijstjes.edit', 'Bewerk', array($verlanglijstje->id), array('class' => 'btn btn-outline-dark btn-sm')) !!} 
                                    <button type="button" class="btn btn-outline-danger btn-sm my-2" data-toggle="modal" data-target="#delete_{{ $verlanglijstje->id }}">Verwijder</button>
                                    <div class="modal fade" id="delete_{{ $verlanglijstje->id }}" tabindex="-1" role="dialog" aria-labelledby="delete_{{ $verlanglijstje->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <i class="material-icons modal-icon">error_outline</i><h5 class="modal-title text-center">Weet je het zeker?</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Wil je het verhaal <b>"{{ substr($verlanglijstje->title, 0, 50) }}{{ strlen($verlanglijstje->title) > 50 ? "..." : ""}}"</b> verwijderen?
                                                </div>
                                                <div class="modal-footer">
                                                    {!! Form::open(['route' => ['verlanglijstjes.destroy', $verlanglijstje->id], 'method' => 'DELETE', 'class' => 'red-btn'] )!!}
                                                    {!! Form::submit('Ja', array($verlanglijstje->id), array('class' => 'btn btn-danger mx-1 button150 btn-sm')) !!}
                                                    {!! Form::close() !!}
                                                    <button type="button" class="btn btn-secondary mx-1 button150 btn-sm" data-dismiss="modal">Nee</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
    <section class="flex-section">    
        <div class="text-center text-align-center">
            {!! $verlanglijstjes->links() !!}
        </div>
    </section>
@endsection

@section('footer')
@endsection