@extends('layouts.master')
@section('content')
@include('sweetalert::alert')
<style>
    h4{
        color: #007bff;
    }
   .card-header{
    color: #007bff;
   }
    </style>
<div class="container">
    <div class="row">
            <div class="card ">
        <div class="card-header">
            <h3>Afficher Patient</h3>
        </div>
        <div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2">
            <div class="tab-content">
                <div  class="tab-pane fade show active pt-3">
    
        <form action="{{url('patient/'.$patient->num_patient)}}" method="post">
            <input type="hidden" name="_method" value="PUT">
        {{ csrf_field() }}
        <div class="row">
            <h4> Les Informations Personnels</h4>
            <div class="col-md-6 col-12">
                <label  for="exampleFormControlInput1" class="form-label">Nom patient</label>
                <input type="text" name="nom_patient" class="form-control @error('nom_patient') is-invalid @enderror" value="{{$patient->nom_patient}}">
                @error('nom_patient')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <div class="col-md-6 col-12">
                <label  class="form-label" for="exampleFormControlInput1">CIN patient</label>
                <input type="text" name="cin" class="form-control @error('cin') is-invalid @enderror" value="{{$patient->cin}}" >
                @error('cin')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <div class="col-md-6 col-12">
                <label for="exampleFormControlInput1" class="form-label">Prenom patient</label>
                <input type="text" name="prenom_patient" class="form-control @error('prenom_patient') is-invalid @enderror" value="{{$patient->prenom_patient}}">
                @error('prenom_patient')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <div class="col-md-6 col-12">
                <label for="exampleFormControlTextarea1" class="form-label">Age patient</label>
                <input  type="number" class="form-control @error('age_patient') is-invalid @enderror" name="age_patient" id="exampleFormControlTextarea1" value="{{$patient->age_patient}}">
                @error('age_patient')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <div class="col-md-6 col-12">
                <label for="exampleFormControlTextarea1" class="form-label">Sexe patient</label>
                <select name="sexe_patient" class="form-control" value="{{$patient->sexe_patient}}">
                <option value="femme" {{$patient->sexe_patient==='femme'?'selected':''}}> femme</option>
                <option value="homme" {{$patient->sexe_patient==='homme'?'selected':''}}> homme</option>
            </select>
            </div>
            <div class="col-md-6 col-12">
                <label for="exampleFormControlTextarea1" class="form-label">Mutuelle patient</label>
                <select name="mutuelle_patient" class="form-control" value="{{$patient->mutuelle_patient}}">
                    <option value="AUCUN" {{$patient->mutuelle_patient==='AUCUN'?'selected':''}}>AUCUN</option>
                    <option value="CNOPS" {{$patient->mutuelle_patient==='CNOPS'?'selected':''}}>CNOPS</option>
                    <option value="CNSS" {{$patient->mutuelle_patient==='CNSS'?'selected':''}}>CNSS</option>
                    <option value="FAR" {{$patient->mutuelle_patient==='FAR'?'selected':''}}>FAR</option>
                   
                </select>
            </div>
            <div class="col-md-6 col-12">
                <label for="exampleFormControlTextarea1" class="form-label">Tel patient</label>
                <input type="text" class="form-control @error('tel_patient') is-invalid @enderror" name="tel_patient" id="exampleFormControlTextarea1" value="{{$patient->tel_patient}}">
                @error('tel_patient')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <div class="col-md-6 col-12">
                <label for="exampleFormControlTextarea1" class="form-label">Adresse patient</label>
                <textarea class="form-control @error('adresse_patient') is-invalid @enderror" name="adresse_patient" id="exampleFormControlTextarea1" rows="3">{{$patient->adresse_patient}}</textarea>
                @error('adresse_patient')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <div class="col-md-6 col-12">
                <label for="exampleFormControlTextarea1" class="form-label">Taille patient(cm)</label>
                <input type="text" class="form-control @error('taille_patient') is-invalid @enderror" name="taille_patient" id="exampleFormControlTextarea1" value="{{$patient->taille_patient}}">
                @error('taille_patient')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <div class="col-md-6 col-12">
                <label for="exampleFormControlTextarea1" class="form-label">Poids patient(kg)</label>
                <input type="text" class="form-control @error('poids_patient') is-invalid @enderror" name="poids_patient" id="exampleFormControlTextarea1" value="{{$patient->poids_patient}}">
                @error('poids_patient')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Groupe sanguin</label>
                <select name="groupesanguin" class="form-control" value="{{$patient->groupesanguin}}">
                    <option value="je ne sais pas" {{$patient->groupesanguin==='je ne sais pas'?'selected':''}}>Je Ne Sais Pas</option>
                    <option value="A+" {{$patient->groupesanguin==='A+'?'selected':''}}> A+</option>
                    <option value="A-" {{$patient->groupesanguin==='A-'?'selected':''}}> A-</option>
                    <option value="B+" {{$patient->groupesanguin==='B+'?'selected':''}}>B+</option>
                    <option value="B-" {{$patient->groupesanguin==='B-'?'selected':''}}>B-</option>
                    <option value="AB+" {{$patient->groupesanguin==='AB+'?'selected':''}}>AB+</option>
                    <option value="AB-" {{$patient->groupesanguin==='AB-'?'selected':''}}>AB-</option>
                    <option value="O+" {{$patient->groupesanguin==='O+'?'selected':''}}>O+</option>
                    <option value="O-" {{$patient->groupesanguin==='O-'?'selected':''}}>O-</option>
                </select>
            </div>
            <div class="mb-5">
                <button class="btn btn-danger"><i class="fa-regular fa-pen-to-square"></i> Modifer</button>
                <a class="btn btn-primary" href={{url('patient/'.$patient->num_patient.'/pdf_patient')}}><i class="fa-solid fa-print"></i> Imprimer</a>
                <a href="{{url('patient')}}" class="btn btn-secondary">Annuler</a>

            </div>
        </form>
    </div>
</div>

@endsection