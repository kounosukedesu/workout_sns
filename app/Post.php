<?php

namespace App;

use App\User;
use App\Like;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = [
    'body',
    'user_id'
    ];

    public function getFollowsPost() {
        return  Post::query()->whereIn('user_id', Auth::user()->follows()->pluck('user_id'))->latest()->paginate(15);
    }

    public function getPeginateByLimit($target)
    {
        if(isset($target))
        {
        $target = Post::where('user_id', Auth::user()->id);
        return $target->orderBy('updated_at', 'DESC')->paginate(15);
        } else {
        return $this->orderBy('updated_at', 'DESC')->paginate(15);
        }
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

    public function replies() {
        return $this->hasMany('App\Reply');
    }


}
