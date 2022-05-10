<?php

namespace App\Http\Controllers;

use App\Reply;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ReplyController extends Controller
{



    public function store(Request $request, Post $post, Reply $reply) {
        $input = $request['reply'];
        $reply->fill($input)->save();
        return redirect()->back();
    }

    public function toReplyStore(Request $request, Post $post, Reply $reply) {
        $input = $request['reply'];
        $reply->fill($input)->save();
        return redirect()->back();
    }
}
