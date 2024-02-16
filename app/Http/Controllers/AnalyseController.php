<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\Paginator;
use App\Http\Requests\CreateAnalyseRequest;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use App\Models\Analyse;
use App\Models\Controle;
use App\Models\Consultation;
use PDF;
use Alert;

class AnalyseController extends Controller
{
    public static $randomNumber;
    public static $randomcontrole;
    public function __construct()
    {
        $this->middleware('auth'); 
        self::$randomcontrole = Controle::orderBy('num_controle','desc')->value('num_controle');
        self::$randomNumber=Consultation::orderBy('num_consultation','desc')->value('num_consultation'); 
    }
    public function analyse_controle($id)
    {
        $controle = Controle::join('patients', 'controles.num_patient', '=', 'patients.num_patient')->where('controles.num_controle', $id)->get(['patients.nom_patient', 'patients.prenom_patient','patients.num_patient'])->first();
        $analyses = Analyse::where('num_controle', $id)->paginate(2);
        return view('analyse.analyse_controle', compact('controle', 'analyses'));
    }
    //enregistrer une analyse
    public function enregistrer_analyse(CreateAnalyseRequest $request)
    {
        $analyse = new Analyse();
        $analyse->num_controle = self::$randomcontrole;
        $analyse->date_analyse = now()->format('Y-m-d');
        $analyse->type_analyse = $request->input('type_analyse');
        $analyse->save();
        Alert::toast('analyse est ajouter','success');
        return redirect('analyse/' . self::$randomcontrole . '/analyse_controle');
    }
    //supprimer une analyse
    public function delete_analyse_controle($id)
    {
        $analyse=Analyse::find($id);
        $analyse->delete();
        Alert::toast('analyse est supprimer','error');
        return redirect('analyse/'.self::$randomcontrole.'/analyse_controle');
    }
     //afficher une analyse
     public function afficher_analyse_controle($id)
     {
         $randomcontrole=self::$randomcontrole;
         $analyse = Analyse::find($id);
         return view('analyse.afficher_analyse_controle',['analyse'=>$analyse],compact('randomcontrole'));
     }
     //modifier une analyse
     public function modifier_analyse_controle(CreateAnalyseRequest $request ,$id)
     {
         $analyse=Analyse::find($id);
         $analyse->date_analyse=$request->input('date_analyse');
         $analyse->type_analyse=$request->input('type_analyse');
         $analyse->save();
         Alert::toast('analyse est modifier','success');
         return redirect('analyse/'.self::$randomcontrole.'/analyse_controle');
     }
    public function pdf_controle()
    {
        $randomcontrole=self::$randomcontrole;
        $controle = Controle::join('patients', 'controles.num_patient', '=', 'patients.num_patient')->where('controles.num_controle', $randomcontrole)->get(['patients.nom_patient', 'patients.prenom_patient', 'controles.date_controle'])->first();
        $analyse = Analyse::where('num_controle', $randomcontrole)->get();
        $data=[
            'titre'=>' Les Analyses',
            'analyse'=>$analyse,
            'controle'=>$controle
        ];
        $pdf=PDF::loadView('analyse.pdf_controle',$data);
        return $pdf->download('analyse.pdf');
    }

    public function update(Request $request, Analyse $analyse)
    {
        $analyse->type_analyse=$request->input('type_analyse');
        $analyse->resultat_analyse = $request->input('resultat_analyse');
        Alert::toast('analyse est modifier','success');
        $analyse->save();
    
        return back();
    }

      //analyse
    public function analyse_consultation($id)
    {
        $consultation = Consultation::join('patients','consultations.num_patient','=','patients.num_patient')->where('consultations.num_consultation',$id)->get(['patients.nom_patient','patients.prenom_patient','patients.num_patient'])->first();
        $analyses=Analyse::where('num_consultation',$id)->paginate(2);
        return view('analyse.analyse_consultation',compact('consultation','analyses'));
    }
    //enregistrer une analyse
    public function enregistrer_analyse_consultation(CreateAnalyseRequest $request)
    {
        $analyse=new Analyse();
        $analyse->num_consultation=self::$randomNumber;
        $analyse->date_analyse=now()->format('Y-m-d');
        $analyse->type_analyse=$request->input('type_analyse');
        $analyse->save();
        Alert::toast('analyse est ajouter','success');
        return redirect('analyse/'.self::$randomNumber.'/analyse_consultation');
    }
    //afficher une analyse
    public function afficher_analyse_consultation($id)
    {
        $randomNumber=self::$randomNumber;
        $analyse = Analyse::find($id);
        return view('analyse.afficher_analyse_consultation',['analyse'=>$analyse],compact('randomNumber'));
    }
    //modifier une analyse
    public function modifier_analyse_consultation(CreateAnalyseRequest $request ,$id)
    {
        $analyse=Analyse::find($id);
        $analyse->date_analyse=$request->input('date_analyse');
        $analyse->type_analyse=$request->input('type_analyse');
        $analyse->save();
        Alert::toast('analyse est modifier','success');
        return redirect('analyse/'.self::$randomNumber.'/analyse_consultation');
    }
    //supprimer une analyse
    public function delete_analyse_consultation($id)
    {
        $analyse=Analyse::find($id);
        $analyse->delete();
        Alert::toast('analyse est supprimer','error');
        return redirect('analyse/'.self::$randomNumber.'/analyse_consultation');
    }
    public function pdf_consultation()
    {
        $randomNumber=self::$randomNumber;
        $consultation = Consultation::join('patients','consultations.num_patient','=','patients.num_patient')->where('consultations.num_consultation',$randomNumber)->get(['patients.nom_patient','patients.prenom_patient','consultations.date_consultation'])->first();
        $analyse=Analyse::where('num_consultation',$randomNumber)->get();
        $data=[
            'titre'=>' Les Analyses',
            'analyse'=>$analyse,
            'consultation'=>$consultation
        ];
        $pdf=PDF::loadView('analyse.pdf_consultation',$data);
        return $pdf->download('analyse.pdf');
    }
}
