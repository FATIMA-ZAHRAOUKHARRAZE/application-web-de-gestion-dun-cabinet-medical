<?php

namespace App\Http\Controllers;
use App\Models\Patient;
use App\Models\Rendezvou;
use Carbon\Carbon;
use Dompdf\Renderer;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth'); 
    }
    public function dashboard()
    {
        $rendezvous=Rendezvou::join('patients','rendezvous.num_patient','=','patients.num_patient')->where('date_rendezvous',now()->format('Y-m-d'))->count();
        $consultation=Rendezvou::where('type_rendezvous','consultation')->where('date_rendezvous',now()->format('Y-m-d'))->count();
        $controle=Rendezvou::where('type_rendezvous','controle')->where('date_rendezvous',now()->format('Y-m-d'))->count();
        $patient=Patient::count();
        //chart js de rendez-vous
        $rendezvou = Rendezvou::selectRaw('COUNT(*) as count, YEAR(date_rendezvous) as year, MONTH(date_rendezvous) as month')
        ->groupBy('year', 'month')
        ->orderBy('year', 'asc')
        ->orderBy('month', 'asc')
        ->get();

    $labels = [];
    $data = [];

    foreach ($rendezvou as $rendezvouss) {
        $monthName = Carbon::create()->month($rendezvouss->month)->format('F');
        $labels[] = $monthName;
        $data[] = $rendezvouss->count;
    }
    // chart js de patient
    $patients = Patient::selectRaw('COUNT(*) as count, YEAR(created_at) as year, MONTH(created_at) as month')
        ->groupBy('year', 'month')
        ->orderBy('year', 'asc')
        ->orderBy('month', 'asc')
        ->get();

    $label = [];
    $datas = [];
    
    foreach ($patients as $patiente) {
        $monthName = Carbon::create()->month($patiente->month)->format('F');
        $label[] = $monthName;
       
        $datas[] = $patiente->count;
        
        
    }

        return view('dashboard',compact('rendezvous','patient','consultation','controle','labels','data','label','datas'));
       
    }
}