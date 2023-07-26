<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OptionResource extends JsonResource
{
    /**
     * rôle: Transforme le modèle Options et ses données en une représentation json
     * @param  $request : $request : va récupérer les données envoyées depuis le front via une requête http
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'option_label' => $this->option_label,
        ];
    }
}
