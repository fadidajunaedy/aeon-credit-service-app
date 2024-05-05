<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;

class SocialiteController extends Controller
{
    public function redirect () {
        return Socialite::driver('google')->redirect();
    }

    public function callback () {
        $socialUser = Socialite::driver('google')->user();
        
        $registeredUser = User::where('google_id', $socialUser->id)->orWhere('email', $socialUser->email)->first();

        if (!$registeredUser) {
            $user = User::updateOrCreate([
                'google_id' => $socialUser->id,
            ], [
                'name' => $socialUser->name,
                'email' => $socialUser->email,
                'password' => Hash::make('12345678'),
                'google_token' => $socialUser->token,
                'google_refresh_token' => $socialUser->refreshToken,
            ]);

            Auth::login($user);
            return redirect('/')->with('success', 'Sign in Success');

        }    
        Auth::login($registeredUser);
        return redirect('/')->with('success', 'Sign in Success');
    }
}
