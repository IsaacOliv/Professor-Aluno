<?php

namespace App\Http\Controllers;

use App\Models\Activities;
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
        
        return view('index.index', compact('user'));
    }
}
