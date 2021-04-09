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
            <div class="page-head">

               <h1>{{$category[0]->category}},{{$word}}の検索結果{{$search_result_count}}件</h1>
              <!--<div class="page-flex">-->
              <!--     <div class="button">-->
              <!--         <a href="/create">投稿</a>-->
              <!--     </div>-->
              <!--     <div class="button">-->
              <!--         <a href="/">検索</a>-->
              <!--     </div>-->
              <!-- </div>-->
            </div>
        
       @foreach($search_results as $search_result)
           <div class="result-item">
               @if(!empty($search_result->image))
                <div class="result-img">
                    <img src="{{ Storage::url($search_result->image)}}" width="250px" height="250px">
               </div>
               @endif
               <div class="result-content">
                   <h1 class="result-title"><a href="/{{$search_result->id}}">{{ $search_result->title }}</a></h1>
                   <p class="result-category">カテゴリー：{{ $search_result->category->category }}</p>
                    <p class="result-pref">都道府県：{{ $search_result->pref->name }}</p>
                   <p class="result-body">{{ $search_result->body }}</p>
                   <div class="rowr">
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
                    <div class="row like-count">
                        <p>いいね数：{{ $search_result->users()->count() }}</p>
                    </div>
               </div>
           </div>
       @endforeach
       <div class="button">
           <a href="/">戻る</a>
       </div>
       </div>
    </body>
</html>
