<?php

namespace App\Http\Controllers;

use App\Http\Requests\DisciplinesStoreRequest;
use App\Models\Disciplines;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DisciplinesController extends Controller
{
    public function index(Disciplines $disciplines)
    {
        if (Auth::guard('teachers')->user()) {
            $user = Auth::guard('teachers')->user();
        }
        if (Auth::guard('students')->user()) {
            $user = Auth::guard('students')->user();
        }

        return view('disciplines.index', compact('user'));
    }
    public function allData()
    {
        $data = Disciplines::orderBy('id', 'ASC')->get();
        return response()->json($data);
    }
    public function store(DisciplinesStoreRequest $request)
    {
        $data = Disciplines::create([
            'name' => $request->name,
        ]);
        return response()->json($data);
    }
    public function edit(Disciplines $disciplines, $id)
    {
        $disciplines = $disciplines->find($id);
        if (Auth::guard('teachers')->user()) {
            $user = Auth::guard('teachers')->user();
        }
        if (Auth::guard('students')->user()) {
            $user = Auth::guard('students')->user();
        }

        return  view('disciplines.edit', compact('user', 'disciplines'));
    }

    public function update(Request $request, $id)
    {
        $disciplines = Disciplines::find($id);
        $disciplines->update([
            'name' => $request->name,

        ]);
        if ($disciplines) {
            return redirect()->back()->with('msg', 'Nome editado com sucesso');
        }
        return redirect()->back()->with('erro', 'Erro ao editar');
    }
    // public function destroy($id)
    // {

    //     $disciplines = Disciplines::find($id);
    //     $atividades = Activities::where('discipline_id', $disciplines->id)->exists();
    //     if ($atividades) {
    //         return redirect()->back()->with('erro', 'Não foi possivel deletar pois existem atividades nessa disciplina');
    //     }
    //     if ($disciplines->delete()) {
    //         return redirect()->route('disciplines.index')->with('msg', 'Disciplina deletada com sucesso');
    //     }
    //     return redirect()->back()->with('erro', 'Não foi possivel deletar discilina');
    // }
    public function deleteData($id)
    {
        $data = Disciplines::findOrFail($id)->delete();
        return response()->json($data);
    }
}
