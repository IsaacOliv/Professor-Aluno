<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlunoRequest;
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

        $activities = Activities::with('discipline')->where('discipline_id', $id)->get();
        $aa = Activities_responses::where('student_id', $user->id)->get();

        $novoValor = collect([]);
        foreach ($activities as $item) {

            foreach ($aa as $item2) {
                if ($item->id == $item2->activity_id) {
                    $novoValor->push($item->id);
                }
            }
        }
        $visual = Activities::with('discipline')->where('discipline_id', $id)->whereNotIn('id', $novoValor)->paginate(8);

        // dd(Activities::with('discipline')->where('discipline_id', $id)->whereNotIn('id', $novoValor)->get());
        return view('students.activities', compact('user', 'visual'));
    }
    public function responses($id)
    {
        $user = Auth::guard('students')->user();

        $activities = Activities::find($id);
        return view('students.responses', compact('user', 'activities'));
    }

    public function store(AlunoRequest $request)
    {

        $responses = $request->all();

        if ($request->filepath) {
            $responses['filepath'] = $request->filepath->store('respostas');
        }

        $Activitie = Activities_responses::create($responses);
        if ($Activitie) {
            return redirect()->route('index')->with('msg', 'Atividade enviada com sucesso');
        }
        return redirect()->back()->with('error', 'Ocorreu um erro ao tentar enviar a atividade, se o erro persistir, informe ao professor');
    }
    public function open(Request $request)
    {
        $user = Auth::guard('students')->user();

        $final = Activities_responses::where('check', '!=', '1')->paginate(10);

        return view('students.open', compact('user', 'final'));
    }
    public function edit($id)
    {

        $user = Auth::guard('students')->user();

        $activitie = Activities_responses::find($id);


        return view('students.edit', compact('user', 'activitie'));
    }
    public function editWhere($id)
    {
        $user = Auth::guard('students')->user();

        $activities = Activities::with('discipline')->where('discipline_id', $id)->get();

        $responses = Activities_responses::where('student_id', $user->id)->get();

        $novoValor = collect([]);
        foreach ($activities as $item) {

            foreach ($responses as $item2) {
                if ($item->id != $item2->activity_id) {
                    $novoValor->push($item->id);
                }
            }
        }
        $visual = Activities::with('discipline')->where('discipline_id', $id)->whereNotIn('id', $novoValor)->paginate(8);


        return view('students.where', compact('user', 'visual'));
    }
    public function update(AlunoRequest $request)
    {
        dd($request->all());
    }
}
