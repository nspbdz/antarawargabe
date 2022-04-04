<?php


use Illuminate\Database\Seeder;

class AccessSeeder extends Seeder
{

    public function run()
    {
         Access::create([
            'roleid' => 1,
            'page' => "approval,dashboard,master role,master user,", // you can easily assign an actual integer array here
            // 'status_id' => 1
        ]);

        Access::create([
            'roleid' => 2,
            'page' => "approval,dashboard,master role,master user,", // you can easily assign an actual integer array here
            // 'status_id' => 1
        ]);
        Access::create([
            'roleid' => 3,
            'page' => "approval,dashboard,master role,master user,", // you can easily assign an actual integer array here
            // 'status_id' => 1
        ]);
        Access::create([
            'roleid' => 4,
            'page' => "approval,dashboard,master role,master user,", // you can easily assign an actual integer array here
            // 'status_id' => 1
        ]);



    }
}
