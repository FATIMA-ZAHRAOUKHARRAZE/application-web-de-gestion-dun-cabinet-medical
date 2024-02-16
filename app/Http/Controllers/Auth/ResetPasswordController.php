<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Symfony\Component\HttpFoundation\Request;
use Alert;
class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */
    protected $redirectTo = RouteServiceProvider::PATIENT;
    public function __construct()
    {
      $this->middleware('auth');   
    }
    public function showResetForm()
    {
        return view('auth.passwords.reset');
    }

    public function reset(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|string|min:8',
        ]);

        $user = Auth::user();
        $hashedPassword = $user->password;

        if (Hash::check($request->input('old_password'), $hashedPassword)) {
            $user->fill([
                'password' => Hash::make($request->input('password'))
            ])->save();
            Alert::toast('Le mot de passe est modifier','success');
            return redirect('patient');
        } else {
            return redirect()->back()->withErrors(['old_password' => 'Le mot de passe actuel est incorrect.']);
        }
    }

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
   

}
