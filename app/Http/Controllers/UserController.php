<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\QuizCompleted;
use App\Models\QuizQuesion;
use App\Models\QuizSubmissionUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request){
        $data['getRecord'] = Quiz::getQuiz();
        // dd($data['getRecord']);
        return view('user.index', $data);
    }

    public function quizz_completed(Request $request){
        $data['getRecord'] = QuizCompleted::getQuizCompleted(0, Auth::user()->id);
        // dd($data['getRecord']);
        return view('user.quizz_completed', $data);
    }
    public function quizz_action(Request $request, $id){
        $data['getRecord'] = QuizQuesion::getQuiz($id);
        $data['getSingle'] = Quiz::getSingle($id);
        // dd($data);
        return view('user.quizz_action', $data);
    }
    public function quizz_action_submit(Request $request, $id){
        // $data['getRecord'] = QuizQuesion::getQuiz($id);
        // $data['getSingle'] = Quiz::getSingle($id);
        // dd($request->all());
        foreach($request->answer as $ans){
            $save = new QuizSubmissionUser();
            $save->user_id = $request->user_id;
            $save->quesion_id = $ans['quesion_id'];
            $save->choice = $ans['choice']; 
            $save->save();
        }
        
        return redirect('/quizz-completed')->with(['message' => 'Berhasil Mengerjakan']);
    }
}
