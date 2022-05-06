@extends('layouts.master')
 
@section('title', 'Modifier contact')
 
@section('content')
<div class="col-md-12">
    
    <div class="p-6">
        <div class="flex items-center">
            <span class="text-danger font-weight-bold">Modifier contact</span>
        </div>
        <div class="ml-12 mt-20">
            @if (isset($contact))

            <form method="POST" class="p-20" action="{{ route('contacts.update', $contact) }}" enctype="multipart/form-data" >
                @method('PUT')
                @csrf
                
                <div class="form-group">
                    <label for="nom" >Nom</label><br/>
                    <input type="text" class="form-control"  name="nom" value="{{ isset($contact->nom) ? $contact->nom : old('nom') }}"  id="nom" placeholder="Votre nom" >
        
                    @error("nom")
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="prenoms" >Prenoms</label><br/>
                    <input type="text" class="form-control"  name="prenoms" value="{{ isset($contact->prenoms) ? $contact->prenoms : old('prenoms') }}"  id="prenoms" placeholder="Votre prénom" >
        
                    @error("prenoms")
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email" >Email</label><br/>
                    <input type="email" class="form-control" name="email" 
                            onkeyup="ValidateEmail();"
                            value="{{ isset($contact->email) ? $contact->email : old('email') }}"  id="email" placeholder="exemple@exemple.com" disabled>
        
                    @error("email")
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <span id="wrongEmail" style="color: red"></span>
                </div>
                <div class="form-group">
                    <label for="tel" >Télephone</label><br/>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">+33</span>
                        </div>
                        <input type="tel" class="form-control" name="tel" 
                            minLength="10" maxLength="10" pattern="[0-9]+"
                            value="{{ isset($contact->tel) ? $contact->tel : old('tel') }}"  id="tel" maxlength="10" placeholder="tel: 0659000000" >
                    </div>
                    @error("tel")
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="adresse" >Adresse</label><br/>
                    <input type="text" class="form-control" name="adresse" value="{{ isset($contact->adresse) ? $contact->adresse : old('adresse') }}"  id="adresse" placeholder="Votre adresse" >
        
                    @error("adresse")
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="code_postal" >Code postal</label><br/>
                    <input type="text" 
                        minLength="5" maxLength="5" pattern="[0-9]+"
                        class="form-control" name="code_postal" value="{{ isset($contact->code_postal) ? $contact->code_postal : old('code_postal') }}"  id="code_postal" placeholder="Code postal" >
        
                    @error("code_postal")
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="ville" >Ville</label><br/>
                    <input type="text" class="form-control" name="ville" value="{{ isset($contact->ville) ? $contact->ville : old('ville') }}"  id="ville" placeholder="Votre ville" >
        
                    @error("ville")
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="commentaire" >Commentaire</label><br/>
                    <textarea name="commentaire" class="form-control" id="commentaire" lang="fr" 
                    rows="10" cols="50" placeholder="Commentaire" >{{ isset($contact->commentaire) ? $contact->commentaire : old('commentaire') }}</textarea>
        
                    @error("commentaire")
                    <div>{{ $message }}</div>
                    @enderror
                </div>
                <br />
                <input type="submit" class="btn btn-success" name="valider" value="Valider" >
            </form>
	        @endif
        </div>
    </div>

    <script type="text/javascript">
        function ValidateEmail() {
            var email = document.getElementById("email").value;
            var lblError = document.getElementById("wrongEmail");
            lblError.innerHTML = "";
            var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
            if (!expr.test(email)) {
                lblError.innerHTML = "Format invalide.";
            }
        }
    </script>
</div>
@endsection