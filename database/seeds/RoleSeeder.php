<?php

namespace App\Models;
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::insert([
            'name' => "pm-dh",
            'position' => "leader",
        ]);
        Role::insert([
            'name' => "pm-tl",
            'position' => "leader",

        ]);

        Role::insert([
            'name' => "pnp-tl",
            'position' => "leader",

        ]);
        Role::insert([
            'name' => "admin",
            'position' => "admin",

        ]);
    }
}
