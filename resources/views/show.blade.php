@extends('layouts.app')

@section('content')
<div class="page-wrapper">
    <div class="show-post__wrapper">
        <h1>{{ $post->title }}</h1>
        <div>
            @if(!empty($post->image)) 
                <img src="{{ $post->image}}" width="500px">
            @endif
            <p>カテゴリー：{{ $post->category->category }}</p>
            <p>都道府県：{{ $post->pref->name }}</p>
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
<p>住所や駅名、目印などで検索できます。</p>
<form onsubmit="return false;">
  <input type="text" value="株式会社Maromaro" id="address">
  <button type="button" value="検索" id="map_button">検索</button>
</form>
<!-- 地図を表示させる要素 -->
<div class="map_box01"><div id="map-canvas" style="width: 500px;height: 350px;"></div></div>
 
<p>マーカーのある位置の<br>
緯度 <input type="text" id="lat" value=""><br>
経度 <input type="text" id="lng" value=""><br>
地図上をクリックするとマーカーを移動できます。</p>

<script type="text/javascript" src="{{ asset('/js/map-api.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAgAVWp_oSYmgMOAvEuC54V2jXxumGoVr8&callback=initMap" async defer></script>
@endsection