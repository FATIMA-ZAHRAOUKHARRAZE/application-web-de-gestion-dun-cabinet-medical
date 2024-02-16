<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCertificatRequest;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use App\Models\Certificat;
use App\Models\Consultation;
use App\Models\Controle;
use PDF;
use Alert;
class CertificatController extends Controller
{
    public static $randomNumber;
    public static $randomcontrole;
    public function __construct()
    {
        $this->middleware('auth'); 
        self::$randomcontrole = Controle::orderBy('num_controle','desc')->value('num_controle');
        self::$randomNumber=Consultation::orderBy('num_consultation','desc')->value('num_consultation'); 
    }
    public function certificatinitiale_consultation($id)
    {
        $consultation = Consultation::join('patients','consultations.num_patient','=','patients.num_patient')->where('consultations.num_consultation',$id)->get(['patients.nom_patient','patients.prenom_patient','patients.cin','patients.num_patient'])->first();
        
        return view('certificat.certificatinitiale_consultation',compact('consultation'));
    }
    public function enregistrer_certificatinitiale_consultation(CreateCertificatRequest $request)
    {
        $certificat=new Certificat();
        $certificat->num_consultation=self::$randomNumber;
        $certificat->nbrjour_certificat=$request->input('nbrjour_certificat');
        $certificat->date_debut=$request->input('date_debut');
        $certificat->date_fin=$request->input('date_fin');
        $certificat->type_certificat='certificat initiale';
        $certificat->save();
        Alert::toast('certificat est ajouter','success');
       return redirect('certificat/'.self::$randomNumber.'/certificatinitiale_consultation');
    }
    public function afficher_certificatinitiale_consultation()
    {
        $randomNumber=self::$randomNumber;
        $certificat=Certificat::where('num_consultation',$randomNumber)->where('type_certificat','certificat initiale')->first();
        return view('certificat.afficher_certificatinitiale_consultation',['certificat'=>$certificat],compact('randomNumber'));
    }
    public function modifier_certificatinitiale_consultation( CreateCertificatRequest $request,$id)
    {
        $certificat=Certificat::find($id);
        $certificat->nbrjour_certificat=$request->input('nbrjour_certificat');
        $certificat->date_debut=$request->input('date_debut');
        $certificat->date_fin=$request->input('date_fin');
        $certificat->save();
        Alert::toast('certificat est modifier','success');
        return redirect('certificat/'.self::$randomNumber.'/certificatinitiale_consultation');
    }
    public function pdf_initiale_consultation()
    {
        $randomNumber=self::$randomNumber;
        $consultation = Consultation::join('patients','consultations.num_patient','=','patients.num_patient')->where('consultations.num_consultation',$randomNumber)->get(['patients.nom_patient','patients.prenom_patient','patients.adresse_patient','consultations.date_consultation'])->first();
        $certificat=Certificat::where('num_consultation',$randomNumber)->where('type_certificat','certificat initiale')->get();
        
        $data=[
            'titre'=>"Certificat Médicale",
            'certificat'=>$certificat,
            'consultation'=>$consultation
        ];
        $pdf=PDF::loadView('certificat.pdf_initiale_consultation',$data);
        return $pdf->download('certificat.pdf');
    }
    //prolongation

    public function certificatprolongation_consultation($id)
    {
        $consultation = Consultation::join('patients','consultations.num_patient','=','patients.num_patient')->where('consultations.num_consultation',$id)->get(['patients.nom_patient','patients.prenom_patient','patients.cin','patients.num_patient'])->first();
        
        return view('certificat.certificatprolongation_consultation',compact('consultation'));
    }
    public function enregistrer_certificatprolongation_consultation(CreateCertificatRequest $request)
    {
        $certificat=new Certificat();
        $certificat->num_consultation=self::$randomNumber;
        $certificat->nbrjour_certificat=$request->input('nbrjour_certificat');
        $certificat->date_debut=$request->input('date_debut');
        $certificat->date_fin=$request->input('date_fin');
        $certificat->type_certificat='certificat prolongation';
        $certificat->save();
        Alert::toast('certificat est ajouter','success');
       return redirect('certificat/'.self::$randomNumber.'/certificatprolongation_consultation');
    }
    public function afficher_certificatprolongation_consultation()
    {
        $randomNumber=self::$randomNumber;
        $certificat=Certificat::where('num_consultation',$randomNumber)->where('type_certificat','certificat prolongation')->first();
        return view('certificat.afficher_certificatprolongation_consultation',['certificat'=>$certificat],compact('randomNumber'));
    }
    public function modifier_certificatprolongation_consultation( CreateCertificatRequest $request,$id)
    {
        $certificat=Certificat::find($id);
        $certificat->nbrjour_certificat=$request->input('nbrjour_certificat');
        $certificat->date_debut=$request->input('date_debut');
        $certificat->date_fin=$request->input('date_fin');
        $certificat->save();
        Alert::toast('certificat est modifier','success');
        return redirect('certificat/'.self::$randomNumber.'/certificatprolongation_consultation');
    }

    public function pdf_prolongation_consultation()
    {
        $randomNumber=self::$randomNumber;
        $consultation = Consultation::join('patients','consultations.num_patient','=','patients.num_patient')->where('consultations.num_consultation',$randomNumber)->get(['patients.nom_patient','patients.prenom_patient','patients.adresse_patient','consultations.date_consultation'])->first();
        $certificat=Certificat::where('num_consultation',$randomNumber)->where('type_certificat','certificat prolongation')->get();
        
        $data=[
            'titre'=>"Certificat Médicale",
            'certificat'=>$certificat,
            'consultation'=>$consultation
        ];
        $pdf=PDF::loadView('certificat.pdf_prolongation_consultation',$data);
        return $pdf->download('certificat.pdf');
    }

