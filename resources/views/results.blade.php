<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>穴場サーチ</title>
               <link href="{{ asset('/css/app.css')}}" rel="stylesheet">
       <link href="{{ asset('/css/spot.css')}}" rel="stylesheet">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    </head>
    <body>
       <h1>{{$category}},{{$pref}},{{$word}}の検索結果{{$search_result_count}}件</h1>
     
       <a href="/create">投稿</a>
       <a href="/">検索</a>
       @foreach($search_results as $search_result)
           <div>
               <h1><a href="/{{$search_result->id}}">{{ $search_result->title }}</a></h1>
               <p>{{ $search_result->category->category }}</p>
                <p>{{ $pref }}</p>
               <p>{{ $search_result->body }}</p>
           </div>
           <div class="row justify-content-center">
               @if($search_result->users()->where('user_id', Auth::id())->exists())
                <div class="col-md-3">
                     <form action="{{ route('unfavorites', $search_result) }}" method="POST">
                        @csrf
                        <input type="submit" value="&#xf164;いいね取り消す" class="fas btn btn-danger">
                    </form>
                </div>
                @else
                <div class="col-md-3">
                    <form action="{{ route('favorites', $search_result) }}" method="POST">
                        @csrf
                        <input type="submit" value="&#xf164;いいね" class="fas btn btn-success">
                    </form>
                </div>
                @endif
            </div>
            <div class="row justify-content-center">
                <p>いいね数：{{ $search_result->users()->count() }}</p>
            </div>
       @endforeach
       <a href="/">戻る</a>
    </body>
</html>
