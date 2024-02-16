<?php

namespace App\Http\Controllers;

use App\Models\Rendezvou;
use Illuminate\Http\Request;

class CalendrierController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth'); 
    }
    public function calendrier()
    {
        $rendezvous=Rendezvou::join('patients','rendezvous.num_patient','=','patients.num_patient')->get();
        return view('calendrier', compact('rendezvous'));
    }
}
