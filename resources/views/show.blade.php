@extends('layouts.app')

@section('content')
        <div class="page-wrapper">
            <div class="show-post__wrapper">
                <h1>{{ $post->title }}</h1>
               <div>
                   @if(!empty($post->image)) 
                   <img src="{{ $post->image}}" width="500px">
                   @endif
                   <p>{{ $post->category->category }}</p>
                   <p>{{ $post->pref->name }}</p>
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
@endsection