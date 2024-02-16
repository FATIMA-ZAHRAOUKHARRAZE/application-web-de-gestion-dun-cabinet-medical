<?php

use App\Http\Controllers\AnalyseController;
use App\Http\Controllers\AntecedentController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\CalendrierController;
use App\Http\Controllers\CertificatController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\ControleController;
use App\Http\Controllers\OrdonnanceController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\RadiologieController;
use App\Http\Controllers\RendezvousController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Middleware;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Route;
use PhpOffice\PhpSpreadsheet\Shared\OLE\PPS\Root;

Auth::routes();
Route::get('/', function () {
    return view('welcome');
});

// les rotes secretaire 
Route::middleware(['role:secretaire'])->group(function ()
{
// calendrier 
Route::get('/calendrier',[CalendrierController::class,'calendrier']);
//rendez vous
Route::get('/rendezvous', [RendezvousController::class,'index']);
Route::get('/rendezvous/{num_rendezvous}/afficher', [RendezvousController::class,'afficher']);
Route::put('/rendezvous/{id}', [RendezvousController::class,'modifier']);
Route::delete('rendezvous/{id}', [RendezvousController::class,'delete']);
Route::post('rendezvous', [RendezvousController::class,'enregistrer']);

// rendez vous aujourdhui
Route::get('/rendezvous/aujourdhui', [RendezvousController::class,'aujourdhui']);
Route::get('/rendezvous/{num_rendezvous}/afficher_aujourdhui', [RendezvousController::class,'afficher_aujourdhui']);
Route::delete('rendezvous/{id}/delete_aujourdhui', [RendezvousController::class,'delete_aujourdhui']);
Route::put('/rendezvous/{id}/modifier_aujourdhui', [RendezvousController::class,'modifier_aujourdhui']);

//pdf rendez vous
Route::get('/rendezvous/pdf', [RendezvousController::class,'pdf']);
Route::get('/rendezvous/pdf_aujourdhui', [RendezvousController::class,'pdf_aujourdhui']);

//excel rendez vous
Route::get('/rendezvous/excel', [RendezvousController::class,'excel']);
Route::get('/rendezvous/excel_aujourdhui', [RendezvousController::class,'excel_aujourdhui']);

//prendre rendezvous patient
Route::post('patient/rendezvous', [PatientController::class,'enregistrer_rendezvous']);
Route::get('/patient/{num_patient}/rendezvous', [PatientController::class,'rendezvous']);

//patient
Route::get('patient/ajouter', [PatientController::class,'ajouter']);
Route::post('patient', [PatientController::class,'enregistrer']);
Route::get('/patient/{num_patient}/afficher', [PatientController::class,'afficher']);
Route::put('/patient/{num_patient}', [PatientController::class,'modifier']);
Route::get('/patient/{num_patient}/pdf_patient', [PatientController::class,'pdf_patient']);
});
Route::get('/patient', [PatientController::class,'index']);

//pdf paient

Route::get('/patient/pdf', [PatientController::class,'pdf']);

//excel patient
Route::get('/patient/excel', [PatientController::class,'excel']);

//dashbord
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'dashboard']);



//modifier mot de passe
Route::get('/password/reset', [ResetPasswordController::class,'showResetForm']);
Route::post('/password/update', [ResetPasswordController::class,'reset']);


