@extends('layouts.master')

@section('content')
@include('sweetalert::alert')

<style>
    .link {
        text-align: right;
    }

    .list-group-item {
        border: none;
        background-color: #f8f9fa;
    }

    .list-group-item:hover {
        background-color: #e9ecef;
    }

    .list-group-item span {
        float: right;
    }

    #consultation-details-container,
    #controle-details-container {
        display: none;
        margin-top: 20px;
        border: 1px solid #dee2e6;
        padding: 10px;
        background-color: #f8f9fa;
        border-radius: 5px;
    }
</style>

<div class="container">
    <div class="row">
        <div class="link">
            <a class="btn btn-primary" href="{{url('consultation/'.$patient->num_patient.'/consultation_patient')}}"> Ajouter une consultation</a>
            <a class="btn btn-primary" href="{{url('controle/'.$patient->num_patient.'/controle_patient')}}"> Ajouter un controle</a>
            <a class="btn btn-primary" href="{{url('patient/'.$patient->num_patient.'/afficherpatient')}}"> Annuler</a>
        </div>

        <div class="col-4 col-sm-3">
            <div class="list-group">
                @if(count($consultation) > 0)
                <h4>Les Consultations</h4>
                @forelse ($consultation as $consultation)
                <a class="list-group-item consultation-details" data-id="{{ $consultation->num_consultation }}">Consultation<span>{{Carbon\Carbon::parse($consultation->date_consultation)->format('d-m-Y')}}</span></a>
                <br>
                @empty
                @endforelse
                @else
                <h4>Aucune consultation</h4>
                @endif
                <br>
                @if(count($controle) > 0)
                <h4>Les Controles</h4>
                @forelse ($controle as $controle)
                <a class="list-group-item controle-details" data-id="{{ $controle->num_controle }}">Controle<span>{{Carbon\Carbon::parse($controle->date_controle)->format('d-m-Y')}}</span></a>
                <br>
                @empty
                @endforelse
                @endif
            </div>
        </div>

        <div class="col-7 col-sm-9">
            <div id="consultation-details-container">
                <!-- Les détails de la consultation seront affichés ici -->
            </div>
            <div id="controle-details-container">
                <!-- Les détails du controle seront affichés ici -->
            </div>
        </div>
    </div>
</div>

<script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('.consultation-details').on('click', function() {
            $('#controle-details-container').hide();
            $('#consultation-details-container').show();

            var consultationId = $(this).data('id');
            getConsultationDetails(consultationId);
        });

        function getConsultationDetails(consultationId) {
            $.ajax({
                url: '/consultation/' + consultationId + '/details',
                type: 'GET',
                success: function(response) {
                    $('#consultation-details-container').html(response);
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        }

        $('.controle-details').click(function() {
            $('#consultation-details-container').hide();
            $('#controle-details-container').show();

            var controleId = $(this).data('id');
            getControleDetails(controleId);
        });

        function getControleDetails(controleId) {
            $.ajax({
                url: '/controle/' + controleId + '/details',
                method: 'GET',
                success: function(response) {
                    $('#controle-details-container').html(response);
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                }
            });
        }
    });
</script>
@endsection
