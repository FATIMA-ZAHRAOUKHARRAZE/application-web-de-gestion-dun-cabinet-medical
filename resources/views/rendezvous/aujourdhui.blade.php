@extends('layouts.master')
@section('content')
@include('sweetalert::alert')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">LISTE DSE RENDEZ-VOUS</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="dt-buttons btn-group flex-wrap">      
                            <a href="{{url('rendezvous/pdf_aujourdhui')}}" class="btn btn-light float-end"><i class="fa-solid fa-file-pdf" title="pdf"></i> pdf</a>
                            <a href="{{url('rendezvous/excel_aujourdhui')}}" class="btn btn-light float-end"><i class="fa-solid fa-file-excel" title="exel"></i> excel</a> 
                            @if(!empty($chercher))
        
                        <a href="{{url('rendezvous/aujourdhui')}}" class="btn btn-light float-end">Annuler</a>
                        @endif
                        </div></div>
                        <div class="col-sm-12 col-md-6">
                        <div id="example1_filter" class="dataTables_filter">
                            <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="{{url('rendezvous/aujourdhui')}}" method="GET">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small" name="chercher" placeholder="Chercher for..." aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            
                            </form>
                        </div></div></div>
                    </div>
                    <div class="row"><div class="col-sm-12">
                        <table class="table table-bordered dataTable" width="100%"  role="grid" aria-describedby="dataTable_info" style="width: 100%;" id="tableau">    

                            <head>
    <tr>
        <th scope="col">Num</th>
        <th scope="col">Nom Patient</th>
        <th scope="col">Prenom Patient</th>
        <th scope="col">Date Rendez-vous</th>
        <th scope="col">Type Rendez-vous</th>
        <th scope="col">Commentaire</th>
        <th scope="col">Operations</th>
    </tr>
    </thead>
    <tbody class="table-group-divider">
        @forelse ($rendezvou as $rendezvous)
                    <tr>
                        <td>{{$rendezvous->num_rendezvous}}
                        </td>
                        <td>
                            {{$rendezvous->nom_patient}}
                        </td>
                        <td>
                            {{$rendezvous->prenom_patient}}
                        </td>
                        <td>
                            {{Carbon\Carbon::parse($rendezvous->date_rendezvous)->format('d-m-Y')}}
                        </td>
                        <td>
                            @if($rendezvous->type_rendezvous=='consultation')
                            
                            <span class="badge badge-primary"> {{$rendezvous->type_rendezvous}}</span>
                            
                            @else
                            <span class="badge badge-secondary"> {{$rendezvous->type_rendezvous}}</span>
   
                            @endif 
                        </td>
                        <td>
                            {{$rendezvous->commentaire_rendezvous}}
                        </td>
                        
                        <td>
                            <form action="{{url('rendezvous/'.$rendezvous->num_rendezvous.'/delete_aujourdhui')}}" method="POST">
                                {{ csrf_field() }}
                                {{method_field('DELETE')}}
                                <a href="{{url('rendezvous/'.$rendezvous->num_rendezvous.'/afficher_aujourdhui')}}" class="btn btn-primary"><i class="fa-solid fa-eye" title="afficher"></i></a>
                                 
                                <button type="submit"class="btn btn-danger delete_confirm" data-toggle="tooltip" titre="Delete"><i class="fa-solid fa-trash"></i></button>
                                 
                            </form>
                        </td>     
                        @empty   
                        @endforelse 
                    </tr>
    </tbody>
  </table>
  <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <script type="text/javascript">
   $('.delete_confirm').click(function(event) {
var form = $(this).closest("form");
var name = $(this).data("name");
event.preventDefault();
swal({
icon:"error",
title: `Etes vous sur de vouloir suprimer ce rendez-vous`,
buttons: ["annuler","oui"],
dangerMode:true,

})
.then((willDelete) => {
if (willDelete) {
form.submit();
}
});
}); </script>
    </div>
    <div class="row"> 
        <div class="col-sm-12 col-md-7">
            <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                {{$rendezvou->links()}}</div></div></div> 
</div>
  @endsection
  