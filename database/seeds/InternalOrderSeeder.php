<?php

namespace App\Models;
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\InternalOrder;

class InternalOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        InternalOrder::insert([
            'name' => "pembuatan Jalan",
            "iocode" => 1,
            "isactive" => 1,
        ]);
    }
}
