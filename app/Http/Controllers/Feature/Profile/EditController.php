<?php

namespace App\Http\Controllers\Feature\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class EditController extends Controller
{
    function index(): Response
    {
        $user = Auth::user();
        return response()->view('pages.profile.edit', [
            'title' => 'Edit profile',
            'user' => $user
        ]);
    }
}
