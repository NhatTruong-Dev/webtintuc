<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Validator;


class FacebookLoginController extends Controller
{
    public function facebookRedirect(){
        return Socialite::driver('facebook')->redirect();
    }

    public function loginWithFacebook()
    {
        try {

            $user = Socialite::driver('facebook')->user();


            $isUser = User::where('fb_id',$user->id)->first();

            if( $isUser ) {

                Auth::login($isUser);
                return redirect()->intended('dashboard');

            }else {

                $createUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'fb_id' => $user->id,
                    'password' => encrypt('12345678')
                ]);



                Auth::login($createUser);

                return redirect()->intended('dashboard');
            }


        } catch (Exception $e) {
            dd($e->getMessage());
        }

    }
}
