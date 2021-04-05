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
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/map.js":
/*!*****************************!*\
  !*** ./resources/js/map.js ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(function () {
  //地域を選択
  $('.area_btn').click(function () {
    $('.area_overlay').show();
    $('.pref_area').show();
    var area = $(this).data('area');
    $('[data-list]').hide();
    $('[data-list="' + area + '"]').show();
  }); //レイヤーをタップ

  $('.area_overlay').click(function () {
    prefReset();
  }); //都道府県をクリック

  $('.pref_list [data-id]').click(function () {
    if ($(this).data('id')) {
      var id = $(this).data('id'); //このidを使用して行いたい操作をしてください
      //都道府県IDに応じて別ページに飛ばしたい場合はこんな風に書く↓
      //window.location.href = 'https://kinocolog.com/pref/' + id;

      $.ajax({
        type: "get",
        //HTTP通信の種類
        url: '/pref/' + id,
        //通信したいURL
        dataType: 'json'
      }) //通信が成功したとき
      .done(function (res) {
        $(".pref_result").html('');
        console.log(res);
        $.each(res, function (index, value) {
          html = "<div class=\"result-item\">\n                                        <div></div>\n                                        <div class=\"result-content\">\n                                            <h1 class=\"result-title\"><a href=\"/".concat(id, "\">").concat(value.title, "</a></h1>\n                                            <p class=\"result-body\">").concat(value.body, "</p>\n                                        </div>\n                                    </div>");
          $(".pref_result").append(html);
        });
      }) //通信が失敗したとき
      .fail(function (error) {
        console.log(error.statusText);
      });
      prefReset();
    }
  }); //表示リセット

  function prefReset() {
    $('[data-list]').hide();
    $('.pref_area').hide();
    $('.area_overlay').hide();
  }
});

/***/ }),

/***/ 1:
/*!***********************************!*\
  !*** multi ./resources/js/map.js ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/ec2-user/environment/spot/resources/js/map.js */"./resources/js/map.js");


/***/ })

/******/ });