<?php

namespace App\Models;
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProjectDetail;

class ProjectDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProjectDetail::insert([
            'projectname' => "pembuatan Jalan",
            'initiativename' => "pembuatan Jalan",
            'projectcode' => 1,
            "vendorname"=> "street Company",
            "jobdetail"=> "pembuatan Jalan",
            "budgetallocation" =>1000,
            "noformrequest"=>1000,
            "requestuploadfrom"=>1000,
            "kontraknumber"=>1000,
            "bastno"=>1000,
            "sppno"=>1000,
            "qtyupload"=>1000,
            "totalupload"=>1000,
            "note"=>1000,
            "notaNo"=>1000,
            "iocode" => 1,
            "isactive" => 1,
            "createdby" => 1,
        ]);
    }
}
