<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    //for admin login
    public function admin(Request $request)
    {

        // Validate login credentials
        $credentials =  Validator::make($request->all(), [
            'email' => ['required', 'email'],
            'password' => ['required'],
        ])->validate();

        // Attempt to log in the user
        if (Auth::attempt($credentials, true)) {
            $request->session()->regenerate();

            // Get the authenticated user
            $user = Auth::user();

            // Check if the user's role is 'admin'
            if ($user->role !== 'admin') {
                // User does not have the correct role
                Auth::logout(); // Log out the user
                return back()->with([
                    'error' => 'There is no account among admin account, your account is found in ' . ucfirst($user->role) . ' accounts . Please log in with '
                        . ucfirst($user->role) . ' account'
                ]);
            }
            // If the user is an admin, redirect to the  dashboard
            return redirect('dashboard');
        }
        // If login process fails, return error
        return back()->with([
            'error2' => 'The provided credentials do not match our records.',
        ]);
    }



    //for editor login
    public function editor(Request $request)
    {
        // Validate login credentials
        $credentials =  Validator::make($request->all(), [
            'email' => ['required', 'email'],
            'password' => ['required'],
        ])->validate();


        // Attempt to log in the user
        if (Auth::attempt($credentials, true)) {
            $request->session()->regenerate();

            // Get the authenticated user
            $user = Auth::user();

            // Check if the user's role is 'editor'
            if ($user->role !== 'editor') {
                // User does not have the correct role
                Auth::logout(); // Log out the user
                return back()->with([
                    'error' => 'There is no account among editor account, your account is found in ' . ucfirst($user->role) . ' accounts . Please log in with '
                        . ucfirst($user->role) . ' account'
                ]);
            }
             // If the user is an editor, redirect to the  dashboard
             return redirect('dashboard');
        }

        // If login process fails, return error
        return back()->with([
            'error2' => 'The provided credentials do not match our records.',
        ]);
    }




    // for viewer login
    public function viewer(Request $request)
    {
        // Validate login credentials
        $credentials =  Validator::make($request->all(), [
            'email' => ['required', 'email'],
            'password' => ['required'],
        ])->validate();


        // Attempt to log in the user
        if (Auth::attempt($credentials, true)) {
            $request->session()->regenerate();

            // Get the authenticated user
            $user = Auth::user();

            // Check if the user's role is 'viewer'
            if ($user->role !== 'viewer') {
                // User does not have the correct role
                Auth::logout(); // Log out the user
                return back()->with([
                    'error' => 'There is no account among viewer account, your account is found in ' . ucfirst($user->role) . ' accounts . Please log in with '
                        . ucfirst($user->role) . ' account'
                ]);
            }
             // If the user is an viewer, redirect to the  dashboard
             return redirect('dashboard');
        }

        // If login process fails, return error
        return back()->with([
            'error2' => 'The provided credentials do not match our records.',
        ]);
    }
}
