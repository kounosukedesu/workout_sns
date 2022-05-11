<?php

namespace App\Http\Controllers;

use App\Reply;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReplyRequest;

class ReplyController extends Controller
{



    public function store(ReplyRequest $request, Post $post, Reply $reply) {
        $input = $request['reply'];
        $reply->fill($input)->save();
        return redirect()->back();
    }

    public function toReplyStore(ReplyRequest $request, Post $post, Reply $reply) {
        $input = $request['reply'];
        $reply->fill($input)->save();
        return redirect()->back();
    }
}
