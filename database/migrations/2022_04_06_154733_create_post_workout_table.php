<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostWorkoutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_workout', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedInteger('post_id');
            $table->unsignedInteger('workout_id');
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('post_id')->references('id')->on('posts')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('workout_id')->references('id')->on('workouts')->onUpdate('CASCADE')->onDelete('CASCADE');
                    
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_workout');
    }
}
