@extends('layouts.app')

@section('content')
        <div class="page-wrapper">
            <div class="page-head">
               <h1>投稿</h1>
            </div>
            <div class="create-form">
                <form action="/save" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="post-item">
                        <dt>
                            <label class="contact-label contact-label-required" for="your-name">タイトル</label>
                        </dt>
                        <dd>
                            <input type="text" name="post[title]">
                            <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
                        </dd>
                    </div>
                    <div class="post-item">
                        <dt>
                            <label class="contact-label contact-label-required" for="your-name">カテゴリー</label>
                        </dt>
                        <select name="post[category_id]">
                            <option value="1">食事</option>
                            <option value="2">宿泊</option>
                            <option value="3">観光</option>
                        </select>
                        <p class="title__error" style="color:red">{{ $errors->first('post.category_id') }}</p>
                    </div>
                    <div class="post-item">
                        <dt>
                            <label class="contact-label contact-label-required" for="your-name">都道府県</label>
                        </dt>
                        <div>
                            <select name="post[pref_id]">
                                <option value="" selected>都道府県</option>
                                <option value="1">北海道</option>
                                <option value="2">青森県</option>
                                <option value="3">岩手県</option>
                                <option value="4">宮城県</option>
                                <option value="5">秋田県</option>
                                <option value="6">山形県</option>
                                <option value="7">福島県</option>
                                <option value="8">茨城県</option>
                                <option value="9">栃木県</option>
                                <option value="10">群馬県</option>
                                <option value="11">埼玉県</option>
                                <option value="12">千葉県</option>
                                <option value="13">東京都</option>
                                <option value="14">神奈川県</option>
                                <option value="15">新潟県</option>
                                <option value="16">富山県</option>
                                <option value="17">石川県</option>
                                <option value="18">福井県</option>
                                <option value="19">山梨県</option>
                                <option value="20">長野県</option>
                                <option value="21">岐阜県</option>
                                <option value="22">静岡県</option>
                                <option value="23">愛知県</option>
                                <option value="24">三重県</option>
                                <option value="25">滋賀県</option>
                                <option value="26">京都府</option>
                                <option value="27">大阪府</option>
                                <option value="28">兵庫県</option>
                                <option value="29">奈良県</option>
                                <option value="30">和歌山県</option>
                                <option value="31">鳥取県</option>
                                <option value="32">島根県</option>
                                <option value="33">岡山県</option>
                                <option value="34">広島県</option>
                                <option value="35">山口県</option>
                                <option value="36">徳島県</option>
                                <option value="37">香川県</option>
                                <option value="38">愛媛県</option>
                                <option value="39">高知県</option>
                                <option value="40">福岡県</option>
                                <option value="41">佐賀県</option>
                                <option value="42">長崎県</option>
                                <option value="43">熊本県</option>
                                <option value="44">大分県</option>
                                <option value="45">宮崎県</option>
                                <option value="46">鹿児島県</option>
                                <option value="47">沖縄県</option>
                            </select>
                            <p class="title__error" style="color:red">{{ $errors->first('post.pref_id') }}</p>
                        </div>
                    </div>
                    <div class="post-item">
                        <dt>
                            <label class="contact-label" for="your-name">画像</label>
                        </dt>
                        <input id="image" type="file" name="post[image]">
                    </div>
                    <div class="post-item">
                        <dt>
                            <label class="contact-label" for="your-name">場所</label>
                        </dt>
                        <dd>
                            <div class="page-flex">
                                <input type="text" id="addressInput" value="" placeholder="東京タワー" style="width:250px;">
                                <button type="button" value="検索" id="map_button" style="width:70px;">検索</button>
                            </div>
                            <!-- 地図を表示させる要素 -->
                            <div class="map_box01" id="gmap"></div>
                            <input type="hidden" id="lat" name="post[lat]">
                            <input type="hidden" id="lng" name="post[lng]">
                        </dd>
                    </div>
                    <div class="post-item">
                        <dt>
                            <label class="contact-label contact-label-required" for="your-name">内容</label>
                        </dt>
                        <dd>
                            <textarea name="post[body]"></textarea>
                            <p class="title__error" style="color:red">{{ $errors->first('post.body') }}</p>
                        </dd>
                    </div>
                    <div class="center">
                        <input type="submit" class="submit" value="送信">
                    </div>
                </form>
            </div>
            <div class="button">
                <a href="/">戻る</a>
            </div>
        </div>
        
<script type="text/javascript" src="{{ asset('/js/map-api.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key={{ config('app.google_api') }}&callback=initMap" async defer></script>
<!---->

<script>
    var gmap;
function initMap(){
  var target = document.getElementById('gmap');
  var center = {lat:35.6585769,lng:139.7454506};
  var opts = {
    center: center,
    zoom:16
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
                var center = results[0].geometry.location;
                gmap = new google.maps.Map(target,{
                    center:center,
                    zoom:14
                });
                console.log(center.lat());
                document.getElementById('lat').value = center.lat(); 
                document.getElementById('lng').value = center.lng(); 
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
