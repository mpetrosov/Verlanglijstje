@extends('main')

@section('addressBarTitle')
    Aardbeving verhalen uit Groningen.
@endsection

@section('pageTitle') 
    Aard<i>beleving</i>
@endsection

@section('content')                
    <section class="flex-section"> 
        
        <div class="flex-item flex-item-600 flex-margin-10">
            <h2 class="margin-20">De aardbevingen in Groningen</h2>
            <p>Je hebt het ongetwijfeld gehoord, Groningen beeft.</p>
            <p>Een aardbeving op 2.2 op de schaal van Richter, wat betekend dat eigenlijk?
                Aardbeleving, wil de menselijke kant van een aardbeving laten zien, door het delen van verhalen.</p>
        </div>

        {{-- <div class="flex-item flex-item-600 bg-white rounded-borders shadow-bottom flex-margin-10">                                                
            <form action="/aardbeving-verhalen/register.php" method="POST" class="fancy-form" onsubmit="return validateForm()" id="registerForm" novalidate>
                <label for="contactVoornaam" id="contactVoornaamLabel">Voornaam</label>
                <input type="text" id="contactVoornaam" name="contact_voornaam" placeholder="Voornaam">
                
                <label for="contactEmail" id="contactEmailLabel">E-mailadres</label>
                <input type="email" id="contactEmail" name="contactr_emailadres" placeholder="E-mailadres">

                <label for="contactBericht" id="contactEmailLabel">Uw bericht</label>
                <textarea id="contactBericht" placeholder="Uw bericht"></textarea> 
                
                <input type="submit" name="submit" value="Verstuur" />
            </form>
        </div> --}}
    </section>
@endsection

@section('footer') 

@endsection

        