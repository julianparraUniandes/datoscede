<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Role;
use App\Country;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'company' => ['required', 'string', 'max:255'],
            'companyKind' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'depto' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data1 = [
            'secret' => config('services.recaptcha.secret'),
            'response' => request('recaptcha')
        ];

        $options = [
            'http' => [
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data1)
            ]
        ];

        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        $resultJson = json_decode($result);
        //dd($resultJson);
        if($resultJson->success =! true) return back()->with('msg', 'Captcha Error');

        $role_user = Role::where('name','Externo')->first();

        $user = new User();
        $user->name = $data['name'];
        $user->lastName = $data['lastName'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->company =  $data['company'];
        $user->companyKind = $data['companyKind'];
        $user->country = $data['country'];
        $user->depto = $data['depto'];
        $user->city = $data['city'];
        $user->tipo_usr = "Externo";
        $user->full_data = true;
        $user->save();
        $user->roles()->attach($role_user);

        return $user;

        //Enviar correo de bienvenida a los usuarios externos desde aquí.

    }
    public function showRegistrationForm()
    {
        $countries = Country::all();

        return view("auth.register", compact('countries'));
    }
}
