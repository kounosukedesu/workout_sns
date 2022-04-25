<?php

namespace App;

use App\User;
use App\Like;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
    'body',
    'user_id'
    ];
    public function getPeginateByLimit(int $limit_count = 5)
    {
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function workouts()
    {
        return $this->belongsToMany('App\Workout')->withTimestamps();
    }
    
    public function likes()
    {
        return $this->hasMany('App\Like');
    }
    
    public function is_like_by_auth_user()
    {
        $id = Auth::id();
        
        $likers = array();
        foreach($this->likes as $like) {
            array_push($likers, $like->user_id);
        }
        
        return in_array($id,$likers);
    }
}
