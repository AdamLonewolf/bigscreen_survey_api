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
use Illuminate\Support\Collection;

class SurveyController extends Controller
{
    /**
     * rôle : Cette fonction va retourner la liste des questions 
     * @param: aucun
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
     * rôle : Fonction pour compter les réponses des utilisateurs
     * @param: aucun
     */

     public function countResponses(){

        try{
            
            $responses = SurveyResponses::all(); //je récupère toutes les réponses

            //Je compte les propositions de réponses dans ma table survey responses où l'id de la question est 6
            $responsesQuestion6 = $responses
            ->where('question_id', 6)
            ->countBy('user_response');

            //Je compte les propositions de réponses dans ma table survey responses où l'id de la question est 7
            $responsesQuestion7 = $responses
            ->where('question_id', 7)
            ->countBy('user_response');

             //Je compte les propositions de réponses dans ma table survey responses où l'id de la question est 8
            $responsesQuestion8 = $responses
            ->where('question_id', 8)
            ->countBy('user_response');

               // Je compte les propositions de réponses pour chaque question (11 à 15) et je calcule la moyenne

            //Pour chaque id dans le tableau,je calcule la moyenne pour chaque question

               $questionIds = [11, 12, 13, 14, 15];
               $averages = [];
            foreach ($questionIds as $questionId) {
                $average = $responses->where('question_id', $questionId)->avg('user_response'); //je calcule la moyenne des réponses de chaque question
                $averages["question_{$questionId}"] = $average; //je la stocke dans un tableau
            }

            return response()->json([
                'status' => "Done",
                'message' => 'Nombre de propositions donné par les utilisateurs',
                'question_6' => $responsesQuestion6,
                'question_7' => $responsesQuestion7,
                'question_8' => $responsesQuestion8,
                'question_quality' => $averages
             
            ]);
    
    
            } catch (Exception $e) {
                return response()->json([
                    'status' => "Error",
                    'error' => $e->getMessage() 
                ]);
            }
    
     }


    /**
     * rôle: Fonction pour récupérer les réponses de tous les utilisateur en fonction de leur token
     * @param  $page (number) : permet de renvoyer la page sur laquelle nous sommes.
     */
    public function getUserResponses($page){

        try{

    
        // Je récupère d'abord les tokens de chaque utilisateur distinctement (il n'y aura pas de doublons).
        $userTokens = SurveyResponses::distinct('user_token')->pluck('user_token');
        
        $per_page = 2; //Nombre d'éléments par page (pagination)

         // Je calcule le nombre total de pages en fonction du nombre de tokens et du nombre d'éléments par page (pagination)
        $totalPage = ceil($userTokens->count() / $per_page);   

        // Je récupère les tokens pour les page actuelle (ex : il y'aura les réponses de 3 utilisateurs pour la page 1 et ainsi de suite)
        $currentTokens = $userTokens->skip(($page - 1) * $per_page)->take($per_page);

        //Je parcours le tableau des token et pour chaque token, je récupère ses réponses
        $responses = [];
        foreach ($currentTokens as $token) {
            $responses[$token] = SurveyResponses::where('user_token', $token)->get();
        }
        
        return response()->json([
            'status' => "Done",
            'message' => 'Liste des réponses des utilisateurs',
            'data' => ResponseRessource::collection($responses),
            'currentPage' => $page, //Nombre de la page actuelle
            'totalPage' => $totalPage //Nombre total de pages
        ]);


        } catch (Exception $e) {
            return response()->json([
                'status' => "Error",
                'error' => $e->getMessage() 
            ]);
        }

    }


    /**
     * rôle : Cette fonction va permettre de récupérer les réponses d'un utilisateur spécifique
     * @param $token = token de l'utilisateur
     */

     public function getResponse($token){

        try{

        //Dans la table survey_responses, je regarde  les enregistrements, précisement la colonne user_token où on voit le token qui a été récupéré
        $response = SurveyResponses::where('user_token', $token)
            ->get(); //une fois qu'on trouve l'enregistrement qui a le token reçu, on récupère toutes les informations

        //On retourne les réponses de cet utilisateur sous format json

        return response()->json([
            'status' => "Done",
            'message' => 'La liste des réponses de l\'utilisateur',
            'data' => ResponseRessource::collection($response),
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
     *@param $request: va récupérer les données envoyées depuis le front via une requête http
     */
    public function submit(Request $request){
        
        try{

            //Je récupère les réponses envoyées depuis le front-end sous format json 

            $data = $request->json()->all();
           
            //Je cherche à enregistrer l'email de l'utilisateur dans la table Users

            $user = User::where('email', $data['responses'][0]['email'])->first();

            //S'il n'existe aucun enregistrement avec cet email, alors je le crée

            if (!$user) {
            $user = User::create([
                'email' => $data['responses'][0]['email'],
                'role_id' => 2
            ]);
             }
       
            //Je fais une boucle qui va itérer le tableau 'responses', je récupère les différentes informations et je les enregistre dans ma table survey_responses

            foreach($data['responses'] as $response){
                SurveyResponses::create([
                    'question_id' => $response['question_id'],
                    'user_token' => $response['user_token'],
                    'user_email' => $response['email'],
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
     * rôle : Fonction qui va permettre de générer un token
     * @param: aucun
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
