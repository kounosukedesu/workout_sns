<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Workout Diary</title>
</head>
@extends('layouts.app')
@section('content')
<div class="frame">
    <div class="timeline">
        <!--投稿詳細-->
        <div class="post">
            <div class="post_top">
                <h2>{{$user->name}}</h2>
                @foreach($post->workouts as $workout)
                <a href="/categories/{{$workout->id}}" class="workout">
                    <p class="workout_font">{{$workout->name}}</p>
                </a>
                @endforeach
            </div>
            <p>{{$post->created_at->format('Y-m-d')}}</p>
            <div class="post_images_text">

                <div class="slideShow">
                    <ul class="slider">
                        <li class="slider-item01" id="js-image"><img src="{{$post->image1}}"></li>
                        <li class="slider-item02"><img src="{{$post->image2}}"></li>
                        <li class="slider-item03"><img src="{{$post->image3}}"></li>
                    </ul>
                    <button class="btn-prev">▼</button>
                    <button class="btn-next">▼</button>
                </div>

                <p class="post_text">{{$post->body}}</p>
            </div>
            <div class="likes">
                @if($post->is_like_by_auth_user())
                <a href="{{ route('post.unlike', ['id' => $post->id]) }}" class="btn btn-success btn-sm">&hearts;<span class="badge">{{ $post->likes->count() }}</span></a>
                @else
                <a href="{{ route('post.like', ['id' => $post->id]) }}" class="btn btn-secondary btn-sm">&hearts;<span class="badge">{{ $post->likes->count() }}</span></a>
                @endif
            </div>
        </div>
        <!-- リプライ -->
        @foreach($replies as $reply)
        <?php $second_replies = \App\Reply::where('post_id', $post->id)->where('reply_id', $reply->id)->get(); ?>

        <div class="post reply_text">
            <div class="post_top">
                <h2>{{$reply->user->name}}</h2>
            </div>
            <p>{{$reply->created_at->format('Y-m-d')}}</p>
            <div class="post_images_text">
                <p class="post_text">{{$reply->body}}</p>
            </div>
            <i class="fa-solid fa-comment"></i>
            <!-- リプライ返信一覧と作成フォーム -->
            <div class="second_reply_frame">
                <!-- リプライへの返信一覧 -->
                @foreach($second_replies as $second_reply)
                <div class="second_reply">
                    <p class="second_reply_name">[{{$second_reply->user->name}}]</p>
                    <p class="second_reply_body">>> {{$second_reply->body}}</p>
                </div>
                @endforeach
                <!-- リプライへの返信投稿作成欄 -->
                <form action="/show/reply" method="POST" enctype='multipart/form-data'>
                    @csrf
                    <div class="replies">
                        <textarea class="reply_textarea" name="reply[body]" placeholder="コメントへの返信をする"></textarea>
                        <p class="title__error" style="color:red">{{ $errors->first('reply.body') }}</p>
                        <input type='hidden' value="{{Auth::id()}}" name="reply[user_id]" />
                        <input type='hidden' value="{{$post->id}}" name="reply[post_id]" />
                        <input type='hidden' value="{{$reply->id}}" name="reply[reply_id]" />
                    </div>
                    <input class="reply_submit" type="submit" value="返信" />
                </form>
            </div>
        </div>
        @endforeach
        <!-- リプライ投稿作成欄 -->
        <form class="reply_form" action="/show" method="POST" enctype='multipart/form-data'>
            @csrf
            <div class="replies">
                <textarea class="reply_textarea" name="reply[body]" placeholder="リアクションをする"></textarea>
                <p class="title__error" style="color:red">{{ $errors->first('reply.body') }}</p>
                <input type='hidden' value="{{Auth::id()}}" name="reply[user_id]" />
                <input type='hidden' value="{{$post->id}}" name="reply[post_id]" />
            </div>

            <input class="reply_submit" type="submit" value="返信" />
        </form>
    </div>
    <div class="sidebar">
        <aside>
            <ul class="gmenu">
                <li class="menu" id="js-menu"><a href="/posts/profile">マイページ</a></li>
                <li class="menu"><a href="/posts/create">投稿する</a></li>
                <li class="menu">
                    <a href="">部位選択</a>
                    <ul>
                        @foreach($workouts as $workout)
                        <li><a href="/categories/{{$workout->id}}">{{$workout->name}}</a></li>
                        @endforeach
                    </ul>
                </li>
                <!--<li class="menu"><a href="">ランキング</a></li>-->
            </ul>
        </aside>
    </div>
</div>
<script src="{{ mix('js/slider.js') }}" defer></script>
<script src="{{ mix('js/reply.js') }}" defer></script>
@endsection

</html>