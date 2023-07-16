<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QuestionRessource extends JsonResource
{

    /**
     * Transforme le modèle Pairs et ses données en une représentation json
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {   
        return[
            'id'=>$this->id,
            'title' => $this->title,
            'type' => $this->types->type
        ];
    }
}
