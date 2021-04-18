@extends('layouts.app')

@section('content')
        <div class="page-wrapper">
            <div class="page-head">

               <h1>
                   {{$category[0]->category}}
                    
                    @if(!empty($word))
                    ,{{$word}}
                    @endif
                    
                    の検索結果{{$search_result_count}}件
                </h1>
             
            </div>
        
       @foreach($search_results as $search_result)
           <div class="result-item">
               @if(!empty($search_result->image))
                <div class="result-img">
                    <img src="{{ $search_result->image}}" width="250px" height="250px">
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
@endsection
