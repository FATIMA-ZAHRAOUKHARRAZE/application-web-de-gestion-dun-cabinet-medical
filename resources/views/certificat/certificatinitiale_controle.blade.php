@extends('layouts.master')
@section('content')
@include('sweetalert::alert')
<div class="container">
    <div class="row">
    <div class="card ">
        <div class="card-header">
            <h3>Ajouter Certificat Initial</h3>
        </div>
        <div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2">
            <div class="tab-content">
                <div  class="tab-pane fade show active pt-3">
    
        <form action="{{url('certificat/certificatinitiale_controle')}}" method="post">
          
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-6 col-12">
                <label for="exampleFormControlInput1" class="form-label">Nom Patient</label>
                <input type="text" name="nom_patient" class="form-control" value="{{$controle->nom_patient}}"readonly >
            </div>
            <div class="col-md-6 col-12">
                <label for="exampleFormControlInput1" class="form-label">Prenom Patient</label>
                <input type="text" name="prenom_patient" class="form-control" value="{{$controle->prenom_patient}}" readonly>
            </div>
            <div class="col-md-6 col-12">
                <label for="exampleFormControlInput1" class="form-label">Cin Patient</label>
                <input type="text" name="cin_patient" class="form-control" value="{{$controle->cin}}" readonly>
            </div>
            <div class="col-md-6 col-12">
                <label for="exampleFormControlTextarea1" class="form-label">Nombre De Jour</label>
                <input  type="number" class="form-control @error('nbrjour_certificat') is-invalid @enderror" value="{{ old('nbrjour_consultation') }}"name="nbrjour_certificat" id="exampleFormControlTextarea1">
                @error('nbrjour_certificat')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <div class="col-md-6 col-12">
                <label for="exampleFormControlTextarea1" class="form-label">Date Debut</label>
                <input type="date" class="form-control @error('date_debut') is-invalid @enderror" value="{{ old('date_debut') }}" name="date_debut" id="exampleFormControlTextarea1">
                @error('date_debut')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <div class="col-md-6 col-12">
                <label for="exampleFormControlTextarea1" class="form-label">Date Fin</label>
                <input type="date" class="form-control @error('date_fin') is-invalid @enderror" value="{{ old('date_fin') }}" name="date_fin" id="exampleFormControlTextarea1">
                @error('date_fin')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <div class="mt-3">
                <input type="submit" class="btn btn-danger" value="Enregistrer">
                <a href="{{url('certificat/afficher_certificatinitiale_controle')}}" class="btn btn-primary">Afficher</a>    
                <a href="{{url('certificat/pdf_initiale_controle')}}" class="btn btn-primary"><i class="fa-solid fa-print"></i> Imprimer</a>
                <a href="{{url('controle/'.$controle->num_patient.'/controle_patient')}}" class="btn btn-secondary">Annuler</a>  

            </div>
        </div>
        </form>
    </div>
      
  <script>
    document.addEventListener('DOMContentLoaded', function() {
        var nbrjourInput = document.querySelector('input[name="nbrjour_certificat"]');
        var dateDebutInput = document.querySelector('input[name="date_debut"]');
        var dateFinInput = document.querySelector('input[name="date_fin"]');

        nbrjourInput.addEventListener('input', calculateEndDate);
        dateDebutInput.addEventListener('input', calculateEndDate);

        function calculateEndDate() {
            var startDate = dateDebutInput.value;
            var numberOfDays = parseInt(nbrjourInput.value);
            if (startDate && numberOfDays) {
                var endDate = new Date(startDate);
                endDate.setDate(endDate.getDate() + numberOfDays);
                dateFinInput.value = endDate.toISOString().substr(0, 10);
            }
        }
    });
</script>
  @endsection
  