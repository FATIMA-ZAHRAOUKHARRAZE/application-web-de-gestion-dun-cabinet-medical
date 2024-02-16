@extends('layouts.master')
@section('content')
@include('sweetalert::alert')
<div class="container">
    <div class="row">
            <div class="card ">
        <div class="card-header">
            <h3>Afficher Antecedent</h3>
        </div>
        <div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2">
            <div class="tab-content">
                <div  class="tab-pane fade show active pt-3">
    
        <form action="{{url('antecedent/'.$antecedent->num_ant.'/modifier_antecedent')}}" method="post">
           
            <input type="hidden" name="_method" value="PUT">
            {{ csrf_field() }}
        <div class="row">
           
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"> categorie Antecedent</label>
                <select name="categorie_ant" class="form-control" value="{{$antecedent->caregorie_ant}}">
                    <option value="medical" class="form-control">medical</option>
                    <option value="chirurgical" class="form-control">chirurgical</option>
                    <option value="familial" class="form-control">familial</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">description</label>
                <textarea class="form-control @error('description_ant') is-invalid @enderror" name="description_ant" id="exampleFormControlTextarea1" rows="3">{{$antecedent->description_ant}}</textarea>
                @error('description_ant')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <div class="mb-5">
                <button class="btn btn-danger"><i class="fa-regular fa-pen-to-square"></i> Modifer</button>
                <a href="{{url('antecedent/'.$antecedent->num_patient.'/index')}}" class="btn btn-secondary">Annuler</a>
            </div>
      
        </form>
    </div>
</div>
@endsection