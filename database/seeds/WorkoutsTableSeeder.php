<?php

use Illuminate\Database\Seeder;

class WorkoutsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $workout_kinds = ["胸トレ","肩トレ","腕トレ","背中トレ","尻トレ","脚トレ","上半身","下半身","食事","その他",];
        foreach($workout_kinds as $workout_kind) {

             DB::table('workouts')->insert([
                    'name'=>$workout_kind,
            ]);
        }

    }
}
