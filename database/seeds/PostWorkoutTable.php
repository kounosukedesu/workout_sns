<?php

use Illuminate\Database\Seeder;

class PostWorkoutTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
             DB::table('post_workout')->insert([
                    'post_id'=>1,
                    'workout_id'=>4,
            ]); 
    }
}
