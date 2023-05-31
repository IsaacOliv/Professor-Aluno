<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentsController extends Controller
{
    public function login()
    {
        return view('index.login');
    }
    public function authenticade(Request $request)
    {
        $credentials = $request->validate([
            "email" =>['required', 'email'],
            "password" =>['required'],
        ]);
        if (Auth::guard('students')->attempt($credentials)) {
            $request->session();

            return redirect()->route('index');
        }return redirect()->back(); 

    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
