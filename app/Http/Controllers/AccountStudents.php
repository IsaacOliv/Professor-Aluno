<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AccountStudents extends Controller
{
    public function login()
    {
        return view('index.loginStudents');
    }
    public function logar(Request $request)
    {
        $credentials = $request->validate([
            "email" => ['required', 'email'],
            "password" => ['required'],
            
        ]);
        
        if (Auth::guard("students")->attempt($credentials)) {


            $request->session()->regenerate();
            
            return redirect()->route('index');
        }
        return redirect()->route('students.login')->withErrors(['message' => 'Credenciais inválidas']);
    }
    public function logout()
    {
        Auth::guard("students")->logout();
        return redirect()->route('students.login');
    }








}