Route::middleware(['role:medecin'])->group(function ()
{
//utilisateurs
Route::get('/user',[UserController::class,'index']);
Route::get('/user/{id}/afficher', [UserController::class,'afficher']);

Route::put('user/{id}/modifier', [UserController::class,'modifier']);
Route::delete('user/{id}', [UserController::class,'delete']);

//ajouter utilisateur
Route::get('/register', [RegisterController::class,'showRegistrationForm']);
Route::post('/register/register', [RegisterController::class,'register']);

//patient
Route::get('/patient/{num_patient}/afficherpatient', [PatientController::class,'afficherpatient']);

//prochaine rendezvous
Route::post('patient/rendezvous/enregistrer_prochain', [PatientController::class,'enregistrer_prochain']);
Route::get('/patient/{num_patient}/prochainrendezvous', [PatientController::class,'prochainrendezvous']);

//consultation patient
Route::get('consultation/{num_patient}/consultation_patient', [ConsultationController::class,'patient']);
Route::post('consultation/consultation_patient', [ConsultationController::class,'enregistrer_consultation']);
Route::get('/consultation/{num_consultation}/afficher_consultation', [ConsultationController::class,'afficher_consultation']);
Route::put('/consultation/{num_consultation}/modifier_consultation', [ConsultationController::class,'modifier_consultation']);
Route::get('consultation/{num_patient}/dossier', [ConsultationController::class,'consultation']);
//aficher la consultation dans le dossier
Route::get('consultation/{num_consultation}/details', [ConsultationController::class,'details']);


//ordonnnace consultation
Route::delete('ordonnance/{num_ordonnance}/delete_ordonnance_consultation', [OrdonnanceController::class,'delete_ordonnance_consultation']);
Route::get('ordonnance/{num_consultation}/ordonnance_consultation', [OrdonnanceController::class,'ordonnance_consultation']);
Route::post('ordonnance/ordonnance_consultation', [OrdonnanceController::class,'enregistrer_ordonnance_consultation']);
Route::get('/ordonnance/{num_ordonnance}/afficher_ordonnance_consultation', [OrdonnanceController::class,'afficher_ordonnance_consultation']);
Route::put('/ordonnance/{num_ordonnance}/modifier_ordonnance_consultation', [OrdonnanceController::class,'modifier_ordonnance_consultation']);
Route::get('/ordonnance/pdf_consultation', [OrdonnanceController::class,'pdf_consultation']);

// analyse consultation
Route::get('analyse/{num_consultation}/analyse_consultation', [AnalyseController::class,'analyse_consultation']);
Route::post('analyse/analyse_consultation', [AnalyseController::class,'enregistrer_analyse_consultation']);
Route::get('analyse/{num_analyse}/afficher_analyse_consultation', [AnalyseController::class,'afficher_analyse_consultation']);
Route::put('analyse/{num_analyse}/modifier_analyse_consultation', [AnalyseController::class,'modifier_analyse_consultation']);
Route::delete('analyse/{num_analyse}/delete_analyse_consultation', [AnalyseController::class,'delete_analyse_consultation']);
Route::get('/analyse/pdf_consultation', [AnalyseController::class,'pdf_consultation']);
//modifier analyse dans le dossier
Route::put('/analyse/{analyse}', [AnalyseController::class, 'update'])->name('analyse.update');


//radiologie consultation
Route::get('radiologie/{num_consultation}/radiologie_consultation', [RadiologieController::class,'radiologie_consultation']);
Route::post('radiologie/radiologie_consultation', [RadiologieController::class,'enregistrer_radiologie_consultation']);
Route::get('/radiologie/{num_radiologie}/afficher_radiologie_consultation', [RadiologieController::class,'afficher_radiologie_consultation']);
Route::put('/radiologie/{num_radiologie}/modifier_radiologie_consultation', [RadiologieController::class,'modifier_radiologie_consultation']);
Route::delete('radiologie/{num_radiologie}/delete_radiologie_consultation', [RadiologieController::class,'delete_radiologie_consultation']);
Route::get('/radiologie/pdf_consultation', [RadiologieController::class,'pdf_consultation']);
Route::put('/radiologie/{radiologie}', [RadiologieController::class, 'update'])->name('radiologie.update');


//certificat consultation //initiale
Route::get('certificat/{num_consultation}/certificatinitiale_consultation', [CertificatController::class,'certificatinitiale_consultation']);
Route::post('certificat/certificatinitiale_consultation', [CertificatController::class,'enregistrer_certificatinitiale_consultation']);
Route::get('/certificat/afficher_certificatinitiale_consultation', [CertificatController::class,'afficher_certificatinitiale_consultation']);
Route::put('/certificat/{num_certificat}/modifier_certificatinitiale_consultation', [CertificatController::class,'modifier_certificatinitiale_consultation']);
Route::get('/certificat/pdf_initiale_consultation', [CertificatController::class,'pdf_initiale_consultation']);
 //certificat consultation //prolongation
Route::get('certificat/{num_consultation}/certificatprolongation_consultation', [CertificatController::class,'certificatprolongation_consultation']);
Route::post('certificat/certificatprolongation_consultation', [CertificatController::class,'enregistrer_certificatprolongation_consultation']);
Route::get('/certificat/afficher_certificatprolongation_consultation', [CertificatController::class,'afficher_certificatprolongation_consultation']);
Route::put('/certificat/{num_certificat}/modifier_certificatprolongation_consultation', [CertificatController::class,'modifier_certificatprolongation_consultation']);
Route::get('/certificat/pdf_prolongation_consultation', [CertificatController::class,'pdf_prolongation_consultation']);


//controle
Route::get('controle/{num_patient}/controle_patient', [ControleController::class,'patient']);
Route::post('controle/controle_patient', [ControleController::class,'enregistrer_controle']);
Route::get('/controle/{num_controle}/afficher', [ControleController::class,'afficher']);
Route::put('/controle/{num_controle}/modifier_controle', [ControleController::class,'modifier_controle']);
Route::get('controle/{num_controle}/details', [ControleController::class,'details']);

//ordonnance controle
Route::get('ordonnance/{num_controle}/ordonnance_controle', [OrdonnanceController::class,'ordonnance_controle']);
Route::post('ordonnance/ordonnance_controle', [OrdonnanceController::class,'enregistrer_ordonnance']);
Route::delete('ordonnance/{num_ordonnance}/delete_ordonnance_controle', [OrdonnanceController::class,'delete_ordonnance_controle']);
Route::get('/ordonnance/{num_ordonnance}/afficher_ordonnance_controle', [OrdonnanceController::class,'afficher_ordonnance_controle']);
Route::put('/ordonnance/{num_ordonnance}/modifier_ordonnance_controle', [OrdonnanceController::class,'modifier_ordonnance_controle']);
Route::get('/ordonnance/pdf_controle', [OrdonnanceController::class,'pdf_controle']);

//analyse controle
Route::get('analyse/{num_controle}/analyse_controle', [AnalyseController::class,'analyse_controle']);
Route::post('analyse/analyse_controle', [AnalyseController::class,'enregistrer_analyse']);
Route::delete('analyse/{num_analyse}/delete_analyse_controle', [AnalyseController::class,'delete_analyse_controle']);
Route::get('/analyse/{num_analyse}/afficher_analyse_controle', [AnalyseController::class,'afficher_analyse_controle']);
Route::put('/analyse/{num_analyse}/modifier_analyse_controle', [AnalyseController::class,'modifier_analyse_controle']);
Route::get('/analyse/pdf_controle', [AnalyseController::class,'pdf_controle']);

//radiologie controle
Route::get('radiologie/{num_controle}/radiologie_controle', [RadiologieController::class,'radiologie_controle']);
Route::post('radiologie/radiologie_controle', [RadiologieController::class,'enregistrer_radiologie_controle']);
Route::get('/radiologie/{num_radiologie}/afficher_radiologie_controle', [RadiologieController::class,'afficher_radiologie_controle']);
Route::put('/radiologie/{num_radiologie}/modifier_radiologie_controle', [RadiologieController::class,'modifier_radiologie_controle']);
Route::delete('radiologie/{num_radiologie}/delete_radiologie_controle', [RadiologieController::class,'delete_radiologie_controle']);
Route::get('/radiologie/pdf_controle', [RadiologieController::class,'pdf_controle']);

//certificat controle //initiale
Route::get('certificat/{num_consultation}/certificatinitiale_controle', [CertificatController::class,'certificatinitiale_controle']);
Route::post('certificat/certificatinitiale_controle', [CertificatController::class,'enregistrer_certificatinitiale_controle']);
Route::get('/certificat/afficher_certificatinitiale_controle', [CertificatController::class,'afficher_certificatinitiale_controle']);
Route::put('/certificat/{num_certificat}/modifier_certificatinitiale_controle', [CertificatController::class,'modifier_certificatinitiale_controle']);
Route::get('/certificat/pdf_initiale_controle', [CertificatController::class,'pdf_initiale_controle']);

//certificat controle //prolongation

Route::get('certificat/{num_consultation}/certificatprolongation_controle', [CertificatController::class,'certificatprolongation_controle']);
Route::post('certificat/certificatprolongation_controle', [CertificatController::class,'enregistrer_certificatprolongation_controle']);
Route::get('/certificat/afficher_certificatprolongation_controle', [CertificatController::class,'afficher_certificatprolongation_controle']);
Route::put('/certificat/{num_certificat}/modifier_certificatprolongation_controle', [CertificatController::class,'modifier_certificatprolongation_controle']);
Route::get('/certificat/pdf_prolongation_controle', [CertificatController::class,'pdf_prolongation_controle']);

//antecedent
Route::post('antecedent/ajouter', [AntecedentController::class,'enregisrter_antecedent']);
Route::get('antecedent/{num_patient}/index', [AntecedentController::class,'index']);
Route::get('antecedent/{num_antecedent}/afficher', [AntecedentController::class,'afficher']);
Route::put('antecedent/{num_antecedent}/modifier_antecedent', [AntecedentController::class,'modifier_antecedent']);
Route::delete('antecedent/{num_antecedent}/delete_antecedent', [AntecedentController::class,'delete_antecedent']);
Route::get('antecedent/{num_patient}/afficher_antecedentpat', [AntecedentController::class,'afficher_antecedentpat']);
});





