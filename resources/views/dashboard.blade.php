@extends('layouts.master')
@section('content')
<div class="container-fluid">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1> 
</div>
<div class="row">
  <section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-light">
              <div class="inner">
                <h3>{{$rendezvous}}</h3>
                <p>Rendez-Vous</p>
              </div>
              <div class="icon">
                <i class="fa-regular fa-calendar"></i>
              </div>
            </div>
        </div>
          <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-light">
              <div class="inner">
                <h3>{{$patient}}</h3>
                <p>Patients</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-person"></i>
              </div>
            </div>
        </div>
          <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-light">
              <div class="inner">
                <h3>{{$consultation}}</h3>
                <p>Consultation</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-stethoscope"></i>
              </div>
            </div>
        </div>
          <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-light">
              <div class="inner">
                <h3>{{$controle}}</h3>
                <p>Controle</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-stethoscope"></i>
              </div>
            </div>
        </div>
        <div class="col-md-6">
          <!-- NOMBRE DES RENDEZ-VOUS -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">NOMBRE DES RENDEZ-VOUS</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="chart">
                <canvas id="rendezvous" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->  
        </div>
        <div class="col-md-6">
          <!-- NOMBRE DES PATIENTS -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">NOMBRE DES PATIENTS</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="chart">
                <canvas id="patient" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
            </div>
        <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
  
<script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('js/TodoList.js')}}"></script>
<script src="{{asset('/plugins/chart.js/Chart.min.js')}}"></script>
<script>
   document.addEventListener('DOMContentLoaded', function() {
            var ctx = document.getElementById('rendezvous').getContext('2d');
            var chart = new Chart(ctx, {
              type: 'bar',
                data: {
                    labels: {!! json_encode($labels) !!},
                    datasets: [{
                        label: 'Nombre de rendez-vous',
                        data: {!! json_encode($data) !!},
                        backgroundColor: 'rgba(60,141,188,0.8)',
                        fill:false,
                        
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
                
            });
            var ctx = document.getElementById('patient').getContext('2d');
            var chart = new Chart(ctx, {
              type: 'bar',
                data: {
                    labels: {!! json_encode($label) !!},
                    datasets: [{
                        label: 'Nombre de patient',
                        data: {!! json_encode($datas) !!},
                        backgroundColor: 'rgba(60,141,188,0.8)',
                        fill:false,
                        
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
                
            });
        });
    </script>
@endsection