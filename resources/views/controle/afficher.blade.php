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
        <h3>Afficher Controle</h3>
    </div>
        <div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2">
            <div class="tab-content">
                <div  class="tab-pane fade show active pt-3">
        <form action="{{url('controle/'.$controle->num_controle.'/modifier_controle')}}" method="post">
            <input type="hidden" name="_method" value="PUT">
        {{ csrf_field() }}
        <div class="row">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Date Controle</label>
                <input type="date" name="date_controle" class="form-control" value={{$controle->date_controle}}>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Motif Controle</label>
                <textarea class="form-control @error('motif_controle') is-invalid @enderror" name="motif_controle" id="exampleFormControlTextarea1" rows="3">{{$controle->motif_controle}}</textarea>
                @error('motif_controle')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
              </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Diagnostic Controle</label>
                <textarea class="form-control  @error('diagnostic_controle') is-invalid @enderror"  name="diagnostic_controle" id="exampleFormControlTextarea1" rows="3">{{$controle->diagnostic_controle}}</textarea>
                @error('diagnostic_controle')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
              </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Commentaire Controle</label>
                <textarea class="form-control" name="commentaire_controle" id="exampleFormControlTextarea1" rows="3">{{$controle->commentaire_controle}}</textarea>
            </div>
            <div class="mb-5">
                <button class="btn btn-danger"><i class="fa-regular fa-pen-to-square"></i> Modifer</button>
                <a href="{{url('controle/'.$controle->num_patient.'/controle_patient')}}" class="btn btn-secondary">Annuler</a>
            </div>
        </div>
      
        </form>
    </div>
</div>
    </div>
    </div>
@endsection