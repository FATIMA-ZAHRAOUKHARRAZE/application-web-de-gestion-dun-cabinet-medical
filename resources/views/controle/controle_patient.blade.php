@extends('layouts.master')
@section('content')
@include('sweetalert::alert')
<style>
    
  .card-header{
   color: #007bff;
  }
   </style>
<div class="container">
  <div class="row">
          <div class="card ">
      <div class="card-header">
        <h3>Ajouter Controle</h3>
      </div>
    <div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2">
      <ul role="tablist" class="nav bg-light nav-pills  nav-fill mb-3">

          <li class="nav-item">
            <a class="nav-link" href="{{url('ordonnance/'.$num_controle.'/ordonnance_controle')}}">ordonnance</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('analyse/'.$num_controle.'/analyse_controle')}}">analyse</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('radiologie/'.$num_controle.'/radiologie_controle')}}">radiologie</a>
            
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('certificat/'.$num_controle.'/certificatinitiale_controle')}}">certificat initial</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{url('certificat/'.$num_controle.'/certificatprolongation_controle')}}">certificat prolongation</a>
         
      </li>
    </ul>
  
    <div class="tab-content">
      <div  class="tab-pane fade show active pt-3">
    
        <form action="{{url('controle/controle_patient')}}" method="post">
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
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Motif Controle</label>
              <textarea class="form-control @error('motif_controle') is-invalid @enderror" value="{{ old('motif_controle') }}" name="motif_controle" id="exampleFormControlTextarea1" rows="3"></textarea>
              @error('motif_controle')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
            </div>
          <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Diagnostic Controle</label>
              <textarea class="form-control  @error('diagnostic_controle') is-invalid @enderror" value="{{ old('diagnostic_controle') }}" name="diagnostic_controle" id="exampleFormControlTextarea1" rows="3"></textarea>
              @error('diagnostic_controle')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Commentaire Controle</label>
                <textarea class="form-control" name="commentaire_controle" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="col-md-6 col-12">
                <label for="exampleFormControlInput1" class="form-label" hidden>Num patient</label>
                <input type="text" name="num_patient" class="form-control" value="{{$patient->num_patient}}"hidden >
            </div>
            <div class="mb-5">
                <input type="submit" class="btn btn-danger" value="Enregistrer">
                  <a href="{{url('controle/'.$num_controle.'/afficher')}}" class="btn btn-primary">Afficher</a>      
              <a href="{{url('consultation/'.$patient->num_patient.'/dossier')}}" class="btn btn-secondary">Annuler</a>
              </div>
          
      
        </form>
    </div>
</div>
<script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>

<script>
    $(document).ready(function() {
      $('.nav-link').on('click', function() {
        $('.nav-link').removeClass('active');
        $(this).addClass('active');
      });
    });
  </script>

@endsection