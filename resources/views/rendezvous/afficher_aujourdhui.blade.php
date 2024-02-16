@extends('layouts.master')
@section('content')
@include('sweetalert::alert')
<div class="container">
    <div class="row">
            <div class="card ">
        <div class="card-header">
            <h3>Afficher Rendez-Vous</h3>
        </div>
        <div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2">
            <div class="tab-content">
                <div  class="tab-pane fade show active pt-3">
        <form action="{{url('rendezvous/'.$rendezvous->num_rendezvous.'/modifier_aujourdhui')}}" method="post">
        <input type="hidden" name="_method" value="PUT">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-6 col-12">
                <label for="exampleFormControlInput1" class="form-label">Date Rendez-vous</label>
                <input type="date" name="date_rendezvous" class="form-control @error('date_rendezvous') is-invalid @enderror" value="{{ $rendezvous->date_rendezvous}}">
                @error('date_rendezvous')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <div class="col-md-6 col-12">
                <label for="exampleFormControlInput1" class="form-label">Type Rendez-vous</label>
                <select name="type_rendezvous" class="form-control" value="{{$rendezvous->type_rendezvous}}">
                    <option value="controle" class="form-control" {{$rendezvous->type_rendezvous==='controle'?'selected':''}}>controle</option>
                    <option value="consultation" class="form-control" {{$rendezvous->type_rendezvous==='consultation'?'selected':''}}>consultation</option>
                   
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Commentaire</label>
                <textarea class="form-control" name="commentaire_rendezvous" id="exampleFormControlTextarea1" rows="3">{{$rendezvous->commentaire_rendezvous}}</textarea>
            </div>
            <div class="mb-5">
                <button class="btn btn-danger"><i class="fa-regular fa-pen-to-square"></i> Modifer</button>
            <a href="{{url('rendezvous/aujourdhui')}}" class="btn btn-secondary">Annuler</a>
            </div>
        </div>
        </form>
    </div>
</div>
@endsection