<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActivitiesRequest;
use App\Http\Requests\ResponsesRequest;
use App\Models\Activities;
use App\Models\Activities_responses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentsController extends Controller
{
    public function info(Request $request)
    {
        $user = Auth::guard('students')->user();

        return view('students.info', compact('user'));
    }
    public function activities($id)
    {
        $user = Auth::guard('students')->user();

        $activities = Activities::with('discipline')->where('discipline_id', $id)->paginate(8);
        return view('students.activities', compact('user', 'activities'));
    }
    public function responses($id)
    {
        $user = Auth::guard('students')->user();

        $activities = Activities::find($id);
        return view('students.responses', compact('user', 'activities'));
    }



    public function responsesStore(Request $request)
    {

        $responses = $request->all();
        
        Activities_responses::create($responses);
    }
}
