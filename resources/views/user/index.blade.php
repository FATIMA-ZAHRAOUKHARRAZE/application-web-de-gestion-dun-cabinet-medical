@extends('layouts.master')
@section('content')
@include('sweetalert::alert')
<div class="card">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">LISTE DES UTILISATEURS</h6>
    </div>
<div class="card-body">
    <div class="table-responsive">
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row"><div class="col-sm-12">
                    <table class="table table-bordered dataTable" width="100%"  role="grid" aria-describedby="dataTable_info" style="width: 100%;" id="tableau">        <head>
      <tr>
       
        <th scope="col">Nom Complet</th>
        <th scope="col">Username</th>
        <th scope="col">Role</th>
        <th scope="col">Operations</th>
      </tr>  
    </thead>
    <tbody class="table-group-divider">
        @forelse ($users as $user)
                    <tr>
                       
                        <td>
                            {{$user->nom}}
                        </td>
                        
                        <td>
                            {{$user->username}}
                        </td>
                        <td>
                            <span class="badge badge-info">{{$user->nom_role}}</span>
                            
                        </td>
                       
                        <td>
                            <form action="{{url('user/'.$user->id)}}" method="POST">
                                {{ csrf_field() }}
                                {{method_field('DELETE')}}      
                                <a href="{{url('user/'.$user->id.'/afficher')}}" class="btn btn-primary"><i class="fa-solid fa-eye" title="afficher"></i></a>
                          
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
            title: `Etes vous sur de vouloir supprimer ce utilisateur`,
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
                <div class="row"> 
                    <div class="col-sm-12 col-md-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                            {{$users->links()}}</div></div></div>
                        </div>
                    </div> 
    </div>
   
    </div>
        </div>
  @endsection
  