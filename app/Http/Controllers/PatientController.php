<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use App\Exports\PatientsExport;
use App\Http\Requests\CreatePatientRequest;
use App\Http\Requests\CreateRendezvousRequest;
use Illuminate\Support\Str;
use App\Models\Consultation;
use Illuminate\Database\Eloquent\Model;
use App\Models\Patient;
use PDF;
use Excel;
use Illuminate\Http\Request;
use App\Models\Rendezvou;
use Dompdf\Adapter\PDFLib;
use Illuminate\Contracts\Validation\Validator;
use Alert;
class PatientController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');   
    }
    //afficher  tous les patients
    public function index(Request $request)
    {
        $chercher=$request->chercher;
        
        if($request->filled('chercher'))
        {
           $patients=Patient::where('cin',$request->chercher)->orwhere('nom_patient',$request->chercher)->orwhere('prenom_patient',$request->chercher)->orderBy('nom_patient','asc')->paginate(5);
           $patients->appends($request->all());
        }
        else{
            $patients=Patient::orderBy('nom_patient','asc')->paginate(5);
        }
        return view('patient.index',compact('patients','chercher'));
       
    }
    //afficher page ajouter patient
    public function ajouter()
    {
        return view('patient.ajouter');
    }
    //enregistrer le patient
    public function enregistrer(CreatePatientRequest $request)
    {
        $patient=new patient();
        $patient->cin=$request->input('cin');
        $patient->nom_patient=$request->input('nom_patient');
        $patient->prenom_patient=$request->input('prenom_patient');
        $patient->age_patient=$request->input('age_patient');
        $patient->sexe_patient=$request->input('sexe_patient');
        $patient->mutuelle_patient=$request->input('mutuelle_patient');
        $patient->tel_patient=$request->input('tel_patient');
        $patient->adresse_patient=$request->input('adresse_patient');
        $patient->taille_patient=$request->input('taille_patient');
        $patient->poids_patient=$request->input('poids_patient');
        $patient->groupesanguin=$request->input('groupesanguin');
        $patient->save();
        Alert::toast('patient est ajouter','success');
        return redirect('patient');
    }
    //afficher un patient
    public function afficher($id)
    {
        $patient = Patient::find($id);
        return view('patient.afficher',['patient'=>$patient]);
    }
    //modifier un patient
    public function modifier(CreatePatientRequest $request ,$id)
    {
        $patient=Patient::find($id);
        $patient->cin=$request->input('cin');
        $patient->nom_patient=$request->input('nom_patient');
        $patient->prenom_patient=$request->input('prenom_patient');
        $patient->age_patient=$request->input('age_patient');
        $patient->sexe_patient=$request->input('sexe_patient');
        $patient->mutuelle_patient=$request->input('mutuelle_patient');
        $patient->tel_patient=$request->input('tel_patient');
        $patient->adresse_patient=$request->input('adresse_patient');
        $patient->taille_patient=$request->input('taille_patient');
        $patient->poids_patient=$request->input('poids_patient');
        $patient->groupesanguin=$request->input('groupesanguin');
        $patient->save();
        Alert::toast('patient est modifier','success');
        return redirect('patient');
    }
    //pdf de tous les patients
    public function pdf()
    {
        $patient=Patient::orderBy('nom_patient','asc')->get();
        $data=[
            'titre'=>'liste des patients',
            'patient'=>$patient
        ];
        $pdf=PDF::loadView('patient.pdf',$data);
        return $pdf->download('liste des patients.pdf');
    }
    public function afficherpatient($id)
    {
        $patient = Patient::find($id);
        return view('patient.afficherpatient',['patient'=>$patient]);
    }
    //prendre le rendezvous pour un patient
    public function rendezvous($id)
    {    
        $patient = Patient::find($id);
        return view('patient.rendezvous',['patient'=>$patient]);
    }
    //enregistrer le rendez vous
    public function enregistrer_rendezvous(CreateRendezvousRequest $request)
    {
        $rendezvous=new Rendezvou();
        $rendezvous->num_patient=$request->input('num_patient');
        $rendezvous->date_rendezvous=$request->input('date_rendezvous');
        $rendezvous->type_rendezvous=$request->input('type_rendezvous');
        $rendezvous->commentaire_rendezvous=$request->input('commentaire_rendezvous');
        $rendezvous->save();
        Alert::toast('rendez-vous est ajouter','success');
        return redirect('patient');
    }
    public function prochainrendezvous($id)
    {    
        $patient = Patient::find($id);
        return view('patient.prochainrendezvous',['patient'=>$patient]);
    }
    //enregistrer le rendez vous
    public function enregistrer_prochain(CreateRendezvousRequest $request)
    {
        $rendezvous=new Rendezvou();
        $rendezvous->num_patient=$request->input('num_patient');
        $rendezvous->date_rendezvous=$request->input('date_rendezvous');
        $rendezvous->type_rendezvous=$request->input('type_rendezvous');
        $rendezvous->commentaire_rendezvous=$request->input('commentaire_rendezvous');
        $rendezvous->save();
        Alert::toast('rendez-vous est ajouter','success');
        return redirect('patient/'.$rendezvous->num_patient.'/afficherpatient');
    }
   
     //pdf d'un seule patient
     public function pdf_patient($id)
     {
         $patient=Patient::find($id);
         $data=[
             'titre'=>'fiche de Patient',
             'patient'=>$patient
         ];
         $pdf=PDF::loadView('patient.pdf_patient',$data);
         return $pdf->download('fiche de Patient.pdf');
     }
     public function excel()
     {
        return Excel::download(new PatientsExport,'liste des patients.xlsx');
     }
}

