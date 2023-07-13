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
    //
});

//Route Permettant de récupérer la liste des questions

Route::get('/questions', [SurveyController::class, 'index']);

//Route Permettant de récupérer les réponses d'un utilisateur spécifique.

Route::get('/get_responses/{token}', [SurveyController::class, 'getAnswer']);

//Route Permettant de soumettre les réponses d’un utilisateur en fonction de la question. 

Route::post('/submit_response/{id}/{token}', [SurveyController::class, 'submit']);

//Route Permettant de générer le token de l’utilisateur 

Route::post('/generate_token', [SurveyController::class, 'generateToken']);



//--Routes pour l’authentification

//Route Permettant à un utilisateur de se connecter (l’admin)

Route::post('/login', [AuthController::class, 'login']);

//Route Permettant à un utilisateur de se déconnecter (l’admin)

Route::post('/login', [AuthController::class, 'login']);
