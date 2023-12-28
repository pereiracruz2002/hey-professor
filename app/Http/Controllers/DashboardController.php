<?php

namespace App\Http\Controllers;

use App\Models\Question;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'questions' => Question::all(),
        ]);
    }
}
