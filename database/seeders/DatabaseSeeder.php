<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\TypeSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\OptionSeeder;
use Database\Seeders\SurveyQuestionSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * J'appelle tous les seeder pour ensuite envoyer leurs données dans leurs tables respectives
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            TypeSeeder::class,
            SurveyQuestionSeeder::class,
            OptionSeeder::class
        ]);
    }
}
