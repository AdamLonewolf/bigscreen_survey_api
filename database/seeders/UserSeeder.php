<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Je seed des informtions dans la table des utilisateurs 
     */
    public function run(): void
    {
        $user = new User();
        $user->name = "adam coulibaly";
        $user->email = "adam@gmail.com";
        $user->password = Hash::make("2403");
        $user->role_id = 1;
        $user->save();
    }
}
