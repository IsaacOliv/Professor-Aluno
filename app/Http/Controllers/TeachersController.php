<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\Students;
use App\Models\Teachers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class TeachersController extends Controller
{
    public function info(Request $request, $id)
    {
        $teacher = Teachers::find($id);

        $user = Auth::guard('teachers')->user();

        return view('professor.info', compact('user', 'teacher'));
    }



    //Criar conta do aluno
    public function studentRegister()
    {
        $user = Auth::guard('teachers')->user();
        return view('professor.studentRegister', compact('user'));
    }
    public function studentStore(Request $request)
    {
        $students = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => (int)$request->status,
        ];
        
        if ($students) {
            Students::create($students);
            return redirect()->back()->with('msg', 'Aluno cadastrado com sucesso');
        }return redirect()->back()->with('erro', 'Falha ao cadastrar aluno');
    }
}
