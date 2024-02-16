@extends('layouts.master')
@section('content')
@include('sweetalert::alert')
<style>
    
    .card-header{
     color: #007bff;
    }
     </style>
<div class="container">
    <div class="card ">
   
        <div class="card-header">
            <h3>Afficher Consultation</h3>
        </div>
        <div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2">
            <div class="tab-content">
                <div  class="tab-pane fade show active pt-3">
    <form action="{{url('consultation/'.$consultation->num_consultation.'/modifier_consultation')}}" method="post">
        <input type="hidden" name="_method" value="PUT">
    {{ csrf_field() }}
        <div class="row">
            
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Motif Consultation</label>
                <textarea class="form-control @error('motif_consultation') is-invalid @enderror" name="motif_consultation" id="exampleFormControlTextarea1" rows="3">{{ $consultation->motif_consultation }}</textarea>
                @error('motif_consultation')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
              </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Date Consultation</label>
                <input type="date" name="date_consultation" class="form-control" value="{{$consultation->date_consultation}}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Diagnostic Consultation</label>
                <textarea class="form-control  @error('diagnostic_consultation') is-invalid @enderror" name="diagnostic_consultation" id="exampleFormControlTextarea1" rows="3">{{ $consultation->diagnostic_consultation }}</textarea>
                @error('diagnostic_consultation')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
              </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Commentaire Consultation</label>
                <textarea class="form-control" name="commentaire_consultation" id="exampleFormControlTextarea1" rows="3">{{$consultation->commentaire_consultation}}</textarea>
            </div>
            
            <div class="mb-5">
                <button class="btn btn-danger"><i class="fa-regular fa-pen-to-square"></i> Modifer</button>
                <a href="{{url('consultation/'.$consultation->num_patient.'/consultation_patient')}}" class="btn btn-secondary">Annuler</a>
            </div>
        </form>
    </div>
</div>
        </div>
@endsection