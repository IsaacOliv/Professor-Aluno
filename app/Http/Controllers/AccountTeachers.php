<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\Teachers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountTeachers extends Controller
{
    public function login()
    {
        return view('index.login');
    }
    public function logar(Request $request)
    {
        $credentials = $request->validate([
            "email" => ['required', 'email'],
            "password" => ['required'],
            
        ]);
        
        if (Auth::guard("teachers")->attempt($credentials)) {

            $request->session()->regenerate();
            

            return redirect()->route('index');
        }
        return redirect()->back()->withErrors(['message' => 'Credenciais inválidas']);
    }
    
    public function logout(Request $request)
    {
        $teacher = Auth::guard("teachers");
        $student = Auth::guard("students");

        if ($teacher) {
            $teacher->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('account');
        }
        if ($student) {
            $teacher->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('account');
        }
    }






    public function register()
    {
        return view('index.register');
    }
    public function create(RegisterRequest $request, Teachers $teacher)
    {
        $teacher = $teacher->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        if ($teacher) {
            return redirect()->route('login');
        }
        return redirect()->back();
    }
}
