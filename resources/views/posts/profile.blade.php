<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Workout Diary</title>

    </head>
   
    @extends('layouts.app')　　　　　　　　　　　　　　　　　　
    @section('content')
    
        <div class="username">
            <h1>{{Auth::user()->name}}</h1>
            <a href="/posts/create">投稿する</a>
        </div>
        <!--カレンダー-->
       <div id='calendar'></div>
       
       @foreach($posts as $post)
        <div class="timeline">
                <div class="post">
                    <a href="/posts/{{$post->id}}">
                        <div class="user_image_name">
                            <img src="" alt="userimage" title="userimage">
                           
                            <h2>{{$post->user->name}}</h2>
                            <p>{{$post->created_at}}</p>
                        </div>
                    </a>        
            
                    <div class="post_images_text">
                        
                        <ul class="slider">
                            <li class="slider-item slider-item01"><img src="{{$post->image1}}"></li>
                            <li class="slider-item slider-item02"><img src="{{$post->image2}}"></li>
                            <li class="slider-item slider-item03"><img src="{{$post->image3}}"></li>
                        </ul>
                       
                        <a href="/posts/{{$post->id}}"><p class="post_text">{{$post->body}}</p></a>
                    </div>
                    
                    
                    
                    
                    <div>
                        @foreach($post->workouts as $workout)
                        <a href="/categories/{{$workout->id}}">{{$workout->name}}</a>
                        @endforeach
                    <div class="likes">
                         @if($post->is_like_by_auth_user())
                        <a href="{{ route('post.unlike', ['id' => $post->id]) }}" class="btn btn-success btn-sm">&hearts;<span class="badge">{{ $post->likes()->count() }}</span></a>
                        @else
                        <a href="{{ route('post.like', ['id' => $post->id]) }}" class="btn btn-secondary btn-sm">&hearts;<span class="badge">{{ $post->likes()->count() }}</span></a>
                        @endif
                    </div>
                </div>
        </div>
       @endforeach
       
        <div class=
        <div class="sidebar">
            <aside>
                <ul class="gmenu">
                    <li><a href="/posts/profile">マイページ</a></li>
                    <li><a href="/posts/create">投稿する</a></li>
                    <li>
                        <a href="">部位選択</a>
                        <ul>
                            @foreach($workouts as $workout)
                            <li><a href="/categories/{{$workout->id}}">{{$workout->name}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <!--<li><a href="">ランキング</a></li>-->
                </ul>
            </aside>
        </div>
    @endsection
        
</html>
