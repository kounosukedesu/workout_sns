<?php

namespace App;

use App\Post;
use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    public function posts() {
        return $this->belongsToMany('App\Post')->withTimestamps();
    }
     public function getByWorkout(int $limit_count = 5)
    {
        return $this->posts()->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}
