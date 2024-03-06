<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class QuizCompleted extends Model
{
    use HasFactory;
    protected $table = 'quiz_completeds';
    protected $guarded = ['id'];
    static public function getQuizCompleted($remove_paginate = 0, $user_id){
        $return = self::select('quiz_completeds.*', 'users.name as user_name', 'quizzes.*')
                    ->join('users' , 'users.id', '=', 'quiz_completeds.user_id')
                    ->join('quizzes' , 'quizzes.id' , '=' ,'quiz_completeds.quizz_id')
                    ->where('quiz_completeds.user_id', '=', $user_id);
                    if(!empty(Request::get('name'))){
                        $return = $return->where('quizzes.name', 'like', '%'.Request::get('name').'%');
                    }
                    $return = $return->orderBy('quiz_completeds.id', 'asc');
                    // if(!empty($remove_paginate)){
                        $return = $return->get();
                    // }else{ 
                        // $return = $return->paginate(2);
                    // }
        return $return;
    }
    static public function getUserQuizz($remove_paginate = 0){
        return  QuizCompleted::selectRaw( 'quiz_completeds.*, users.name as user_name, users.created_at as register , COUNT(quiz_completeds.quizz_id) as quizzes_count')
                    ->join('users' , 'users.id', '=', 'quiz_completeds.user_id') 
                    ->groupBy('quiz_completeds.user_id')
                     ->get();
                    
    }
}
