<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use Illuminate\Support\Facades\Auth;

class FollowUserController extends Controller
{

    public function store(Post $post, User $user) {
        // auth()->user()->follows()->attach(User::where('id', $post->user_id)->get() );
        // dd($user);
        auth()->user()->follows()->attach($user);
        return redirect()->back();
    }

    public function destroy(Post $post, User $user) {
        auth()->user()->follows()->detach( $user);
        return redirect()->back();
    }
}
