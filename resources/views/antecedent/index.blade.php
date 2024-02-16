@extends('layouts.master')
@section('content')
@include('sweetalert::alert')
<div class="container">
    <div class="row">
    <div class="card ">
        <div class="card-header">
            <h3>Ajouter Antecedent</h3>
        </div>
        <div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2">
            <div class="tab-content">
                <div  class="tab-pane fade show active pt-3">
    
    <form action="{{url('antecedent/ajouter')}}" method="post">
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
                <label for="exampleFormControlInput1" class="form-label"> categorie Antecedent</label>
                <select name="categorie_ant" class="form-control">
                    <option value="medical" class="form-control">medical</option>
                    <option value="chirurgical" class="form-control">chirurgical</option>
                    <option value="familial" class="form-control">familial</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">description</label>
                <textarea class="form-control @error('description_ant') is-invalid @enderror"value="{{ old('description_ant') }}" name="description_ant" id="exampleFormControlTextarea1" rows="3"></textarea>
                @error('description_ant')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <div class="col-md-6 col-12">
                <label for="exampleFormControlInput1" class="form-label" hidden>Num Patient</label>
                <input type="text" name="num_patient" class="form-control" value="{{$patient->num_patient}}" hidden >
            </div>
            <div class="mb-5">
                <input type="submit" class="btn btn-danger" value="enregistrer">
                <a href="{{url('antecedent/'.$patient->num_patient.'/afficher_antecedentpat')}}" class="btn btn-secondary">Annuler</a>
            </div>
      
        </form>
    @if(count($antecedents)>0) 
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <div class="row">      
    
            <table class="table table-bordered dataTable" width="100%"  role="grid" aria-describedby="dataTable_info" style="width: 100%;" id="tableau">
          <head>
            <tr>
            <th scope="col">Categorie Antecedent</th>
            <th scope="col">Descriptif Antecedent</th>
            <th scope="col">Operations</th>
          </tr>
        </thead>
        <tbody class="table-group-divider" >
            @forelse ($antecedents as $antecedent)
                        <tr>
                            <td>
                                {{$antecedent->categorie_ant}}
                            </td>
                            <td>
                                {{$antecedent->description_ant}}
                            </td>
                            <td>
                                <form action="{{url('antecedent/'.$antecedent->num_ant.'/delete_antecedent')}}" method="POST">
                                    {{ csrf_field() }}
                                    {{method_field('DELETE')}}
                                    <a href="{{url('antecedent/'.$antecedent->num_ant.'/afficher')}}" class="btn btn-primary"><i class="fa-solid fa-eye" title="afficher"></i></a>
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
                {{$antecedents->links()}}</div></div></div>
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
    title: `Etes vous sur de vouloir supprimer ce antecedent`,
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
    </div>  
    </div>
</div></div>
</div>
@endsection