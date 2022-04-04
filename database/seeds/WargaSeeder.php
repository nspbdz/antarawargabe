<?php


use Illuminate\Database\Seeder;

class WargaSeeder extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('warga')->insert([
            'nik' => 1233219,
            'name' => "udin",
            'placeofbirth' => "indo",
            // 'birthdate' =>
            'iswarga_lingkungan' => "1",
            'job' => "teknologi",
            'isactive' => 1,
        ]);
        DB::table('warga')->insert([
            'nik' => 1233212,
            'name' => "mimin",
            'placeofbirth' => "arab",
            // 'birthdate' =>
            'iswarga_lingkungan' => "1",
            'job' => "teknologi",
            'isactive' => 1,
        ]);
        DB::table('warga')->insert([
            'nik' => 1233213,
            'name' => "udin",
            'placeofbirth' => "india",
            // 'birthdate' =>
            'iswarga_lingkungan' => "1",
            'job' => "teknologi",
            'isactive' => 1,
        ]);
    }
}
