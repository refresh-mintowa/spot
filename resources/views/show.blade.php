<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>穴場サーチ</title>
         <link href="{{ asset('/css/spot.css')}}" rel="stylesheet">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    </head>
    <body>
        <header>
            <div class="header-inner page-flex">
                <h1>穴場サーチャー</h1>
                <div>
                     <ul class="header-list">
                        <li><a href="/">検索</a></li>
                        <li><a href="/create">投稿</a></li>
                        <li><a href="/login">ログイン</a></li>
                        <li><a href="/register">新規登録</a></li>
                    </ul>
                </div>
            </div>
        </header>
        <div class="page-wrapper">
            <div class="show-post__wrapper">
                <h1>{{ $post->title }}</h1>
               <div>
                 
                   <img src="{{ Storage::url($post->image)}}" width="500px">
                   <p>{{ $post->category->category }}</p>
                   <p>{{ $post->pref_id }}</p>
                   <p>{{ $post->body }}</p>
               </div>
               <div class="page-flex">
                
                   @if(Auth::id() === $post->user->id)
                   <div class="button">
                        <a href="/{{$post->id}}/edit">編集する</a>
                   </div>
                   @endif
                   <div class="button">
                       <a href="javascript:history.back()">戻る</a>
                   </div>
               </div>
              
               
            </div>
        </div>
    </body>
</html>
