<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ResponseRessource extends JsonResource
{
    /**
     * rôle :Transforme le modèle SurveyResponses et ses données en une représentation json
     * @param  $request : $request : va récupérer les données envoyées depuis le front via une requête http
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {   
         // Je vérifie si la valeur est une collection (Tableau contenant plusieurs réponses) ou une seule réponse
        if ($this->resource instanceof \Illuminate\Support\Collection) {
            // Si c'est une collection, retourner les réponses sous forme de tableau
            return $this->resource->map(function ($item) {
                return [
                    'id' => $item->id,
                    'question_id' => $item->question_id,
                    'question' => $item->question_number->title,
                    'user_token' => $item->user_token,
                    'user_id' => $item->user_id,
                    'user_response' => $item->user_response
                ];
            })->toArray();
        } else {
            // Sinon si ce n'est pas le cas
            return [
                'id' => $this->id,
                'question_id' => $this->question_id,
                'question' => $this->question_number->title,
                'user_token' => $this->user_token,
                'user_id' => $this->user_id,
                'user_response' => $this->user_response
            ];
        }
    }
}
