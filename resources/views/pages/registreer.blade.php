@extends('main')

@section('addressBarTitle')
    Registreer
@endsection

@section('pageTitle') 
    Registreer
@endsection

@section('content')                
    <section class="flex-section"> 
        <div class="flex-item flex-item-600 flex-margin-10">
            <h2 class="margin-20">Deel jouw aard<i>beleving</i></h2>
            <p>Je hebt het ongetwijfeld gehoord, Groningen beeft.</p>
            <p>Een aardbeving op 2.2 op de schaal van Richter, wat betekend dat eigenlijk?
                Aardbeleving, wil de menselijke kant van een aardbeving laten zien, door het delen van verhalen.</p>
        </div>        
        <div class="flex-item flex-item-600 bg-white rounded-borders shadow-bottom flex-margin-10">                                                
            <form action="/aardbeving-verhalen/register.php" method="POST" class="fancy-form" onsubmit="return validateForm()" id="registerForm" novalidate>
                <label for="gebruiker_voornaam" id="gebruikerVoornaamLabel">Voornaam</label>
                <input type="text" id="gebruikerVoornaam" name="gebruiker_voornaam" placeholder="Voornaam">
                
                <label for="gebruiker_achternaam" id="gebruikerAchternaamLabel">Achternaam</label>
                <input type="text" id="gebruikerAchternaam" name="gebruiker_achternaam" placeholder="Achternaam">
                
                <label for="gebruiker_emailadres" id="gebruikerEmailLabel">E-mailadres</label>
                <input type="email" id="gebruikerEmail" name="gebruiker_emailadres" placeholder="E-mailadres">
                
                <label for="gebruiker_wachtwoord" id="gebruikerWachtwoordLabel">Wachtwoord</label>
                <input type="password" id="gebruikerWachtwoord" name="gebruiker_wachtwoord" placeholder="Wachtwoord, minimaal 6 tekens">
                
                <label for="gebruiker_wachtwoord_controle" id="gebruikerWachtwoordControleLabel">Wachtwoord herhalen</label>
                <input type="password" id="gebruikerWachtwoordControle" name="gebruiker_wachtwoord_controle" placeholder="Herhaal uw wachtwoord">  
                
                <input type="submit" name="submit" value="Registreer" />
            </form>
        </div>
    </section>
@endsection

@section('footer') 
<script src="js/inc.form.validate.js"></script>
@endsection
        