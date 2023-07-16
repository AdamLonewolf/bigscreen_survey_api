<?php

namespace App\Models;

use App\Models\SurveyQuestions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Option extends Model
{
    use HasFactory;

    protected $table = "options";
    protected $primaryKey = "id";
    protected $fillable = [
        'option_label',
    ];

    //Relation entre la table options et la table questions (les propositions appartiennent à une question de la table survey_questions)
    public function question()
    {
        return $this->belongsTo(SurveyQuestions::class, 'question_id');
    }
}
