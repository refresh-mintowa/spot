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
        <div class="page-wrapper">
            <div class="show-post__wrapper">
                
                <div class="page-head">
                  <h1>{{ $post->title }}</h1>
                </div>
               <div>
                 
                   <img src="{{ Storage::url($post->image)}}" width="500px">
                   <p>{{ $post->category_id }}</p>
                   <p>{{ $post->pref_id }}</p>
                   <p>{{ $post->body }}</p>
               </div>
               <div class="page-flex">
                   <div class="button">
                        <a href="/{{$post->id}}/edit">編集する</a>
                   </div>
                   <div class="button">
                       <a href="/list">戻る</a>
                   </div>
               </div>
              
               
            </div>
        </div>
    </body>
</html>
