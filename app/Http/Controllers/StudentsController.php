<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlunoRequest;
use App\Http\Requests\UpdateActivitieResponse;
use App\Models\Activities;
use App\Models\Activities_responses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isNull;

class StudentsController extends Controller
{
    public function info(Request $request)
    {
        $user = Auth::guard('students')->user();

        return view('students.info', compact('user'));
    }

}
