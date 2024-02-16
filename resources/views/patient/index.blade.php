@extends('layouts.master')
@section('content')
@include('sweetalert::alert')
<div class="card">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">LISTE DES PATIENTS</h6>
    </div>
<div class="card-body">
    <div class="table-responsive">
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
                    <div class="col-sm-12 col-md-6">
                    <div class="dt-buttons btn-group flex-wrap">      
                        <a href="{{url('patient/pdf')}}" class="btn btn-light float-end "><i class="fa-solid fa-file-pdf" title="pdf"></i> pdf</a>
                         <a href="{{url('patient/excel')}}" class="btn btn-light float-end "><i class="fa-solid fa-file-excel" title="exel"></i> excel</a>                     
                         @if(!empty($chercher))
                         <a href="{{url('patient')}}" class="btn btn-light float-end">Annuler</a>
                         @endif
                        </div></div>
                    <div class="col-sm-12 col-md-6">
                    <div id="example1_filter" class="dataTables_filter">
                        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="{{url('/patient')}}" method="GET">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small" name="chercher" id="chercher" placeholder="Chercher..." aria-label="Search" aria-describedby="basic-addon2">
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
                    <table class="table table-bordered dataTable" id="tab" width="100%"  role="grid" aria-describedby="dataTable_info" style="width: 100%;" id="tableau">        <head>
      <tr>
        <th scope="col">Nom Patient</th>
        <th scope="col">Prenom Patient</th>
        <th scope="col">Cin</th>
        <th scope="col">Age Patient</th>
        <th scope="col">Sexe Patient</th>
        <th scope="col">Mutuelle Patient</th>
        <th scope="col">Tel Patient</th>
        <th scope="col">Adresse Patient</th>
        <th scope="col">Taille Patient</th>
        <th scope="col">Poids Patient</th>
        <th scope="col">Groupe Sanguin</th>
        <th scope="col">Operations</th>
      </tr>  
    </thead>
    <tbody class="table-group-divider">
        @forelse ($patients as $patient)
                    <tr>
                       
                        <td>
                            {{$patient->nom_patient}}
                        </td>
                        
                        <td>
                            {{$patient->prenom_patient}}
                        </td>
                        <td>{{$patient->cin}}
                        </td>
                        <td>
                            {{$patient->age_patient}}
                        </td>
                        <td>
                            {{$patient->sexe_patient}}
                        </td>
                        
                        <td>
                            {{$patient->mutuelle_patient}}
                        </td>
                        
                        <td>
                            {{$patient->tel_patient}}
                        </td>
                        
                        <td>
                            {{$patient->adresse_patient}}
                        </td>
                        
                        <td>
                            {{$patient->taille_patient}}
                        </td>
                        
                        <td>
                            {{$patient->poids_patient}}
                        </td>
                        <td>
                            {{$patient->groupesanguin}}
                        </td>
                        <td style="text-align:center;width:160px;" >
                            <form action="{{url('patient/'.$patient->num_patient)}}" method="POST">
                                {{ csrf_field() }}
                                @if (Auth()->check() && Auth()->user()->role->nom_role==='secretaire')
                                <a href="{{url('patient/'.$patient->num_patient.'/afficher')}}" class="btn btn-primary"><i class="fa-solid fa-eye" title="afficher"></i></a>
                               @endif
                                @if (Auth()->check() && Auth()->user()->role->nom_role==='medecin')
                                 
                                <a href="{{url('patient/'.$patient->num_patient.'/afficherpatient')}}" class="btn btn-primary"><i class="fa-solid fa-file-waveform"></i></a>
                                @endif
                                @if (Auth()->check() && Auth()->user()->role->nom_role==='secretaire')
                                  <a href="{{url('patient/'.$patient->num_patient.'/rendezvous')}}" class="btn btn-primary"><i class="fa-solid fa-calendar-plus" title="rendez-vous"></i></a>
                                 @endif
                            </form>
                        </td>                            
                        @empty   
                        @endforelse 
                    </tr>
                </tbody>
              </table>    
         </div>
                </div>
                <div class="row"> 
                    <div class="col-sm-12 col-md-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                            {{$patients->links()}}
                        </div>
                    </div>
                </div>
    </div>
    </div>
        </div>
    </div>
  @endsection