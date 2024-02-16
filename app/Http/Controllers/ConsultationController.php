<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;

use Alert;
use App\Http\Requests\CreateConsultationRequest;
use App\Models\Analyse;
use App\Models\Certificat;
use Illuminate\Support\Facades\Cache;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Models\Consultation;
use App\Models\Ordonnance;
use App\Models\Controle;
use App\Models\Radiologie;
use Illuminate\Console\View\Components\Alert as ComponentsAlert;

class ConsultationController extends Controller
{
    public static $randomNumber;
    public function __construct()
    {
        $this->middleware('auth'); 
        self::$randomNumber=Consultation::orderBy('num_consultation','desc')->value('num_consultation');
       
    }
    //afficher les information de patient dans la consultation
    public function patient($id)
    {
        $patient = Patient::find($id);
        $num_consultation=self::$randomNumber;
       // dd($num_consultation);
     
             return view('consultation.consultation_patient',['patient'=>$patient],compact('num_consultation'));
    }
    // afficher consultation
    public function consultation($id)
    {  $patient=Patient::find($id);
        $consultation = Consultation::where('num_patient',$id)->orderBy('date_consultation','desc')->get();
        $controle = Controle::where('num_patient',$id)->orderBy('date_controle','desc')->get();
        return view('consultation.dossier',['patient'=>$patient,'consultation'=>$consultation,'controle'=>$controle]);

    }
    public function details($id)
    {
        $certificatinit=Certificat::where('num_consultation',$id)->where('type_certificat','certificat initiale')->first();
        $certificatpro=Certificat::where('num_consultation',$id)->where('type_certificat','certificat prolongation')->first();

        $analyses =Analyse::where('num_consultation',$id)->get();
        $radiologies=Radiologie::where('num_consultation',$id)->get();
        $ordonnance=Ordonnance::where('num_consultation',$id)->get();
        $consultation = Consultation::where('num_consultation',$id)->first();
        return view('consultation.details',['consultation'=>$consultation,'ordonnance'=>$ordonnance,'analyses'=>$analyses,'radiologies'=>$radiologies,'certificatinit'=>$certificatinit,'certificatpro'=>$certificatpro]);
 
    }
   
    // enregistrer consultation
    public function enregistrer_consultation(CreateConsultationRequest $request)
    {
        $consultation=new Consultation();
        $consultation->date_consultation=now()->format('Y-m-d');
        $consultation->motif_consultation=$request->input('motif_consultation');
        $consultation->diagnostic_consultation=$request->input('diagnostic_consultation');
        $consultation->commentaire_consultation=$request->input('commentaire_consultation');
        $consultation->num_patient=$request->input('num_patient');
        $consultation->save();
        Alert::toast('consultation est ajouter','success');
        return redirect('consultation/'.$consultation->num_patient.'/consultation_patient');
    }    
    public function afficher_consultation($id)
    {
        $consultation = Consultation::find($id);
        return view('consultation.afficher_consultation',['consultation'=>$consultation]);
    }
    public function modifier_consultation(CreateConsultationRequest $request ,$id)
    {
        $consultation=Consultation::find($id);
        $consultation->date_consultation=$request->input('date_consultation');
        $consultation->motif_consultation=$request->input('motif_consultation');
        $consultation->diagnostic_consultation=$request->input('diagnostic_consultation');
        $consultation->commentaire_consultation=$request->input('commentaire_consultation');
        $consultation->save();
        Alert::toast('consultation est modifier','success');

        return redirect('consultation/'.$consultation->num_patient.'/consultation_patient');
    }
    

   

    
}
