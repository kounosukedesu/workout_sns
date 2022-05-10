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
        @foreach($posts as $post)
        <div class="post">

            <div class="post_top">
                <a href="/posts/{{$post->id}}">
                    <h2>{{$post->user->name}}</h2>
                </a>
                @foreach($post->workouts as $workout)
                <a href="/categories/{{$workout->id}}" class="workout">
                    <p class="workout_font">{{$workout->name}}</p>
                </a>
                @endforeach
            </div>

            <p>{{$post->created_at->format('Y-m-d')}}</p>

            <div class="post_images_text">
                @if($post->image1 === Null)

                @else
                <div class="slideShow">
                    <ul class="slider">
                        <li class="slider-item01" id="js-image"><img src="{{$post->image1}}"></li>
                        <li class="slider-item02"><img src="{{$post->image2}}"></li>
                        <li class="slider-item03"><img src="{{$post->image3}}"></li>
                    </ul>
                    <!--<button class="btn-prev">▼</button>-->
                    <!--<button class="btn-next">▼</button>-->
                </div>
                @endif
                <a href="/posts/{{$post->id}}">
                    <p class="post_text post_height">{{$post->body}}</p>
                </a>
            </div>

            <div class="likes">
                @if($post->is_like_by_auth_user())
                <a href="{{ route('post.unlike', ['id' => $post->id]) }}" class="btn btn-success btn-sm">&hearts;<span class="badge">{{ $post->likes->count() }}</span></a>
                @else
                <a href="{{ route('post.like', ['id' => $post->id]) }}" class="btn btn-secondary btn-sm">&hearts;<span class="badge">{{ $post->likes->count() }}</span></a>
                @endif
            </div>

        </div>
        @endforeach
    </div>
    <div class="sidebar">
        <aside>
            <ul class="gmenu">
                <li class="menu"><a href="/posts/profile">マイページ</a></li>
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
<div class='paginate'>
    {{ $posts->links() }}
</div>

<script src="{{ mix('js/slider.js') }}" defer></script>

@endsection

</html>