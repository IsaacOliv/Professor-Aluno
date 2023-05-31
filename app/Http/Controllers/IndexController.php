<?php

namespace App\Http\Controllers;

use App\Models\Activities;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {


        $user = Auth::guard('teachers')->user();
        return view('index.index', compact('user'));
    }
}
