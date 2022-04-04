<?php

use Illuminate\Database\Seeder;
// use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            'email' => "admin@gmail.com",
            'name' => "pmDh",
            'isactive' => 1,
            'role' => "admin",
            'password' => Hash::make('12345678'),
        ]);
        DB::table('users')->insert([
            'email' => "member@gmail.com",
            'name' => "pmTl",
            'isactive' => 1,
            'role' => "admin",
            'password' => Hash::make('12345678'),
        ]);
        DB::table('users')->insert([
            'email' => "staff@gmail.com",
            'name' => "pnptl",
            'isactive' => 1,
            'role' => "admin",
            'password' => Hash::make('12345678'),
        ]);

    }
}
