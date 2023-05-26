<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request): View{
        return view('dashboard', [
            'data' => Auth::user()
        ]);
    }
}
