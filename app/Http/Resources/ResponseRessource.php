<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ResponseRessource extends JsonResource
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
            'question_id'=> $this->question_id,
            'question' => $this->question_number->title,
            'user_token' => $this->user_token,
            'user_id' => $this->user_id,
            'user_response' =>$this->user_response
        ];
    }
}
