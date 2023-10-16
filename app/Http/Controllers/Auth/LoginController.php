<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{

public function index ()
{
    return view('login');
}

public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        // Authentication passed, redirect to the dashboard
        return redirect()->route('welcome');
    } else {
        // Authentication failed, redirect back to the login form with an error message
        return redirect()->route('login')->with('error', 'Invalid credentials.');
    }
}

}
