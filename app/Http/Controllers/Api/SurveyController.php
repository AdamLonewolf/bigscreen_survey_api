<?php

namespace App\Http\Controllers\Api;

use Exception;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\SurveyQuestions;
use App\Models\SurveyResponses;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\QuestionRessource;
use App\Http\Resources\ResponseRessource;
use App\Models\User;

class SurveyController extends Controller
{
    /**
     * Cette fonction va retourner la liste des questions 
     */

    public function index(){
        try{

            return response()->json([
                'status' => "Done",
                'message' => 'Liste des questions',
                'data' => QuestionRessource::collection(SurveyQuestions::all()),
                 //On chaque objet de la collection en un tableau JSON
            ]);

        } catch (Exception $e) {
            return response()->json([
                'status' => "Error",
                'error' => $e->getMessage() 
            ]);
        }
    }


    /**
     * Fonction pour récupérer la liste intégrale des réponses
     */

     public function responses(){
        try{

            return response()->json([
                'status' => "Done",
                'message' => 'Liste des questions',
                'data' => ResponseRessource::collection(SurveyResponses::all()),
                 //On chaque objet de la collection en un tableau JSON
            ]);

        } catch (Exception $e) {
            return response()->json([
                'status' => "Error",
                'error' => $e->getMessage() 
            ]);
        }
     }

    /**
     * Cette fonction va permettre de récupérer les réponses d'un utilisateur spécifique
     * token = token de l'utilisateur
     */

     public function getAnswer($token){

        try{

        //Dans la table survey_responses, je regarde  les enregistrements, précisement la colonne user_token où on voit le token qui a été récupéré

        $response = DB::table('survey_responses')
        ->whereIn('user_token', $token)
        ->get(); //une fois qu'on trouve l'enregistrement qui a le token reçu, on récupère toutes les informations

        //On retourne les réponses de cet utilisateur sous format json

        return response()->json([
            'status' => "Done",
            'message' => 'La liste des réponses de l\'utilisateur',
            'data' => $response
             //On chaque objet de la collection en un tableau JSON
        ]);


        } catch (Exception $e){
            return response()->json([
                'status' => "Error",
                'error' => $e->getMessage() 
            ]);
        }
     }

     
    /**
     * Cette fonction va permettre de soumettre les réponses d’un utilisateur en fonction de la question.
     * id = id de la question
     * token = token de l'utilisateur
     */
    public function submit(Request $request){
        
        try{

            //Je récupère les réponses envoyées depuis le front-end sous format json 
            $data = $request->json()->all();

            //Je cherche à enregistrer l'email de l'utilisateur dans la table Users

            $user = User::where('email', $data['email'])->first(); //Je cherche dans la table users un enregistrement qui contient l'email qui a été envoyé depuis le front.

            //S'il n'existe aucun enregistrement avec cet email, alors je le crée
            if(!$user){
                $user = User::create([
                    'email' => $data['email'],
                ]);
            }

            //Je fais une boucle qui va itérer le tableau 'responses', je récupère les différentes informations et je les enregistre dans ma table survey_responses
            foreach($data['responses'] as $response){
                SurveyResponses::create([
                    'question_id' => $response['question_id'],
                    'user_id' => $user->id,
                    'user_token' => $response['user_token'],
                    'user_response' => $response['user_response']
                ]);
            }


            return response()->json([
                'status' => "Done",
                'message' => 'Les réponses ont été enregistrées avec succès',
            ]);

        } catch (Exception $e) {
            return response()->json([
                'status' => "Error",
                'error' => $e->getMessage() 
            ]);
        }
       
    }

    /**
     * Fonction qui va permettre de générer un token
     */
    public function generateToken(){
       
        try{

        //On crée une chaîne de caractères composée de 15 caractères

        $string = Str::random(15);
        $date = now()->format('Y-m-d H:i:s');
        $token = hash('sha256', $string . $date);
         //Je fais un hashage de la chaîne de caractère pour la protéger.

        return response()->json([
            'status' => "Done",
            'message' => 'Un token a été généré avec succès',
            'token' => $token,
             //On chaque objet de la collection en un tableau JSON
        ]);

        } catch (Exception $e) {
            return response()->json([
                'status' => "Error",
                'error' => $e->getMessage() 
            ]);
        }
    
    }
     
}
