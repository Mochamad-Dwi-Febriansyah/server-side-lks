<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizSubmissionUser extends Model
{
    use HasFactory;
    protected $table = 'quiz_submission_users';
    protected $guarded = ['id'];
}
