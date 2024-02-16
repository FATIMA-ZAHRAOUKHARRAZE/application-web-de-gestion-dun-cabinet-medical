@extends('layouts.master')
@section('content')
@include('sweetalert::alert')
<div class="container">
    <div class="row">
        <div class="card ">
            <div class="card-header">
                <h3>Ajouter Analyse</h3>
            </div>
                <div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2">
                    <div class="tab-content">
                        <div  class="tab-pane fade show active pt-3">
                <form action="{{url('analyse/analyse_consultation')}}" method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6 col-12">
                        <label for="exampleFormControlInput1" class="form-label">Nom Patient</label>
                        <input type="text" name="nom_patient" class="form-control" value="{{$consultation->nom_patient}}"readonly >
                    </div>
                    <div class="col-md-6 col-12">
                        <label for="exampleFormControlInput1" class="form-label">Prenom Patient</label>
                        <input type="text" name="prenom_patient" class="form-control" value="{{$consultation->prenom_patient}}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Type Analyse</label>
                        <input  type="text" class="form-control @error('type_analyse') is-invalid @enderror" value="{{ old('type_analyse') }}" name="type_analyse" id="exampleFormControlTextarea1">
                        @error('type_analyse')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="mb-5">
                        <input type="submit" class="btn btn-danger" value="Enregistrer">   
                        <a href="{{url('analyse/pdf_consultation')}}" class="btn btn-primary"><i class="fa-solid fa-print"></i> Imprimer</a>
                
                        <a href="{{url('consultation/'.$consultation->num_patient.'/consultation_patient')}}" class="btn btn-secondary">Annuler</a>

                    </div>
            
                </form>
    </div>
    @if(count($analyses)>0) 
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <div class="row">   
            <table class="table table-bordered dataTable" width="100%"  role="grid" aria-describedby="dataTable_info" style="width: 100%;" id="tableau">
          <head>
            <tr>
            <th scope="col">Date Analyse</th>
            <th scope="col">Type Analyse</th>
            <th scope="col">Operations</th>
          </tr>
        </thead>
        <tbody class="table-group-divider" >
            @forelse ($analyses as $analyse)
                        <tr>
                            <td>
                                {{Carbon\Carbon::parse($analyse->date_analyse)->format('d-m-Y')}}
                            </td>
                            <td>
                                {{$analyse->type_analyse}}
                            </td>
                            <td>
                                <form action="{{url('analyse/'.$analyse->num_analyse.'/delete_analyse_consultation')}}" method="POST">
                                    {{ csrf_field() }}
                                    {{method_field('DELETE')}}
                                    <a href="{{url('analyse/'.$analyse->num_analyse.'/afficher_analyse_consultation')}}" class="btn btn-primary"><i class="fa-solid fa-eye" title="afficher"></i></a>
                                    <button type="submit"class="btn btn-danger delete_confirm" data-toggle="tooltip" titre="Delete"><i class="fa-solid fa-trash"></i></button>
                                      
                                </form>
                            </td>     
                            @empty   
                            @endforelse 
                        </tr>
        </tbody>
      </table>
      <div class="row"> 
        <div class="col-sm-12 col-md-7">
            <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                {{$analyses->links()}}</div></div></div>
      @endif
      <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
      <script type="text/javascript">
       $('.delete_confirm').click(function(event) {
    var form = $(this).closest("form");
    var name = $(this).data("name");
    event.preventDefault();
    swal({
    icon:"error",
    title: `Etes vous sur de vouloir supprimer cette analyse`,
    buttons: ["annuler","oui"],
    dangerMode:true,
    
    })
    .then((willDelete) => {
    if (willDelete) {
    form.submit();
    }
    });
    }); 
    </script>
        </div>
    </div>  
 </div>
</div>
</div>
    
      @endsection