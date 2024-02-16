@extends('layouts.master')
@section('content')
@include('sweetalert::alert')
<div class="container">
    <div class="row">
            <div class="card ">
        <div class="card-header">
            <h3>Ajouter Rendez-vous</h3>
        </div>
        <div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2">
            <div class="tab-content">
                <div  class="tab-pane fade show active pt-3">
    
        <form action="{{url('patient/rendezvous/enregistrer_prochain')}}" method="post">
        {{ csrf_field() }}
        <div class="row">
           
            <div class="col-md-6 col-12">
                <label for="exampleFormControlInput1" class="form-label">Nom Patient</label>
                <input type="text" name="nom_patient" class="form-control" value="{{$patient->nom_patient}}"readonly >
            </div>
            <div class="col-md-6 col-12">
                <label for="exampleFormControlInput1" class="form-label">Prenom Patient</label>
                <input type="text" name="prenom_patient" class="form-control" value="{{$patient->prenom_patient}}" readonly>
            </div>
            <div class="col-md-6 col-12">
                <label for="exampleFormControlInput1" class="form-label">Date Rendez-vous</label>
                <input type="date" name="date_rendezvous" class="form-control @error('date_rendezvous') is-invalid @enderror" value="{{ old('date_rendezvous') }}">
                @error('date_rendezvous')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            
            <div class="col-md-6 col-12">
                <label for="exampleFormControlInput1" class="form-label">Type Rendez-vous</label>
                <select name="type_rendezvous" class="form-control">
                    <option value="controle" class="form-control">controle</option>
                    <option value="consultation" class="form-control">consultation</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Commentaire</label>
                <textarea class="form-control" name="commentaire_rendezvous" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="col-md-6 col-12">
                <label for="exampleFormControlInput1" class="form-label" hidden>Num Patient</label>
                <input type="text" name="num_patient" class="form-control" value="{{$patient->num_patient}}" hidden >
            </div>
            <div class="mb-5">
                <input type="submit" class="btn btn-danger" value="enregistrer">
                <a href="{{url('patient/'.$patient->num_patient.'/afficherpatient')}}" class="btn btn-secondary">Annuler</a>
            </div>
      
        </form>
    </div>
</div>
@endsection