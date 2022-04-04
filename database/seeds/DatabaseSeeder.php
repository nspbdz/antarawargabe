<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call([
            WargaSeeder::class,
            UserSeeder::class,
            // ProjectSeeder::class,
            // InternalOrderSeeder::class,
            // AccessSeeder::class,
            // AssetSeeder::class,
            // TeamSeeder::class,
            // ProjectDetailSeeder::class,

        ]);
    }
}
