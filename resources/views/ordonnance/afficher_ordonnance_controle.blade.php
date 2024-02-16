@extends('layouts.master')
@section('content')
@include('sweetalert::alert')
<div class="container">
    <div class="row">
    <div class="card ">
        <div class="card-header">
            <h3>Afficher Ordonnance</h3>
        </div>
        <div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2">
            <div class="tab-content">
                <div  class="tab-pane fade show active pt-3">
    
    <form action="{{url('ordonnance/'.$ordonnance->num_ordonnance.'/modifier_ordonnance_controle')}}" method="post">
        <input type="hidden" name="_method" value="PUT">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-6 col-12">
            <label for="exampleFormControlTextarea1" class="form-label">Nom Medicament</label>
            <input  type="text" class="form-control @error('nom_medicament') is-invalid @enderror" value="{{ $ordonnance->nom_medicament }}" name="nom_medicament" id="exampleFormControlTextarea1">
            @error('nom_medicament')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
        <div class="col-md-6 col-12">
            <label for="exampleFormControlInput1" class="form-label">Date Ordonnance</label>
            <input type="date" name="date_ordonnance" class="form-control" value="{{$ordonnance->date_ordonnance}}">
        </div>
        
        <div class="col-md-6 col-12">
            <label for="exampleFormControlTextarea1" class="form-label">Quantite Medicament</label>
            <input type="text" class="form-control @error('quantite_medicament') is-invalid @enderror" value="{{ $ordonnance->quantite_medicament}}" name="quantite_medicament" id="exampleFormControlTextarea1">
            @error('quantite_medicament')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
        <div class="col-md-6 col-12">
            <label for="exampleFormControlTextarea1" class="form-label">Posologie Medicament</label>
            <input type="text" class="form-control @error('posologie_medicament') is-invalid @enderror" value="{{ $ordonnance->posologie_medicament}}" name="posologie_medicament" id="exampleFormControlTextarea1">
            @error('posologie_medicament')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
        <div class="mt-3">
            <button class="btn btn-danger"><i class="fa-regular fa-pen-to-square"></i> Modifer</button>
            <a href="{{url('ordonnance/'.$randomcontrole.'/ordonnance_controle')}}" class="btn btn-secondary">Annuler</a>
        </div>
</form>
</div>
</div>
@endsection