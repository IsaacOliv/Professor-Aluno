<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\StudentStatusRequest;
use App\Http\Requests\StudentUpdateRequest;
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
        }
        return redirect()->back()->with('erro', 'Falha ao cadastrar aluno');
    }
    public function studentsShow()
    {
        $user = Auth::guard('teachers')->user();

        $students = Students::paginate(20);

        return view('professor.showStudents', compact('user', 'students'));
    }
    public function studentEdit(Request $request, $id)
    {
        $user = Auth::guard('teachers')->user();

        $student = Students::find($id);

        return view('professor.studentEdit', compact('user', 'student'));
    }
    public function studentUpdate(StudentUpdateRequest $request, $id)
    {

        $student = Students::find($id);

        $update = $student->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        if ($update) {
            return redirect()->back()->with('msg', 'Dados de aluno editado com sucesso');
        }
        return redirect()->back();
    }
    public function disableStudent(StudentStatusRequest $request, $id)
    {

        $data = Students::findOrFail($id)->update([
            'status' => $request->status,
        ]);
        return response()->json($data);
    }
}
