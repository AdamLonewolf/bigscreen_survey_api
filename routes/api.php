<?php

use Illuminate\Http\Request;
use App\Models\SurveyQuestions;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\SurveyController;




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//--Routes de mon application--


//--Routes pour le sondage 

//Route Permettant d’interroger le serveur afin de savoir s’il fonctionne ou non

Route::get('/ping',function(){
    $question = SurveyQuestions::all(); //Je récupère toutes les questions de la table survey_questions

    //Je fais une condition pour vérifier si ma tabble est vide. Si oui, on renvoie un message d'erreur.

    if(!$question->isEmpty()){
       return response()->json([
        "status" => "Done",
	    "message" => "Le service est fonctionnel."
       ]); 
    } else {
        return response()->json([
            "status" => "Error",
            "message" => "Le service rencontre un problème."
           ]); 
    }
});

//Route Permettant de récupérer la liste des questions

Route::get('/questions', [SurveyController::class, 'index']);

//Route Permettant de récupérer les réponses d'un utilisateur spécifique.

Route::get('/responses/{token}', [SurveyController::class, 'getResponse']);

//Route Permettant de soumettre les réponses d’un utilisateur en fonction de la question. 

Route::post('/submit_responses', [SurveyController::class, 'submit']);

//Route Permettant de générer le token de l’utilisateur 

Route::get('/generate_token', [SurveyController::class, 'generateToken']);

//Route pour récupérer les réponses de tous les utilisateur en fonction de leur token (paginée)

Route::get('/user/responses/{page}',[SurveyController::class, 'getUserResponses']);

//Route pour compter les réponses envoyées par les utilisateurs (pour les statistiques)

Route::get('/count/responses',[SurveyController::class, 'countResponses']);

//--Routes pour l’authentification

//Route Permettant à un utilisateur de se connecter (l’admin)

Route::post('/login', [AuthController::class, 'login']);

//Route Permettant à un utilisateur de se déconnecter (l’admin)

Route::get('/logout/{id}', [AuthController::class, 'logout']);
