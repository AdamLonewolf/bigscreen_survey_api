<?php

namespace Database\Seeders;

use App\Models\SurveyQuestions;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SurveyQuestionSeeder extends Seeder
{
    /**
     * Je seed des informations dans la table SurveyQuestions
     */
    public function run(): void
    {
        $question = new SurveyQuestions();
        $question->title = "Votre adresse mail ?";
        $question->type_id = 2 ;
        $question->save();

        $question = new SurveyQuestions();
        $question->title = "Votre âge ?";
        $question->type_id = 3 ;
        $question->save();

        $question = new SurveyQuestions();
        $question->title = "Votre sexe ?";
        $question->type_id = 1 ;
        $question->save();

        $question = new SurveyQuestions();
        $question->title = "Nombre de personnes dans votre foyer (adulte & enfants - répondant inclus) ?";
        $question->type_id = 3 ;
        $question->save();


        $question = new SurveyQuestions();
        $question->title = "Votre profession ?";
        $question->type_id = 2 ;
        $question->save();

        $question = new SurveyQuestions();
        $question->title = "Quelle marque de casque VR utilisez-vous ?";
        $question->type_id = 1;
        $question->save();

        $question = new SurveyQuestions();
        $question->title = "Sur quel magasin d'application achetez-vous des contenus VR ?";
        $question->type_id = 1 ;
        $question->save();

        $question = new SurveyQuestions();
        $question->title = "Quel casque envisagez-vous d'acheter dans un futur proche ?
        ";
        $question->type_id = 1 ;
        $question->save();

        $question = new SurveyQuestions();
        $question->title = "Au sein de votre foyer, combien de personnes utilisent votre casque VR pour regarder Bigscreen ?";
        $question->type_id = 3 ;
        $question->save();

        $question = new SurveyQuestions();
        $question->title = "Vous utilisez principalement Bigscreen pour... ?";
        $question->type_id = 1 ;
        $question->save();

        $question = new SurveyQuestions();
        $question->title = "Combien de points (de 1 à 5) donnez-vous à la qualité de l'image sur Bigscreen ?";
        $question->type_id = 3 ;
        $question->save();

        $question = new SurveyQuestions();
        $question->title = "Combien de points (de 1 à 5) donnez-vous au confort d'utilisation de l'interface Bigscreen ?";
        $question->type_id = 3 ;
        $question->save();

        $question = new SurveyQuestions();
        $question->title = "Combien de points (de 1 à 5) donnez-vous à la connexion réseau de Bigscreen ?";
        $question->type_id = 3 ;
        $question->save();

        $question = new SurveyQuestions();
        $question->title = "Combien de points (de 1 à 5) donnez-vous à la qualité des graphismes 3D dans Bigscreen ?";
        $question->type_id = 3 ;
        $question->save();

        $question = new SurveyQuestions();
        $question->title = "Combien de points (de 1 à 5) donnez-vous à la qualité audio dans Bigscreen ?";
        $question->type_id = 3 ;
        $question->save();
        
        $question = new SurveyQuestions();
        $question->title = "Aimeriez-vous avoir des notifications plus précises au cours de vos sessions Bigscreen ?";
        $question->type_id = 1 ;
        $question->save();

        $question = new SurveyQuestions();
        $question->title = "Aimeriez-vous pouvoir inviter un ami à rejoindre votre session via son smartphone ?";
        $question->type_id = 1 ;
        $question->save();

        $question = new SurveyQuestions();
        $question->title = "Aimeriez-vous pouvoir enregistrer des émissions TV pour pouvoir les regarder ultérieurement ?";
        $question->type_id = 1 ;
        $question->save();

        $question = new SurveyQuestions();
        $question->title = "Aimeriez-vous jouer à des jeux exclusifs sur votre Bigscreen ?";
        $question->type_id = 1 ;
        $question->save();

        $question = new SurveyQuestions();
        $question->title = "Selon vous, quelle nouvelle fonctionnalité devrait exister sur Bigscreen ?";
        $question->type_id = 2 ;
        $question->save();

    }
}
