<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;

class AdminController extends Controller
{
    public function index(Request $request){
        $data['getRecord'] = Quiz::getQuiz();
        // dd($data['getRecord']);
        return view('admin.index', $data);
    }
}
