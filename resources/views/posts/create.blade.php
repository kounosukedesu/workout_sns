<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Workout Diary</title>

    </head>
    @extends('layouts.app')
    @section('content')
        <div class="create frame">
           <form action="/posts" method="POST" enctype='multipart/form-data'>
            @csrf
            <div class="body">
                <h2>Body</h2>
                <textarea class="form frame" name="post[body]" placeholder="トレーニング内容を記録する" value="{{old('post[body]')}}"></textarea>
                <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
                <input type='hidden' value="{{Auth::id()}}" name="post[user_id]"/>
            </div>
            <div class="input">
                <input type='file' name='image1' />
                <input type='file' name='image2' />
                <input type='file' name='image3' />
            </div>
            <select name="workouts_array[]">
            @foreach($workouts as $workout)
                <option value="{{$workout->id }}">{{$workout->name }}</option>
            @endforeach
            </select>
                <input class="submit" type="submit" value="保存"/>
        </form>

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
        </div>
    @endsection
</html>
