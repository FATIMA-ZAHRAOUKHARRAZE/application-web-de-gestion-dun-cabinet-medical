<?php

namespace App\Http\Controllers;
use Alert;
use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use Illuminate\Pagination\Paginator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');   
    }
    //
    public function index()
    {
        $users =User::join('roles','users.id_role','=','roles.id_role')->paginate(5);
        return view('user.index',compact('users'));
    }
    public function afficher($id)
    {
        $user=User::find($id);
        return view('user.afficher',compact('user'));
    }
    public function modifier( CreateUserRequest $request,$id)
    {
        $user=User::find($id);
        $user->nom=$request->input('nom');
        $user->username=$request->input('username');
        $user->save();
        Alert::toast('utilisateur est modifier','success');
        return redirect('user');
    }
    public function delete($id)
    {
        $user=User::find($id);
        $user->delete();
        Alert::toast('utilisateur est supprimer','error');
        return redirect('user');
    }
}
