<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Socialite;
use App\SocialProvider;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class SocialAuthController extends Controller
{

  public function __construct()
  {
      $this->middleware('guest')->except('logout');

  }

  // Redirecciono a Facebook o Google
  public function redirectToProvider($provider)
  {
      return Socialite::driver($provider)->fields([
            'first_name', 'last_name', 'email', 'gender', 'birthday'
        ])->scopes([
            'email', 'user_birthday'
        ])->redirect();

  }

  // Obtengo la información de usuario del prveedor
  public function handleProviderCallback($provider)
  {
      // Obtenemos los datos del usuario
      // try {
      //   $userProviderInfo = Socialite::driver($provider)->user();
      // } catch (\Exception $e) {
      //   return redirect('/');
      // }
      $userProviderInfo = Socialite::driver($provider)->fields([
            'first_name', 'last_name', 'email', 'gender', 'birthday'
        ])->user();


      // Compruebo si el usuario existe
      $userSocialProvider = User::where('email', $userProviderInfo->getEmail())->first();
      if (!$userSocialProvider) {

          // Si no existe creamos un nuevo usuario con los datos del proveedor en la tabla users
          $newUser = User::firstOrCreate([
              'firstName' => $userProviderInfo->user['first_name'],
              'lastName' => $userProviderInfo->user['last_name'],
              'email'     => $userProviderInfo->user['email'],
              'birthDate' => $userProviderInfo->user['birthday']
          ]);

          // Y llenamos la data en la tabla social_providers con el nuevo usuario
          $newUser->SocialProvider()->create([
              'provider_id' => $userProviderInfo->getId(),
              'provider'    => $provider
          ]);

          Auth::login($newUser);

      } else {
          //si el ussuario exite logueamos
          Auth::login($userSocialProvider);
      }
        return redirect()->to('/home'); // Login y redirección
  }

}
