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
            <h3>Afficher Utilisateur</h3>
        </div>
        <div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2">
            <div class="tab-content">
                <div  class="tab-pane fade show active pt-3">
    
        <form action="{{url('user/'.$user->id.'/modifier')}}" method="post">
           
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <label  for="exampleFormControlInput1" class="col-md-4 col-form-label text-md-right">Nom</label>
                <div class="col-md-6">
                <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror" value="{{$user->nom}}">
                @error('nom')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                
            @enderror
        </div>
            </div>
            <div class="row mb-3">
                <label  for="exampleFormControlInput1" class="col-md-4 col-form-label text-md-right">Username</label>
                <div class="col-md-6">
                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" value="{{$user->username}}">
                @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                
            @enderror
        </div>
            </div>
            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                <button class="btn btn-danger"><i class="fa-regular fa-pen-to-square"></i> Modifer</button>
                <a href="{{url('user')}}" class="btn btn-secondary">Annuler</a>
            </div>
            </div>
      
        </form>
    </div>

@endsection