<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyResponses extends Model
{
    use HasFactory;

    protected $table = "survey_responses";
    protected $primaryKey = "id";
    protected $fillable = [
        'question_id',
        'user_email',
        'user_response',
        'user_token',
    ];

     //Relation entre la table Survey_questions et la table Survey_response (Une réponse est liée a une question)
     public function question_number()
     {
         return $this->belongsTo(SurveyQuestions::class, 'question_id');
     }
}
