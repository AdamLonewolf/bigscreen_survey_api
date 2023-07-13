<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Je seed des informations dans table Type
     */
    public function run(): void
    {
        $type = new Type();
        $type->type = "A";
        $type->save();

        $type = new Type();
        $type->type = "B";
        $type->save();

        $type = new Type();
        $type->type = "C";
        $type->save();
    }
}
