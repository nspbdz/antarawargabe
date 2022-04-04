<?php

namespace App\Models;

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::insert([
            'projectname' => "pembuatan Jalan",
            'initiativename' => "pembuatan Jalan",
            'projectcode' => 1,
            "budgetallocation" =>1000,
            "iocode" => 1,
            "isactive" => 1,
        ]);
    }
}
