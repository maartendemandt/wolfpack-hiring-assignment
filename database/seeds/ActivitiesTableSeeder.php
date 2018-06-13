<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Wolf;

class ActivitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $wolves = Wolf::get();

        foreach($wolves as $wolf) {

            for($i = 1; $i <= 7; $i++) {
                $random_day = rand(0, 14);
                $random_start = rand(1, 4);
                $random_end = rand(1, 4);
                DB::table('activities')->insert([
                    'wolf_id' => $wolf->id,
                    'start_time' => Carbon::now()->subDays($random_day)->subHours($random_start),
                    'end_time' => Carbon::now()->subDays($random_day)->addHours($random_end),
                ]);
            }
    
            DB::table('activities')->insert([
                'wolf_id' => $wolf->id,
                'start_time' => Carbon::now()->addHours(4),
                'end_time' => Carbon::now(),
            ]);
    
        }     

    }
}
