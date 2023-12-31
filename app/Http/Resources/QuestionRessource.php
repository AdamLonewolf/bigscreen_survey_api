<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\OptionResource;
use Illuminate\Http\Resources\Json\JsonResource;

class QuestionRessource extends JsonResource
{

    /**
     * rôle : Transforme le modèle SurveyQuestion et ses données en une représentation json
     * @param  $request : $request : va récupérer les données envoyées depuis le front via une requête http
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {   
        return[
            'id'=>$this->id,
            'title' => $this->title,
            'type' => $this->types->type,
            'option' => $this->types->type === "A" ? OptionResource::collection($this->propositions) : null //Si la question est de type A, on renvoie les propositions de cette réponse via OptionRessource, sinon, on renvoie "null"
        ];
    }
}
