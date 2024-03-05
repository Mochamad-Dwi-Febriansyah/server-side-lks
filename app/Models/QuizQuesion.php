<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizQuesion extends Model
{
    use HasFactory;
    protected $table = 'quiz_quesions';
    protected $guarded = ['id'];
    static public function getQuiz($id, $remove_paginate = 0){
        $return = self::select('quiz_quesions.*') 
                    // ->join('quizzes' , 'quizzes.id' , '=' ,'quiz_quesions.quizz_id')
                    ->where('quiz_quesions.quizz_id', '=' ,$id);
                    $return = $return->orderBy('quiz_quesions.id', 'asc'); 
                    // if(!empty($remove_paginate)){
                        $return = $return->get();
                    // }else{ 
                        // $return = $return->paginate(1);
                    // }
        return $return;
    }
}
