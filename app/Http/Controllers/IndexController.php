<?php

namespace App\Http\Controllers;

use App\Models\Activities;
use App\Models\Disciplines;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {

        if (Auth::guard('teachers')->user()) {
            $user = Auth::guard('teachers')->user();
        }
        if (Auth::guard('students')->user()) {
            $user = Auth::guard('students')->user();
        }
        $disciplines = Disciplines::get();

        
        return view('index.index', compact('user','disciplines'));
    }

    public function account()
    {
        return view('index.account');
    }
}
