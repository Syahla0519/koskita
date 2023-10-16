<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login'); // Assuming your view file is named 'login.blade.php'
    }

    public function login(Request $request)
    {
        // Validation rules
        $rules = [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ];

        // Validation messages
        $messages = [
            'email.required' => 'Email is required.',
            'email.email' => 'Invalid email format.',
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 6 characters.',
        ];

        // Validate the form data
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->route('login')
                ->withErrors($validator)
                ->withInput();
        }

        // If validation passes, attempt to log in the user here

        // If login is successful, redirect the user to the dashboard
        // return redirect('/dashboard');
    }
}
