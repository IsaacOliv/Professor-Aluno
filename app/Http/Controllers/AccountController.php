<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\Students;
use App\Models\Teachers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    //-------------------Teacher account controller
    public function loginTeacher()
    {
        return view('index.login');
    }
    public function logarTeacher(Request $request)
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

    public function registerTeacher()
    {
        return view('index.register');
    }
    public function createTeacher(RegisterRequest $request, Teachers $teacher)
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


    //--------------------------Student account controller



    public function loginStudent()
    {
        return view('index.loginStudents');
    }
    public function logarStudent(Request $request)
    {
        $credentials = $request->validate([
            "email" => ['required', 'email'],
            "password" => ['required'],

        ]);

        // Se as credenciais nao estiverem corretas ele volta para o inicio
        if (!Auth::guard("students")->attempt($credentials)) {
            return redirect()->back()->withErrors(['message' => 'Credenciais inválidas']);
        }
        
        //Se as credencias estiverem validas ele passa
        if (Auth::guard("students")->attempt($credentials)) {

            $request->session()->regenerate();
            //retorna o usuario em sessao

            $user = Auth::guard('students')->user();

            //se o usuario em sessao estiver com status 1 ele passa
            if ($user->status === 1) {
                return redirect()->route('index');
            }
            //se o usuario em sessao estiver com status diferente de 1 ele retorna e a sessao é fechada
            if ($user->status != 1) {
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return back()->with(
                    'email',
                    'The provided credentials do not match our records.'
                );
            }
        }
    }




    //--------------------------------Logout geral
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
            $student->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('account');
        }
    }
}
