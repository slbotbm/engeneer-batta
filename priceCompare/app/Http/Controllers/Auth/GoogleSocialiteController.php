<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Exception;
use Socialite;

class GoogleSocialiteController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleCallback()
    {
        try {
            
            $user = Socialite::driver('google')->user();

            
            $finduser = User::where('social_id', $user->id)->first();

            if ($finduser)  
            {
                
                Auth::login($finduser);

                
                return redirect('/dashboard');
            }
            else
            {
                
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'social_id' => $user->id,
                    'social_type' => 'google',  
                    'password' => bcrypt('my-google'),      
                ]);

                Auth::login($newUser);

                return redirect('/dashboard');
            }

        }
        catch (Exception $e)
        {
            dd($e->getMessage());
        }
    }
}
