<?php

namespace App\Models;
namespace Database\Seeders;
use App\Models\Departement;
use Illuminate\Database\Seeder;



class DepartementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Departement::insert([
            'departementcode' => "tech",
            'name' => "teknologi",
            'isactive' => 1,
        ]);
    }
}
