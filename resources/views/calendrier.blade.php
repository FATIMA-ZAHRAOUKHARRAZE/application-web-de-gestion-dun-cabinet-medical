@extends('layouts.master')
@section('content')
<div class="container">
  <div class="card card-primary">
    <div class="card-body">
  <div id="calendar"></div>
    </div></div>
</div>
</div>
    <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          headerToolbar: {
            start: 'title',
            end: 'today prev,next'
        },
        titleFormat: {
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        },
        dayHeaderFormat: {
            weekday: 'long'
        },
        locale: 'fr',
          events: [
                    @foreach ($rendezvous as $rendezvou)
                        {
                            title: '{{$rendezvou->prenom_patient}}  {{ $rendezvou->nom_patient}}',
                            start: '{{ $rendezvou->date_rendezvous }}',
                            end: '{{ $rendezvou->date_rendezvous }}'
                        },
                    @endforeach
                ]
        });  
        calendar.render();
      });
      
    </script>
@endsection







