var gmap;
function initMap(){
  var target = document.getElementById('gmap');
  // 緯度の値を取得
  var lat = document.getElementById('lat').value;
  // 文字列から数値化する
  var latNum = Number(lat);
  // 経度の値を取得
  var lng = document.getElementById('lng').value;
  // 文字列から数値化する
  var lngNum = Number(lng);
  
  var center = {lat:latNum,lng:lngNum};
  console.log(center);
  var opts = {
    center: center,
    zoom:14
  };
  
  // マップの表示
  gmap = new google.maps.Map(target,opts);
  // ピンを立てる
  maker = new google.maps.Marker({
    position: center,
    map:gmap
  });
  
}