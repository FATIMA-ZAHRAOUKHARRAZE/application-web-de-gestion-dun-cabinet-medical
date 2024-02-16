<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRadiologieRequest;
use App\Models\Consultation;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use App\Models\Controle;
use App\Models\Radiologie;
use PDF;
use Alert;
use Illuminate\Pagination\Paginator;

class RadiologieController extends Controller
{
    //
    public static $randomNumber;
    public static $randomcontrole;
    public function __construct()
    {
        $this->middleware('auth'); 
        self::$randomcontrole = Controle::orderBy('num_controle','desc')->value('num_controle');
        self::$randomNumber=Consultation::orderBy('num_consultation','desc')->value('num_consultation'); 
    }
     //radiologie
     public function radiologie_controle($id)
     {
        $controle = Controle::join('patients', 'controles.num_patient', '=', 'patients.num_patient')->where('controles.num_controle', $id)->get(['patients.nom_patient', 'patients.prenom_patient', 'patients.cin', 'patients.num_patient'])->first();
         $radiologies=Radiologie::where('num_controle',$id)->paginate(2);
         return view('radiologie.radiologie_controle',compact('controle','radiologies'));
     }
     //enregistrer une radiologie
    public function enregistrer_radiologie_controle(CreateRadiologieRequest $request)
    {
        $radiologie=new Radiologie();
        $radiologie->num_controle=self::$randomcontrole;
        $radiologie->date_radiologie=now()->format('Y-m-d');
        $radiologie->type_radiologie=$request->input('type_radiologie');
        $radiologie->save();
        Alert::toast('radiologie est ajouter','success');
        return redirect('radiologie/'.self::$randomcontrole.'/radiologie_controle');
    }
      //afficher une radiologie
      public function afficher_radiologie_controle($id)
      {
         $randomcontrole=self::$randomcontrole;
          $radiologie = Radiologie::find($id);
          return view('radiologie.afficher_radiologie_controle',['radiologie'=>$radiologie],compact('randomcontrole'));
      }
      //modifier une radiologie
     public function modifier_radiologie_controle(CreateRadiologieRequest $request ,$id)
     {
         $radiologie=Radiologie::find($id);
         $radiologie->date_radiologie=$request->input('date_radiologie');
         $radiologie->type_radiologie=$request->input('type_radiologie');
         $radiologie->save();
         Alert::toast('radiologie est modifier','success');
         return redirect('radiologie/'.self::$randomcontrole.'/radiologie_controle');
     }
     public function delete_radiologie_controle($id)
     {
         $radiologie=Radiologie::find($id);
         $radiologie->delete();
         Alert::toast('radiologie est supprimer','error');
         return redirect('radiologie/'.self::$randomcontrole.'/radiologie_controle');
     }
     public function pdf_controle()
    {
        $randomcontrole=self::$randomcontrole;
        
        $controle = Controle::join('patients', 'controles.num_patient', '=', 'patients.num_patient')->where('controles.num_controle', $randomcontrole)->get(['patients.nom_patient', 'patients.prenom_patient','controles.date_controle'])->first();
        $radiologie=Radiologie::where('num_controle',$randomcontrole)->get();
        $data=[
            'titre'=>' Les Radiologies',
            'radiologie'=>$radiologie,
            'controle'=>$controle
        ];
        $pdf=PDF::loadView('radiologie.pdf_controle',$data);
        return $pdf->download('radiologie.pdf');
    }
     
     //radiologie
     public function radiologie_consultation($id)
     {
         $consultation = Consultation::join('patients','consultations.num_patient','=','patients.num_patient')->where('consultations.num_consultation',$id)->get(['patients.nom_patient','patients.prenom_patient','patients.cin','patients.num_patient'])->first();
         $radiologies=Radiologie::where('num_consultation',$id)->paginate(2);
         return view('radiologie.radiologie_consultation',compact('consultation','radiologies'));
     }
     //enregistrer une radiologie
    public function enregistrer_radiologie_consultation(CreateRadiologieRequest $request)
    {
        $radiologie=new Radiologie();
        $radiologie->num_consultation=self::$randomNumber;
        $radiologie->date_radiologie=now()->format('Y-m-d');
        $radiologie->type_radiologie=$request->input('type_radiologie');
        $radiologie->save();
        Alert::toast('radiologie est ajouter','success');
        return redirect('radiologie/'.self::$randomNumber.'/radiologie_consultation');
    }
     //afficher une radiologie
     public function afficher_radiologie_consultation($id)
     {
        $randomNumber=self::$randomNumber;
         $radiologie = Radiologie::find($id);
         return view('radiologie.afficher_radiologie_consultation',['radiologie'=>$radiologie],compact('randomNumber'));
     }
     //modifier une radiologie
    public function modifier_radiologie_consultation(CreateRadiologieRequest $request ,$id)
    {
        $radiologie=Radiologie::find($id);
        $radiologie->date_radiologie=$request->input('date_radiologie');
        $radiologie->type_radiologie=$request->input('type_radiologie');
        $radiologie->resultat_radiologie=$request->input('resultat_radiologie');
        $radiologie->save();
        Alert::toast('radiologie est modifier','success');
        return redirect('radiologie/'.self::$randomNumber.'/radiologie_consultation');
    }
    public function delete_radiologie_consultation($id)
    {
        $radiologie=Radiologie::find($id);
        $radiologie->delete();
        Alert::toast('radiologie est supprimer','error');
        return redirect('radiologie/'.self::$randomNumber.'/radiologie_consultation');
    }
//modifier le radiologie dans le dossier
    public function update(Request $request, Radiologie $radiologie)
    {
        $radiologie->type_radiologie=$request->input('type_radiologie');
        $radiologie->resultat_radiologie = $request->input('resultat_radiologie');
        Alert::toast('radiologie est modifier','success');
        $radiologie->save();
        return back();
    }
    public function pdf_consultation()
    {
        $randomNumber=self::$randomNumber;
        $consultation = Consultation::join('patients','consultations.num_patient','=','patients.num_patient')->where('consultations.num_consultation',$randomNumber)->get(['patients.nom_patient','patients.prenom_patient','consultations.date_consultation'])->first();
        $radiologie=Radiologie::where('num_consultation',$randomNumber)->get();
        $data=[
            'titre'=>'Les Radiologies',
            'radiologie'=>$radiologie,
            'consultation'=>$consultation
        ];
        $pdf=PDF::loadView('radiologie.pdf_consultation',$data);
        return $pdf->download('radiologie.pdf');
    }
}
