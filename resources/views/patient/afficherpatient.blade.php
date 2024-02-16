@extends('layouts.master')
@section('content')
@include('sweetalert::alert')
<style>
    h4 {
        color: #007bff;
    }

    .patient-info-container {
        display: flex;
        flex-wrap: wrap;
       
    }

    .patient-info-container span {
        margin-bottom: 10px;
        flex-basis: 60%; /* Divide into two columns */
        font-size: 18px;
    }
</style>
<div class="container">
    <div class="row">
        <div class="card">
            <div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2">
                <ul role="tablist" class="nav bg-light nav-pills rounded nav-fill mb-3">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('antecedent/'.$patient->num_patient.'/afficher_antecedentpat')}}">Les Antécédents</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('patient/'.$patient->num_patient.'/afficherpatient')}}">Informations De Patient</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('consultation/'.$patient->num_patient.'/dossier')}}">Dossier Patient</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{url('patient/'.$patient->num_patient.'/prochainrendezvous')}}">Prochain rendez-vous</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade show active pt-3">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <h4>Les Informations Personnelles</h4>
                            <div class="patient-info-container">
                               <span><strong>Nom patient:</strong>  {{$patient->nom_patient}}</span>
                                <span><strong>Prénom patient:</strong>  {{$patient->prenom_patient}}</span>
                                <span><strong>CIN patient:</strong>  {{$patient->cin}}</span>
                                <span><strong>Age patient:</strong>  {{$patient->age_patient}}</span>
                                <span><strong>Sexe patient:</strong>  {{$patient->sexe_patient}}</span>
                                <span><strong>Mutuelle patient:</strong>  {{$patient->mutuelle_patient}}</span>
                                <span><strong>Tel patient:</strong>  {{$patient->tel_patient}}</span>
                                <span><strong>Adresse patient:</strong>  {{$patient->adresse_patient}}</span>
                                <span><strong>Taille patient (cm):</strong>  {{$patient->taille_patient}}</span>
                                <span><strong>Poids patient (kg):</strong>  {{$patient->poids_patient}}</span>
                                <span><strong>Groupe sanguin:</strong>  {{$patient->groupesanguin}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <a href="{{url('patient')}}" class="btn btn-secondary">Annuler</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>

<script>
    $(document).ready(function() {
        $('.nav-link').on('click', function() {
            $('.nav-link').removeClass('active');
            $(this).addClass('active');
        });
    });
</script>
@endsection
