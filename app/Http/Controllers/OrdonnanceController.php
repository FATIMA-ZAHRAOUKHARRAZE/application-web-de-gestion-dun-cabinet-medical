<?php

namespace App\Http\Controllers;
use Alert;
use Illuminate\Pagination\Paginator;
use App\Http\Requests\CreateOrdonnanceRequest;
use Illuminate\Support\Facades\Cache;
use App\Models\Controle;
use App\Models\Ordonnance;
use Illuminate\Http\Request;
use App\Models\Consultation;
use Illuminate\Console\View\Components\Alert as ComponentsAlert;
use PDF;
class OrdonnanceController extends Controller
{
    public static $randomNumber;
    public static $randomcontrole;
    public function __construct()
    {
        $this->middleware('auth'); 
        self::$randomcontrole = Controle::orderBy('num_controle','desc')->value('num_controle');
        self::$randomNumber=Consultation::orderBy('num_consultation','desc')->value('num_consultation'); 
    }
    //ordonnance controle
    public function ordonnance_controle($id)
    {
        $controle = Controle::join('patients','controles.num_patient','=','patients.num_patient')->where('controles.num_controle',$id)->get(['patients.nom_patient','patients.prenom_patient','patients.num_patient'])->first();
        $ordonnances=Ordonnance::where('num_controle',$id)->paginate(2);
        return view('ordonnance.ordonnance_controle',compact('controle','ordonnances'));
    }
    
    //enregistrer un ordonnance 
    public function enregistrer_ordonnance(CreateOrdonnanceRequest $request)
    {
        $ordonnance=new Ordonnance();
        $ordonnance->num_controle=self::$randomcontrole;
        $ordonnance->date_ordonnance=now()->format('Y-m-d');
        $ordonnance->nom_medicament=$request->input('nom_medicament');
        $ordonnance->quantite_medicament=$request->input('quantite_medicament');
        $ordonnance->posologie_medicament=$request->input('posologie_medicament');
        $ordonnance->save();
        Alert::toast('ordonnance est ajouter','success');
       return redirect('ordonnance/'.self::$randomcontrole.'/ordonnance_controle');
    }
    //afficher un ordonnance
    public function afficher_ordonnance_controle($id)
    {
        $randomcontrole=self::$randomcontrole;
        $ordonnance = Ordonnance::find($id);
        return view('ordonnance.afficher_ordonnance_controle',['ordonnance'=>$ordonnance],compact('randomcontrole'));
    }
    //modifier un ordonnance
    public function modifier_ordonnance_controle(CreateOrdonnanceRequest $request ,$id)
    {
        $ordonnance=Ordonnance::find($id);
        $ordonnance->date_ordonnance=$request->input('date_ordonnance');
        $ordonnance->nom_medicament=$request->input('nom_medicament');
        $ordonnance->quantite_medicament=$request->input('quantite_medicament');
        $ordonnance->posologie_medicament=$request->input('posologie_medicament');
        $ordonnance->save();
        Alert::toast('ordonnance est modifier','success');
        return redirect('ordonnance/'.self::$randomcontrole.'/ordonnance_controle');
    }

    
    //supprimer un ordonnane
    public function delete_ordonnance_controle($id)
    {
        $ordonnance=Ordonnance::find($id);
        $ordonnance->delete();
        Alert::toast('ordonnance est supprimer','error');
        return redirect('ordonnance/'.self::$randomcontrole.'/ordonnance_controle');
    }
    public function pdf_controle()
    {
        $randomcontrole=self::$randomcontrole;
        $controle = Controle::join('patients', 'controles.num_patient', '=', 'patients.num_patient')->where('controles.num_controle', $randomcontrole)->get(['patients.nom_patient', 'patients.prenom_patient','controles.date_controle'])->first();
        $ordonnance=Ordonnance::where('num_controle',$randomcontrole)->get();
        $data=[
            'titre'=>"L'ordonnance",
            'ordonnance'=>$ordonnance,
            'controle'=>$controle
        ];
        $pdf=PDF::loadView('ordonnance.pdf_controle',$data);
        return $pdf->download('ordonnance.pdf');
    }
    public function ordonnance_consultation($id)
    {
        $consultation = Consultation::join('patients','consultations.num_patient','=','patients.num_patient')->where('consultations.num_consultation',$id)->get(['patients.nom_patient','patients.prenom_patient','patients.cin','patients.num_patient'])->first();
        $ordonnances=Ordonnance::where('num_consultation',$id)->paginate(2);
        return view('ordonnance.ordonnance_consultation',compact('consultation','ordonnances'));
    }
    
    //enregistrer un ordonnance 
    public function enregistrer_ordonnance_consultation(CreateOrdonnanceRequest $request)
    {
        $ordonnance=new Ordonnance();
        $ordonnance->num_consultation=self::$randomNumber;
        $ordonnance->date_ordonnance=now()->format('Y-m-d');
        $ordonnance->nom_medicament=$request->input('nom_medicament');
        $ordonnance->quantite_medicament=$request->input('quantite_medicament');
        $ordonnance->posologie_medicament=$request->input('posologie_medicament');
        $ordonnance->save();
        Alert::toast('ordonnance est ajouter','success');
       return redirect('ordonnance/'.self::$randomNumber.'/ordonnance_consultation');
    }
    //afficher un ordonnance
    public function afficher_ordonnance_consultation($id)
    {
        $randomNumber=self::$randomNumber;
        $ordonnance = Ordonnance::find($id);
        return view('ordonnance.afficher_ordonnance_consultation',['ordonnance'=>$ordonnance],compact('randomNumber'));
    }
    //modifier un ordonnance
    public function modifier_ordonnance_consultation(CreateOrdonnanceRequest $request ,$id)
    {
        $ordonnance=Ordonnance::find($id);
        $ordonnance->date_ordonnance=$request->input('date_ordonnance');
        $ordonnance->nom_medicament=$request->input('nom_medicament');
        $ordonnance->quantite_medicament=$request->input('quantite_medicament');
        $ordonnance->posologie_medicament=$request->input('posologie_medicament');
        $ordonnance->save();
      Alert::toast('ordonnance est modifier','success');
        return redirect('ordonnance/'.self::$randomNumber.'/ordonnance_consultation');
    }
    //supprimer un ordonnane
    public function delete_ordonnance_consultation($id)
    {
        $ordonnance=Ordonnance::find($id);
        $ordonnance->delete();
        Alert::toast('ordonnance est supprimer','error');
        return redirect('ordonnance/'.self::$randomNumber.'/ordonnance_consultation');
    }
    public function pdf_consultation()
    {
        $randomNumber=self::$randomNumber;
        $consultation = Consultation::join('patients','consultations.num_patient','=','patients.num_patient')->where('consultations.num_consultation',$randomNumber)->get(['patients.nom_patient','patients.prenom_patient','consultations.date_consultation'])->first();
        $ordonnance=Ordonnance::where('num_consultation',$randomNumber)->get();
        
        $data=[
            'titre'=>"L'ordonnance",
            'ordonnance'=>$ordonnance,
            'consultation'=>$consultation
        ];
        $pdf=PDF::loadView('ordonnance.pdf_consultation',$data);
        return $pdf->download('ordonnance.pdf');
    }

}
