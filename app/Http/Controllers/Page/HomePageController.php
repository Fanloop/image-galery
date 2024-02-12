<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class HomePageController extends Controller
{
    public function root(): RedirectResponse
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return redirect()->route('login');
    }

    public function home(): Response | RedirectResponse
    {
        $user = Auth::user();

        return response()->view('pages.home.main', [
            'title' => 'Home',
            'user' => $user,
        ]);
    }
}
