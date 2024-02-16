@extends('layouts.master')
@section('content')
@include('sweetalert::alert')

<div class="container">
    <div class="row">
            <div class="card ">
        <div class="card-header">
            <h3>Afficher  Radiologie</h3>
        </div>
        <div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2">
            <div class="tab-content">
                <div  class="tab-pane fade show active pt-3">
    <form action="{{url('radiologie/'.$radiologie->num_radiologie.'/modifier_radiologie_consultation')}}" method="post">
        <input type="hidden" name="_method" value="PUT">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-6 col-12">
            <label for="exampleFormControlTextarea1" class="form-label">Type Radiologie</label>
            <input  type="text" class="form-control @error('type_radiologie') is-invalid @enderror" value="{{ $radiologie->type_radiologie}}"name="type_radiologie" id="exampleFormControlTextarea1">
            @error('type_radiologie')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
        <div class="col-md-6 col-12">
            <label for="exampleFormControlInput1" class="form-label">Date Radiologie</label>
            <input type="date" name="date_radiologie" class="form-control" value="{{$radiologie->date_radiologie}}">
        </div>

        <div class="mt-3">
            <button class="btn btn-danger"><i class="fa-regular fa-pen-to-square"></i> Modifer</button>
            <a href="{{url('radiologie/'.$randomNumber.'/radiologie_consultation')}}" class="btn btn-secondary">Annuler</a>
        </div>
        </form>
</div>
@endsection