    // controle

//initiale certificatprolongation
    public function certificatinitiale_controle($id)
    {
        $controle = Controle::join('patients', 'controles.num_patient', '=', 'patients.num_patient')->where('controles.num_controle', $id)->get(['patients.nom_patient', 'patients.prenom_patient','patients.num_patient','patients.cin'])->first();
        
        return view('certificat.certificatinitiale_controle',compact('controle'));
    }
    public function enregistrer_certificatinitiale_controle(CreateCertificatRequest $request)
    {
        $certificat=new Certificat();
        $certificat->num_controle=self::$randomcontrole;
        $certificat->nbrjour_certificat=$request->input('nbrjour_certificat');
        $certificat->date_debut=$request->input('date_debut');
        $certificat->date_fin=$request->input('date_fin');
        $certificat->type_certificat='certificat initiale';
        $certificat->save();
        Alert::toast('certificat est ajouter','success');
       return redirect('certificat/'.self::$randomcontrole.'/certificatinitiale_controle');
    }
    public function afficher_certificatinitiale_controle()
    {
        $randomcontrole=self::$randomcontrole;
        $certificat=Certificat::where('num_controle',$randomcontrole)->where('type_certificat','certificat initiale')->first();
        return view('certificat.afficher_certificatinitiale_controle',['certificat'=>$certificat],compact('randomcontrole'));
    }
    public function modifier_certificatinitiale_controle( CreateCertificatRequest $request,$id)
    {
        $certificat=Certificat::find($id);
        $certificat->nbrjour_certificat=$request->input('nbrjour_certificat');
        $certificat->date_debut=$request->input('date_debut');
        $certificat->date_fin=$request->input('date_fin');
        $certificat->save();
        Alert::toast('certificat est modifier','success');
        return redirect('certificat/'.self::$randomcontrole.'/certificatinitiale_controle');
    }
    public function pdf_initiale_controle()
    {
        $randomcontrole=self::$randomcontrole;
        $controle = Controle::join('patients','controles.num_patient','=','patients.num_patient')->where('controles.num_controle',$randomcontrole)->get(['patients.nom_patient','patients.prenom_patient','patients.adresse_patient','controles.date_controle'])->first();
        $certificat=Certificat::where('num_controle',$randomcontrole)->where('type_certificat','certificat initiale')->get();
        
        $data=[
            'titre'=>"Certificat Médicale",
            'certificat'=>$certificat,
            'controle'=>$controle
        ];
        $pdf=PDF::loadView('certificat.pdf_initiale_controle',$data);
        return $pdf->download('certificat.pdf');
    }
    //prolongation

    public function certificatprolongation_controle($id)
    {
        $controle = Controle::join('patients', 'controles.num_patient', '=', 'patients.num_patient')->where('controles.num_controle', $id)->get(['patients.nom_patient', 'patients.prenom_patient','patients.num_patient','patients.cin'])->first();
        
        return view('certificat.certificatprolongation_controle',compact('controle'));
    }
    public function enregistrer_certificatprolongation_controle(CreateCertificatRequest $request)
    {
        $certificat=new Certificat();
        $certificat->num_controle=self::$randomcontrole;
        $certificat->nbrjour_certificat=$request->input('nbrjour_certificat');
        $certificat->date_debut=$request->input('date_debut');
        $certificat->date_fin=$request->input('date_fin');
        $certificat->type_certificat='certificat prolongation';
        $certificat->save();
        Alert::toast('certificat est ajouter','success');
       return redirect('certificat/'.self::$randomcontrole.'/certificatprolongation_controle');
    }
    public function afficher_certificatprolongation_controle()
    {
        $randomcontrole=self::$randomcontrole;
        $certificat=Certificat::where('num_controle',$randomcontrole)->where('type_certificat','certificat prolongation')->first();
        return view('certificat.afficher_certificatprolongation_controle',['certificat'=>$certificat],compact('randomcontrole'));
    }
    public function modifier_certificatprolongation_controle( CreateCertificatRequest $request,$id)
    {
        $certificat=Certificat::find($id);
        $certificat->nbrjour_certificat=$request->input('nbrjour_certificat');
        $certificat->date_debut=$request->input('date_debut');
        $certificat->date_fin=$request->input('date_fin');
        $certificat->save();
        Alert::toast('certificat est modifier','success');
        return redirect('certificat/'.self::$randomcontrole.'/certificatprolongation_controle');
    }
    public function pdf_prolongation_controle()
    {
        $randomcontrole=self::$randomcontrole;
        $controle = Controle::join('patients','controles.num_patient','=','patients.num_patient')->where('controles.num_controle',$randomcontrole)->get(['patients.nom_patient','patients.prenom_patient','patients.adresse_patient','controles.date_controle'])->first();
        $certificat=Certificat::where('num_controle',$randomcontrole)->where('type_certificat','certificat prolongation')->get();
        
        $data=[
            'titre'=>"Certificat Médicale",
            'certificat'=>$certificat,
            'controle'=>$controle
        ];
        $pdf=PDF::loadView('certificat.pdf_prolongation_controle',$data);
        return $pdf->download('certificat.pdf');
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}
