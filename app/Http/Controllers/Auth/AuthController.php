<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Form\LoginRequest;
use App\Http\Requests\Form\RegisterRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function login(): Response
    {
        return response()->view('auth.login', [
            'title' => 'Login'
        ]);
    }

    public function register(): Response
    {
        return response()->view('auth.register', [
            'title' => 'Register'
        ]);
    }

    public function loginProses(LoginRequest $request): RedirectResponse|string
    {
        $emailOrUsername = $request->get('usernameOrEmail');
        $password = $request->get('password');
        $field = filter_var($emailOrUsername, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $user = User::where($field, $emailOrUsername)->first();

        if (!$user) {
            return redirect()->route('login')->withErrors(['usernameOrEmail' => 'Username atau email salah']);
        }

        if (Auth::attempt([
            $field => $emailOrUsername,
            'password' => $password
        ])) {
            return redirect()->intended('/');
        }

        return redirect()->route('login')->withErrors(['fail' => 'Password Anda salah']);
    }

    public function registerProses(RegisterRequest $request): RedirectResponse
    {
        $data = $request->validate($request->rules(), $request->messages());

        $user = User::query()->create($data);

        if ($user->wasRecentlyCreated) {
            return redirect()->route('login');
        }

        return redirect()->route('register')->withErrors('gagal menambahkan data')->withInput();
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
