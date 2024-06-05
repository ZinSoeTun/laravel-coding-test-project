<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
        //logout process
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        //redirect to
        return redirect()->route('login');
    }
}
