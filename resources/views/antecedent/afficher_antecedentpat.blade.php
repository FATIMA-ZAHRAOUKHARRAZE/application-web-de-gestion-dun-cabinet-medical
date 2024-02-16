@extends('layouts.master')
@section('content')
@include('sweetalert::alert')
    <style>
        /* Style CSS personnalisé */
        .patient-card {
            background-color: white;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        h2{
            color: #007bff;
        }
        .link{
            text-align: right;
        }
    </style>
    <div class="container">
        <div class="link">
            <a  class="btn btn-primary" href="{{url('antecedent/'.$patient->num_patient.'/index')}}"> Ajouter Antécédent</a>
            <a  class="btn btn-primary" href="{{url('patient/'.$patient->num_patient.'/afficherpatient')}}"> Annuler</a>
        </div>
        @if(count($antecedent)>0)
        <h2>Les Antécédents du patient</h2>
        
        <div class="patient-card">
            <h4>Nom et Prénom  du patient : {{$patient->nom_patient}}<span> {{$patient->prenom_patient}}</span> </h4>
            @if(count($antecedentsmed)>0) 
            <p>Antécédents médicaux :</p>
            @forelse ($antecedentsmed as $antecedent)
            <ul>
                
                <li>{{$antecedent->description_ant}}</li>
            </ul>
            @empty   
            @endforelse
            @endif
            @if(count($antecedentschir)>0) 
            <p>Antécédents chirurgicaux :</p>
            @forelse ($antecedentschir as $antecedent)
            <ul>
                
                <li>{{$antecedent->description_ant}}</li>
            </ul>
            @empty   
            @endforelse
            @endif
            @if(count($antecedentsfamil)>0) 
            <p>Antécédents familiaux :</p>
            @forelse ($antecedentsfamil as $antecedent)
            <ul>
                
                <li>{{$antecedent->description_ant}}</li>
            </ul>
            @empty   
            @endforelse
            @endif
  
        </div>
  @else      
  <h2>ce patient n'a aucun antécédent</h2>
  @endif
    </div>

</body>
</html>

@endsection
  