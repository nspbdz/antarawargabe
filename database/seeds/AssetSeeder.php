<?php

namespace App\Models;
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Asset;


class AssetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Asset::insert([
            'assetcode' => "tech",
            "assetmasternumber"=> 111,
            "jobname"=>"teknologi",
            "contractnumber"=> 2020,
            "contractvalue"=> 19011,
            'isactive' => 1,

        ]);
    }
}
