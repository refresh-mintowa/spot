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
       <h1>{{$search_results}}</h1>
     
       <a href="/create">投稿</a>
       <a href="/">検索</a>
       @foreach($posts as $post)
       <div>
           <h1><a href="/{{$post->id}}">{{ $post->title }}</a></h1>
           <p>{{ $post->category }}</p>
            <p>{{ $post->pref_id }}</p>
           <p>{{ $post->body }}</p>
       </div>
       @endforeach
       <a href="/">戻る</a>
    </body>
</html>
