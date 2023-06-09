<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActivitiesRequest;
use App\Http\Requests\ResponseActivitiesCheck;
use App\Models\Activities;
use App\Models\Activities_responses;
use App\Models\Disciplines;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isNull;

class ActivitiesController extends Controller
{
    public function index()
    {
        $activities = Activities::with('discipline')->paginate(8);

        if (Auth::guard('teachers')->user()) {
            $user = Auth::guard('teachers')->user();
        }
        if (Auth::guard('students')->user()) {
            $user = Auth::guard('students')->user();
        }


        return view('atividades.index', compact('user', 'activities'));
    }
    public function create($id)
    {
        $disciplines = Disciplines::find($id);
        $user = Auth::guard('teachers')->user();

        return view('atividades.create', compact('user', 'disciplines'));
    }
    public function store(ActivitiesRequest $request)
    {

        $activities = $request->all();

        if ($request->filepath) {
            $activities['filepath'] = $request->filepath->store('atividades');
        }

        Activities::create($activities);

        return redirect()->route('disciplines.index');

        // $data = Activities::create([
        //     'name' => $request->name,
        //     'description' => $request->description,
        //     'teatcher_id' => $request->teatcher_id,
        //     'discipline_id' => $request->discipline_id,
        //     'filepath' => $request->filepath,
        // ]);
        // return response()->json($data);


    }
    public function show($id)
    {
        if (Auth::guard('teachers')->user()) {
            $user = Auth::guard('teachers')->user();
        }
        if (Auth::guard('students')->user()) {
            $user = Auth::guard('students')->user();
        }

        $activities = Activities::findOrFail($id);
        $activities2 = Activities::with('discipline')->where('discipline_id', $id)->paginate(8);
        if ($activities) {
            return view('atividades.show', compact('user', 'activities', 'activities2'));
        }
        return redirect()->back()->with('erro', 'Não foi possivel localizar atividades');
    }
    public function showWhere($id)
    {

        if (Auth::guard('teachers')->user()) {
            $user = Auth::guard('teachers')->user();
        }
        if (Auth::guard('students')->user()) {
            $user = Auth::guard('students')->user();
        }

        $activities = Activities::with('discipline')->where('discipline_id', $id)->paginate(8);

        return view('atividades.showWhere', compact('user', 'activities'));
    }
    public function deleteActivitie($id)
    {
        try {

            $data = Activities::findOrFail($id)->delete();
            if ($data) {
                return response()->json($data);
            }
        } catch (\Throwable $ex) {

            return response()->json($ex->getMessage());
        }
    }
    public function check($id)
    {
        $user = Auth::guard('teachers')->user();
        $activities = Activities_responses::with('activity')->where('activity_id', $id)->where('check', '0')->paginate(8);
        $count = Activities_responses::with('activity')->where('activity_id', $id)->where('check', '0')->count();
        if ($count > 0) {
            return view('professor.check', compact('user', 'activities'));
        }

        if (isNull($activities)) {
            return view('atividades.respostas.nullWhere', compact('user'));
        }
    }
    public function avaliate($id)
    {
        $user = Auth::guard('teachers')->user();
        $activities = Activities_responses::with('student')->findOrFail($id);
        return view('professor.avaliate', compact('user', 'activities'));
    }
    public function activitieAvaliate(ResponseActivitiesCheck $request, $id)
    {
        $responses = $request->all();
        Activities_responses::find($id)->update($responses);
        return redirect()->route('activities.check', $id);
    }
}
