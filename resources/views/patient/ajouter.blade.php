@extends('layouts.master')
@section('content')
@include('sweetalert::alert')
<style>
    h4{
        color: #007bff;
    }
</style>
<div class="container">
    <div class="row">
            <div class="card ">
        <div class="card-header">
            <h3>Ajouter Patient</h3>
        </div>
        <div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2">
            <div class="tab-content">
                <div  class="tab-pane fade show active pt-3">
   
        <form action="{{url('patient')}}" method="post">
        {{ csrf_field() }}
        <div class="row">
            
            <h4> Les Informations Personnels</h4>
            
            <div class="col-md-6 col-12 ">
                <label  for="exampleFormControlInput1" class="form-label">Nom patient</label>
                <input type="text" name="nom_patient" class="form-control @error('nom_patient') is-invalid @enderror" value="{{ old('nom_patient') }}">
                @error('nom_patient')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <div class="col-md-6 col-12">
                <label  class="form-label" for="exampleFormControlInput1">CIN patient</label>
                <input type="text" name="cin" class="form-control @error('cin') is-invalid @enderror" value="{{ old('cin') }}" >
                @error('cin')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <div class="col-md-6 col-12">
                <label for="exampleFormControlInput1" class="form-label">Prenom patient</label>
                <input type="text" name="prenom_patient" class="form-control @error('prenom_patient') is-invalid @enderror" value="{{ old('prenom_patient') }}">
                @error('prenom_patient')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <div class="col-md-6 col-12">
                <label for="exampleFormControlTextarea1" class="form-label">Age patient</label>
                <input  type="number" class="form-control @error('age_patient') is-invalid @enderror" value="{{ old('age_patient') }}" name="age_patient" id="exampleFormControlTextarea1">
                @error('age_patient')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <div class="col-md-6 col-12">
                <label for="exampleFormControlTextarea1" class="form-label">Sexe patient</label>
                <select name="sexe_patient" class="form-control">
                <option value="femme"> femme</option>
                <option value="homme"> homme</option>
            </select>
            </div>
            <div class="col-md-6 col-12">
                <label for="exampleFormControlTextarea1" class="form-label">Mutuelle patient</label>
                <select name="mutuelle_patient" class="form-control">
                    <option value="AUCUN">AUCUN</option>
                    <option value="CNOPS">CNOPS</option>
                    <option value="CNSS">CNSS</option>
                    <option value="FAR">FAR</option>
                   
                </select>
            </div>
            <div class="col-md-6 col-12">
                <label for="exampleFormControlTextarea1" class="form-label">Tel patient</label>
                <input type="text" class="form-control @error('tel_patient') is-invalid @enderror" value="{{ old('tel_patient') }}" name="tel_patient" id="exampleFormControlTextarea1">
                @error('tel_patient')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <div class="col-md-6 col-12">
                <label for="exampleFormControlTextarea1" class="form-label">Adresse patient</label>
                <textarea class="form-control @error('adresse_patient') is-invalid @enderror" value="{{ old('adresse_patient') }}" " name="adresse_patient" id="exampleFormControlTextarea1" rows="3"></textarea>
                @error('adresse_patient')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <div class="col-md-6 col-12">
                <label for="exampleFormControlTextarea1" class="form-label">Taille patient(cm)</label>
                <input type="text" class="form-control @error('taille_patient') is-invalid @enderror" value="{{ old('taille_patient') }}"" name="taille_patient" id="exampleFormControlTextarea1">
                @error('taille_patient')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <div class="col-md-6 col-12">
                <label for="exampleFormControlTextarea1" class="form-label">Poids patient(kg)</label>
                <input type="text" class="form-control @error('poids_patient') is-invalid @enderror" value="{{ old('poids_patient') }}" name="poids_patient" id="exampleFormControlTextarea1">
                @error('poids_patient')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Groupe sanguin</label>
                <select name="groupesanguin" class="form-control">
                    <option value="je ne sais pas">Je Ne Sais Pas</option>
                    <option value="A+"> A+</option>
                    <option value="A-"> A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                </select>
            </div>
            <div class="mb-5">
                <input type="submit" class="btn btn-danger" value="Enregistrer">
                <a href="{{url('patient')}}" class="btn btn-secondary">Annuler</a>
            </div>
        </div>
        </form>
    </div>
</div>
</div>
</div>
    </div>
@endsection