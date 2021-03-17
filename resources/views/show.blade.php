<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>穴場サーチ</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    </head>
    <body>
       <h1>spots</h1>
       <div>
           <h1>{{ $post->title }}</h1>
           <p>{{ $post->category }}</p>
           <p>{{ $post->pref_id }}</p>
           <p>{{ $post->body }}</p>
       </div>
       <a href="/{{$post->id}}/edit">編集する</a>
       <a href="/list">戻る</a>
    </body>
</html>
