<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>穴場サーチ</title>
        <link href="{{ asset('/css/app.css')}}" rel="stylesheet">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="page-wrapper">
            <div class="page-head">
                
               <h1 class="results-title">食事の検索結果４件</h1>
               <div class="page-flex">
                   <div class="btn">
                       <a href="/create">投稿</a>
                   </div>
                   <div class="btn">
                       <a href="/">検索条件を変更する</a>
                   </div>
               </div>
            </div>
           @foreach($posts as $post)
           <div class="result-item">
               <div class="result-img">
                    <img src="{{ Storage::url($post->image)}}" width="250px">
               </div>
               <div class="result-content">
                   
                   <h1 class="result-title"><a href="/{{$post->id}}">{{ $post->title }}</a></h1>
                   <div class="page-flex">
                       <p class="result-category">{{ $post->category_id }}</p>
                        <p class="result-pref">{{ $post->pref_id }}</p>
                   </div>
                    
                   <p>{{ $post->body }}</p>
               </div>
           </div>
            <div class="row justify-content-center">
               @if($post->users()->where('user_id', Auth::id())->exists())
                <div class="col-md-3">
                     <form action="{{ route('unfavorites', $post) }}" method="POST">
                        @csrf
                        <input type="submit" value="&#xf164;いいね取り消す" class="fas btn btn-danger">
                    </form>
                </div>
                @else
                <div class="col-md-3">
                    <form action="{{ route('favorites', $post) }}" method="POST">
                        @csrf
                        <input type="submit" value="&#xf164;いいね" class="fas btn btn-success">
                    </form>
                </div>
                @endif
            </div>
            <div class="row justify-content-center">
                <p>いいね数：{{ $post->users()->count() }}</p>
            </div>
           @endforeach
           <div class="btn">
               <a href="/">戻る</a>
           </div>
        </div>
    </body>
</html>
