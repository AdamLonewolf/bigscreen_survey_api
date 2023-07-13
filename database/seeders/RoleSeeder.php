<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Je seeds des informations dans ma table roles
     */
    public function run(): void
    {
        $role = new Role();
        $role->role = "admin";
        $role->save();

        $role = new Role();
        $role->role = "utilisateur";
        $role->save();
    }
}
