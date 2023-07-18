<?php

namespace App\Models;

use App\Models\Type;
use App\Models\SurveyResponses;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SurveyQuestions extends Model
{
    use HasFactory;

    
    protected $table = "survey_questions";
    protected $primaryKey = "id";
    protected $fillable = [
        'title',
        'question_label',
    ];

    //Relation entre la table Survey_questions et la table options (une question a plusieurs propositions)

    public function propositions()
    {
        return $this->hasMany(Option::class,'question_id');
    }

   //Relation entre la table Survey_questions et la table types (Chaque question a un type)
    public function types()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }

     //Relation entre la table Survey_questions et la table Survey_response (une question a une seule réponse)
     public function response()
     {
         return $this->hasOne(SurveyResponses::class);
     }
}
