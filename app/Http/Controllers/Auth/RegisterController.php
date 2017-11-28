<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
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
    protected $redirectTo = '/miperfil';

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
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'birthDay' => 'required|numeric|between:1,31',
            'birthMonth' => 'required|numeric|between:1,12',
            'birthYear' => 'required|numeric|between:1930,2010',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'profilePic' => 'required|image|max:10000',
        ],
        [
          'email.unique' => 'Ya existe un usuario registrado con este e-mail.',
          'password.min' => 'La contraseña debe tener como mínimo 6 caracteres.',
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
      $birthdate = $data['birthDay'] . '-' . $data['birthMonth'] . '-' . $data['birthYear'];

        return User::create([
            'firstName' => $data['firstName'],
            'lastName' => $data['lastName'],
            'birthDate' => $birthdate,
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

}
