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

<!-- 地図を表示させる要素 -->
<div class="map_box01" id="gmap" style="width: 500px;height: 350px;"></div>

<script type="text/javascript" src="{{ asset('/js/map-api.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAgAVWp_oSYmgMOAvEuC54V2jXxumGoVr8&callback=initMap" async defer></script>
<script>
    var gmap;
function initMap(){
  var target = document.getElementById('gmap');
  var center = {lat:35.6585769,lng:139.7454506};
  var opts = {
    center: center,
    zoom:14
  };
  
  gmap = new google.maps.Map(target,opts);
  
    maker = new google.maps.Marker({
    position: center,
    map:gmap
  });
  
  
 
   document.getElementById('map_button').onclick=function(){
          var addressInput = document.getElementById('addressInput').value;
          console.log('aaa');
          var geocoder = new google.maps.Geocoder();
          geocoder.geocode({address:addressInput},function(results,status){
            if(status == google.maps.GeocoderStatus.OK){
                center = results[0].geometry.location;
                gmap = new google.maps.Map(target,{
                    center:center,
                    zoom:14
                });
                console.log(center);
                marker = new google.maps.Marker({
                position:center,
                map:gmap
                });
            }else{
                alert('失敗しました。'+ status);
                return;
            }
          });
      };
  
}

</script>
@endsection