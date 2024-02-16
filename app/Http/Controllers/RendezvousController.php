<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use App\Exports\RendezvousAujourdhuiExport;
use App\Exports\RendezvousExport;
use App\Http\Requests\CreateRendezvousRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Rendezvou;
use App\Models\User;
use PDF;
use Excel;
use Carbon\Carbon;
use App\Models\Role;
use App\Models\Patient;
use Faker\Core\DateTime as CoreDateTime;
use Illuminate\Http\Request;
use Alert;
class RendezvousController extends Controller
{
    //
    public function __construct()
    {
      $this->middleware('auth');   
    }
    //afficher  tous les rendezvous
    public function index(Request $request)
    {
        $chercher=$request->chercher;
        if($request->filled('chercher'))
        {
           $rendezvou=Rendezvou::join('patients','rendezvous.num_patient','=','patients.num_patient')
           ->orwhere('nom_patient',$request->chercher)->orwhere('prenom_patient',$request->chercher)->orwhere('date_rendezvous',$request->chercher)
           ->orwhere('type_rendezvous',$request->chercher)->orderBy('date_rendezvous','desc')->paginate(5);
           $rendezvou->appends($request->all());
        }
        
        else{
            $rendezvou=Rendezvou::join('patients','rendezvous.num_patient','=','patients.num_patient')
            ->orderBy('date_rendezvous','desc')->paginate(5);
       
        }
        return view('rendezvous.index',compact('rendezvou','chercher'));

       
    }
    //afficher les rendezvous aujourdhui
    public function aujourdhui(Request $request)
    {
        $chercher=$request->chercher;
        if($request->filled('chercher'))
        {
            $rendezvou=Rendezvou::join('patients','rendezvous.num_patient','=','patients.num_patient')
            ->orwhere('nom_patient',$request->chercher)->where('date_rendezvous',now()->format('Y-m-d'))->orwhere('prenom_patient',$request->chercher)->where('date_rendezvous',now()->format('Y-m-d'))
            ->orwhere('type_rendezvous',$request->chercher)->where('date_rendezvous',now()->format('Y-m-d'))->paginate(5);
            $rendezvou->appends($request->all());
        }
        else{
            $rendezvou=Rendezvou::join('patients','rendezvous.num_patient','=','patients.num_patient')->where('date_rendezvous',now()->format('Y-m-d'))
           ->paginate(5);
        }
        return view('rendezvous.aujourdhui',compact('rendezvou','chercher'));
       
    }
    //pdf
    public function pdf()
    {
        $rendezvous=Rendezvou::join('patients','rendezvous.num_patient','=','patients.num_patient')->orderBy('date_rendezvous','desc')->get(['rendezvous.*','patients.cin','patients.nom_patient','patients.prenom_patient']);
        $data=[
            'titre'=>'liste des rendez-vous',
            'rendezvous'=>$rendezvous
        ];
        $pdf=PDF::loadView('rendezvous.pdf',$data);
        return $pdf->download('liste des rendez-vous.pdf');
    }
    //afficher aujourdhui
    public function afficher_aujourdhui($id)
    {
        $rendezvous = Rendezvou::find($id);
        return view('rendezvous.afficher_aujourdhui',['rendezvous'=>$rendezvous]);
    }
    public function modifier_aujourdhui(CreateRendezvousRequest $request ,$id)
    {
        $rendezvous=Rendezvou::find($id);
        $rendezvous->date_rendezvous=$request->input('date_rendezvous');
        $rendezvous->type_rendezvous=$request->input('type_rendezvous');
        $rendezvous->commentaire_rendezvous=$request->input('commentaire_rendezvous');
        $rendezvous->save();
        Alert::toast('rendez-vous est modifier','success');

        return redirect('rendezvous/aujourdhui');
    }
    public function delete_aujourdhui($id)
    {
        $rendezvous=Rendezvou::find($id);
        $rendezvous->delete();
        Alert::toast('rendez-vous est supprimer','error');
        return redirect('rendezvous/aujourdhui');
    }
    public function pdf_aujourdhui()
    {
        $rendezvous=Rendezvou::join('patients','rendezvous.num_patient','=','patients.num_patient')->where('date_rendezvous',now()->format('Y-m-d'))
    ->get(['rendezvous.*','patients.cin','patients.nom_patient','patients.prenom_patient']);
        $data=[
            'titre'=>'liste des rendez-vous',
            'rendezvous'=>$rendezvous
        ];
        $pdf=PDF::loadView('rendezvous.pdf_aujourdhui',$data);
        return $pdf->download('liste des rendez-vous.pdf');
    }
  
    //afficher un rendez vous
    public function afficher($id)
    {
        $rendezvous = Rendezvou::find($id);
        return view('rendezvous.afficher',['rendezvous'=>$rendezvous]);
    }
    //modifier un rendez vous
    public function modifier(CreateRendezvousRequest $request ,$id)
    {
        $rendezvous=Rendezvou::find($id);
        $rendezvous->date_rendezvous=$request->input('date_rendezvous');
        $rendezvous->type_rendezvous=$request->input('type_rendezvous');
        $rendezvous->commentaire_rendezvous=$request->input('commentaire_rendezvous');
        $rendezvous->save();
        Alert::toast('rendez-vous est modifier','success');
        return redirect('rendezvous');
    }
    //supprimer un rendezvous
    public function delete($id)
    {
        $rendezvous=Rendezvou::find($id);
        $rendezvous->delete();
        Alert::toast('rendez-vous est supprimer','error');
        return redirect('rendezvous');
    }
    public function excel()
    {
       return Excel::download(new RendezvousExport,'liste des Rendezvous.xlsx');
    }
    public function excel_aujourdhui()
    {  
       return Excel::download(new RendezvousAujourdhuiExport,'liste des Rendezvous.xlsx');
    }
}
