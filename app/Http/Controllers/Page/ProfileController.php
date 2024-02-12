<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function myProfile(): Response
    {
        $user = Auth::user();
        return response()->view('pages.profile.main', [
            'title' => $user->nama,
            'user' => $user,
        ]);
    }
}
