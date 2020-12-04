<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Socialite;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use DB;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function redirectToProvider()
    {
        return Socialite::with('azure')->redirect();
    }

    public function handleProviderCallback()
    {
        $azure_user = Socialite::with('azure')->user();
        $azure_user = User::updateOrCreate(
            [
                'email' => $azure_user->email
            ],
            [
                'token' => Crypt::encryptString($azure_user->token),
                'name' => $azure_user->user["givenName"],
                'lastName' => $azure_user->user["surname"],
                'company' => "Universidad de Los Andes",
                'companyKind' => "Universidad",
            ]
        );
        Auth::login($azure_user, true);

        /* Validación y asignación de rol por primera vez a usuarios Uniandes*/
                 
        $user = auth()->user();
        $role_user_estudiante = Role::where('name','Estudiante')->first();
        $role_user_profesor = Role::where('name','Profesor Facultad')->first();
        $rolesUsuario = DB::table('role_user')
            ->where('user_id','=', $user->id)
            ->first();
        if($rolesUsuario==null)
        {
            $esProfesorFacultad = DB::table('profesores')
            ->where('email','=', $user->email)
            ->first();
            if($esProfesorFacultad==null){
                $user->roles()->attach($role_user_estudiante);
            }
            else{
                $user->roles()->attach($role_user_profesor);
            }            
        }
        return redirect()->to('');
    }
    public function showLoginForm()
    {       
        return view("auth.login");
    }
}
