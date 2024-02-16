<?php

namespace App\Http\Controllers;
use Alert;
use App\Models\Analyse;
use App\Models\Certificat;
use App\Models\Radiologie;
use App\Http\Requests\CreateControleRequest;
use App\Models\Controle;
use App\Models\Ordonnance;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use App\Models\Patient;
use Illuminate\Console\View\Components\Alert as ComponentsAlert;

class ControleController extends Controller
{
    //
    public static $randomcontrole;
    public function __construct()
    {
        $this->middleware('auth'); 
        self::$randomcontrole = Controle::orderBy('num_controle','desc')->value('num_controle');;
    }
    //afficher les information de patient dans le controle
    public function patient($id)
    {
        $patient = Patient::find($id);
        $num_controle=self::$randomcontrole;
        return view('controle.controle_patient',['patient'=>$patient,'num_controle'=>$num_controle]);
    }
     // enregistrer controle
     public function enregistrer_controle(CreateControleRequest $request)
     {
         $controle=new Controle();
         $controle->date_controle=now()->format('Y-m-d');
         $controle->motif_controle=$request->input('motif_controle');
         $controle->diagnostic_controle=$request->input('diagnostic_controle');
         $controle->commentaire_controle=$request->input('commentaire_controle');
         $controle->num_patient=$request->input('num_patient');
         $controle->save();
         Alert::toast('controle est ajouter','success');

         return redirect('controle/'.$controle->num_patient.'/controle_patient');
     }
     public function afficher($id)
    {
        $controle = Controle::find($id);
        return view('controle.afficher',['controle'=>$controle]);
    }
    public function modifier_controle(CreateControleRequest $request ,$id)
    {
        $controle=Controle::find($id);
        $controle->date_controle=$request->input('date_controle');
         $controle->motif_controle=$request->input('motif_controle');
         $controle->diagnostic_controle=$request->input('diagnostic_controle');
         $controle->commentaire_controle=$request->input('commentaire_controle');
        $controle->save();
        Alert::toast('controle est modifier','success');

        return redirect('controle/'.$controle->num_patient.'/controle_patient');
    }
    public function details($id)
    {
        
        $controle=Controle::where('num_controle',$id)->first();
        
        $certificatinit=Certificat::where('num_controle',$id)->where('type_certificat','certificat initiale')->first();
        $certificatpro=Certificat::where('num_controle',$id)->where('type_certificat','certificat prolongation')->first();

        $analyses =Analyse::where('num_controle',$id)->get();
        $radiologies=Radiologie::where('num_controle',$id)->get();
        $ordonnance=Ordonnance::where('num_controle',$id)->get();
        return view('controle.details',['controle'=>$controle,'ordonnance'=>$ordonnance,'analyses'=>$analyses,'radiologies'=>$radiologies,'certificatinit'=>$certificatinit,'certificatpro'=>$certificatpro]);
 

    }
}
