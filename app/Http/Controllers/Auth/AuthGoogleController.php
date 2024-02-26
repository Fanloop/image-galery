<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class AuthGoogleController extends Controller
{
    public function auth()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        try {
            $user = Socialite::driver('google')->stateless()->user();
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'terjadi kesalahan, coba lagi');
        }

        $result = User::query()->where('email', $user->email)->where('google_id', $user->id)->first();

        if ($result) {
            Auth::login($result);
        } else {
            $newUser = User::query()->create([
                'nama' => $user->name,
                'username' => $user->nickname ?? 'users' . Str::random(),
                'password' => Hash::make(Str::password()),
                'email' => $user->email,
                'google_id' => $user->id,
            ]);
            Storage::makeDirectory($newUser->username);

            Auth::login($newUser);
        }

        return redirect()->intended();
    }
}
