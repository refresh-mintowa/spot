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
            
            <!-- 地図を表示させる要素 -->
            <div class="map_box01" id="gmap"></div>
            
            <input type="hidden" value="{{$post->lat}}" id="lat">
            <input type="hidden" value="{{$post->lng}}" id="lng">
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


<!--<script type="text/javascript" src="{{ asset('/js/map-api.js')}}"></script>-->
<script src="https://maps.googleapis.com/maps/api/js?key={{ config('app.google_api') }}&callback=initMap" async defer></script>
<script>
　  var gmap;
　  function initMap(){
      var target = document.getElementById('gmap');
      var lat = document.getElementById('lat').value;
      var latNum = Number(lat);
      var lng = document.getElementById('lng').value;
      var lngNum = Number(lng);
      var center = {lat:latNum,lng:lngNum};
      console.log(center);
      var opts = {
        center: center,
        zoom:16
      };
      
      gmap = new google.maps.Map(target,opts);
      
        maker = new google.maps.Marker({
        position: center,
        map:gmap
      });
      
    }

</script>
@endsection