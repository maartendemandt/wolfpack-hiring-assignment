<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class WolvesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('wolves')->insert([
            'name' => 'Rene',
            'gender' => 'male',
            'birthday' => Carbon::createFromDate('1990', '06', '12'),
        ]);

        DB::table('wolves')->insert([
            'name' => 'Mitchel',
            'gender' => 'male',
            'birthday' => Carbon::createFromDate('1990', '02', '26'),
        ]);

        DB::table('wolves')->insert([
            'name' => 'Leanne',
            'gender' => 'female',
            'birthday' => Carbon::createFromDate('1990', '10', '02'),
        ]);
    }
}
