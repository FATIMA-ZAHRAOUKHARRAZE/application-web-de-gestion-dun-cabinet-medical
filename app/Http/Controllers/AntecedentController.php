<?php
namespace App\Http\Controllers;
use App\Models\Patient;
use Illuminate\Support\Facades\Cache;
use App\Models\Antecedent;
use Illuminate\Http\Request;
use Alert;
use Illuminate\Pagination\Paginator;
use App\Models\Consultation;
use App\Models\Controle;
use App\Http\Requests\CreateAntecedentRequest;

use function PHPSTORM_META\type;

class AntecedentController extends Controller
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
    public function enregisrter_antecedent(CreateAntecedentRequest $request)
    {
        $antecedent= new Antecedent();
        $antecedent->categorie_ant=$request->input('categorie_ant');
        $antecedent->description_ant=$request->input('description_ant');
        $antecedent->num_patient=$request->input('num_patient');
        $antecedent->save();
        Alert::toast('antecedent est ajouter','success');
        return redirect('antecedent/'.$antecedent->num_patient.'/index');
    }
    public function afficher_antecedentpat($id)
    {
        $patient = Patient::find($id);
        $antecedent=Antecedent::where('num_patient',$id)->get();
        $antecedentsmed=Antecedent::where('num_patient',$id)->where('categorie_ant','medical')->get();
        $antecedentschir=Antecedent::where('num_patient',$id)->where('categorie_ant','chirurgical')->get();
        $antecedentsfamil=Antecedent::where('num_patient',$id)->where('categorie_ant','familial')->get();
        return view('antecedent.afficher_antecedentpat',compact('patient','antecedentsmed','antecedentsfamil','antecedentschir','antecedent'));
    }
    public function index($id)
    {
        $patient = Patient::find($id);
        $antecedents=Antecedent::where('num_patient',$id)->paginate(2);
        return view('antecedent.index',['antecedents'=>$antecedents,'patient'=>$patient]);
    }    
    public function afficher($id)
    {
          $antecedent=Antecedent::find($id);
        return view('antecedent.afficher',['antecedent'=>$antecedent]);
    }
    public function modifier_antecedent(CreateAntecedentRequest $request,$id)
    {
        $antecedent=Antecedent::find($id);
        $antecedent->categorie_ant=$request->input('categorie_ant');
        $antecedent->description_ant=$request->input('description_ant');
        $antecedent->save();
        Alert::toast('antecedent est modifier','success');
        return redirect('antecedent/'.$antecedent->num_patient.'/index');
    }
    public function delete_antecedent($id)
    {
        $antecedent=Antecedent::find($id);
        $antecedent->delete();
        Alert::toast('antecedent est supprimer','error');
        return redirect('antecedent/'.$antecedent->num_patient.'/index');
    }
}
