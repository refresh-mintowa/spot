/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/map-api.js":
/*!*********************************!*\
  !*** ./resources/js/map-api.js ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

var getMap = function () {
  function codeAddress(address) {
    // google.maps.Geocoder()コンストラクタのインスタンスを生成
    var geocoder = new google.maps.Geocoder(); // 地図表示に関するオプション

    var mapOptions = {
      zoom: 16,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }; // 地図を表示させるインスタンスを生成

    var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions); //マーカー変数用意

    var marker; // geocoder.geocode()メソッドを実行 

    geocoder.geocode({
      'address': address
    }, function (results, status) {
      // ジオコーディングが成功した場合
      if (status == google.maps.GeocoderStatus.OK) {
        // 変換した緯度・経度情報を地図の中心に表示
        map.setCenter(results[0].geometry.location); //☆表示している地図上の緯度経度

        document.getElementById('lat').value = results[0].geometry.location.lat();
        document.getElementById('lng').value = results[0].geometry.location.lng(); // マーカー設定

        marker = new google.maps.Marker({
          map: map,
          position: results[0].geometry.location
        }); // ジオコーディングが成功しなかった場合
      } else {
        console.log('Geocode was not successful for the following reason: ' + status);
      }
    }); // マップをクリックで位置変更

    map.addListener('click', function (e) {
      getClickLatLng(e.latLng, map);
    });

    function getClickLatLng(lat_lng, map) {
      //☆表示している地図上の緯度経度
      document.getElementById('lat').value = lat_lng.lat();
      document.getElementById('lng').value = lat_lng.lng(); // マーカーを設置

      marker.setMap(null);
      marker = new google.maps.Marker({
        position: lat_lng,
        map: map
      }); // 座標の中心をずらす

      map.panTo(lat_lng);
    }
  } //inputのvalueで検索して地図を表示


  return {
    getAddress: function getAddress() {
      // ボタンに指定したid要素を取得
      var button = document.getElementById("map_button"); // ボタンが押された時の処理

      button.onclick = function () {
        // フォームに入力された住所情報を取得
        var address = document.getElementById("address").value; // 取得した住所を引数に指定してcodeAddress()関数を実行

        codeAddress(address);
      }; //読み込まれたときに地図を表示


      window.onload = function () {
        // フォームに入力された住所情報を取得
        var address = document.getElementById("address").value; // 取得した住所を引数に指定してcodeAddress()関数を実行

        codeAddress(address);
      };
    }
  };
}();

getMap.getAddress();

/***/ }),

/***/ 2:
/*!***************************************!*\
  !*** multi ./resources/js/map-api.js ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/ec2-user/environment/spot/resources/js/map-api.js */"./resources/js/map-api.js");


/***/ })

/******/ });