<?php

namespace Database\Seeders;

use App\Models\Option;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OptionSeeder extends Seeder
{
    /**
     * Je seed des informations dans la table options
     */
    public function run(): void
    {
        
        //Je fais un tableau qui va lister toutes les propositions 

        $choices = [
            [
                'option_label' => 'Homme',
                'question_id' => 3,
            ],
            [
                'option_label' => 'Femme',
                'question_id' => 3,
            ],
            [
                'option_label' => 'Préfère ne pas répondre',
                'question_id' => 3,
            ],
            [
                'option_label' => 'Oculus Quest',
                'question_id' => 6,
            ],
            [
                'option_label' => 'Oculus Rift/s',
                'question_id' => 6,
            ],
            [
                'option_label' => 'HTC Vive',
                'question_id' => 6,
            ],
            [
                'option_label' => 'Windows Mixed Reality',
                'question_id' => 6,
            ],
            [
                'option_label' => 'Valve Index',
                'question_id' => 6,
            ],
            [
                'option_label' => 'SteamVR',
                'question_id' => 7,
            ],
            [
                'option_label' => 'Oculus Store',
                'question_id' => 7,
            ],
            [
                'option_label' => 'Viveport',
                'question_id' => 7,
            ],
            [
                'option_label' => 'Windows Store',
                'question_id' => 7,
            ],
            [
                'option_label' => 'Oculus Quest',
                'question_id' => 8,
            ],
            [
                'option_label' => 'Oculus Go',
                'question_id' => 8,
            ],
            [
                'option_label' => 'HTC Vive Pro',
                'question_id' => 8,
            ],
            [
                'option_label' => 'PSVR',
                'question_id' => 8,
            ],
            [
                'option_label' => 'Autre',
                'question_id' => 8,
            ],
            [
                'option_label' => 'Aucun',
                'question_id' => 8,
            ],
            [
                'option_label' => 'Regarder la TV en direct',
                'question_id' => 10,
            ],
            [
                'option_label' => 'Regarder des films',
                'question_id' =>10,
            ],
            [
                'option_label' => 'Travailler',
                'question_id' =>10,
            ],
            [
                'option_label' => 'Jouer en solo',
                'question_id' => 10,
            ],
            [
                'option_label' => 'Jouer en équipe',
                'question_id' => 10,
            ],
            [
                'option_label' => 'Oui',
                'question_id' => 16,
            ],
            [
                'option_label' => 'Non',
                'question_id' => 16,
            ],
            [
                'option_label' => 'Oui',
                'question_id' => 17,
            ],
            [
                'option_label' => 'Non',
                'question_id' => 17,
            ],
            [
                'option_label' => 'Oui',
                'question_id' => 18,
            ],
            [
                'option_label' => 'Non',
                'question_id' => 18,
            ],
            [
                'option_label' => 'Oui',
                'question_id' => 19,
            ],
            [
                'option_label' => 'Non',
                'question_id' => 19,
            ],
        ];


        //On va faire une boucle qui va parcourir ce tableau et créer des objets

        foreach($choices as $choice){
            $option = new Option();
            $option->option_label = $choice['option_label'];
            $option->question_id = $choice['question_id'];
            $option->save();
        }

    }
}
