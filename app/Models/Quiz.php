<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class Quiz extends Model
{
    use HasFactory;
    protected $table = 'quizzes';
    protected $guarded = ['id'];
    static public function getSingle($id){
        return self::find($id);
    }
    static public function getQuiz($remove_pagination = 0){
        $return = self::select('quizzes.*');
                    if(!empty(Request::get('name'))){
                        $return = $return->where('quizzes.name', 'like','%'.Request::get('name').'%');
                    };
                    $return = $return->orderBy('id', 'asc');
                    if(!empty($remove_pagination)){
                        $return = $return->get();
                    }else{
                        $return = $return->paginate(2);
                    }
        return $return;
    }
    
}
