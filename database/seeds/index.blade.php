<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

    </head>
    @extends('layouts.app')　　　　　　　　　　　　　　　　　　
    @section('content')
        <div class="timeline">
            <div class="post">
                <div class="user_image_name">
                    <img src="" alt="userimage" title="userimage">
                    <h2>username</h2>
                </div>
                <div>
                    <img src="" alt="post_images">
                    <p class="post_text">投稿文章です。テスト投稿文章です。</p>
                </div>
                <div class="likes"></div>
            </div>
            
        </div>
        <div class="sidebar">
            <aside>
                <ul>
                    <li><a href="">マイページ</a></li>
                    <li><a href="">投稿する</a></li>
                    <li><a href="">部位選択</a></li>
                    <li><a href="">ランキング</a></li>
                </ul>
            </aside>
        </div>
    @endsection
</html>
