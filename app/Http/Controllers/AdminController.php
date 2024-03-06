<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\QuizCompleted;

class AdminController extends Controller
{
    public function index(Request $request){
        $data['getRecord'] = Quiz::getQuiz();
        // dd($data['getRecord']);
        return view('admin.index', $data);
    }

    public function users(Request $request){
        $data['getRecord'] = QuizCompleted::getUserQuizz();
        // dd($data['getRecord']);
        return view('admin.users', $data);
    }


}
