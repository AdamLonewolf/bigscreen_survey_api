<?php

namespace App\Models;

use App\Models\SurveyQuestions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Type extends Model
{
    use HasFactory;
    protected $table = "types";
    protected $primaryKey = "id";
    protected $fillable = [
        'type'
    ];


    //Relation entre la table Survey_questions et la table types (un type est donné à plusieurs questions)

    public function question_type()
    {
        return $this->hasMany(SurveyQuestions::class);
    }
}
