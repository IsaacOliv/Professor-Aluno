<?php

namespace App\Http\Controllers;

use App\Models\Activities;
use App\Models\Activities_responses;
use App\Models\Disciplines;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isNull;

class StudentsController extends Controller
{
    public function info(Request $request)
    {
        $user = Auth::guard('students')->user();
        $atividades = Activities_responses::where('student_id', $user->id)->count();
        return view('students.info', compact('user', 'atividades'));
    }
    public function check($id)
    {
        $discipline = $id;

        $user = Auth::guard('students')->user();
        $activities = Activities_responses::with('activity')->where('check', '1')->where('student_id', $user->id)->paginate(8);
        if ($activities) {
            return view('students.activitiesCheck', compact('user', 'activities', 'discipline'));
        }
        dd('algo deu errado');
    }
    public function show($id)
    {
        $user = Auth::guard('students')->user();
        $activities = Activities_responses::find($id);
        if ($activities) {
            return view('students.avaliate', compact('user', 'activities'));
        }
        dd('algo deu errado');
    }
}
