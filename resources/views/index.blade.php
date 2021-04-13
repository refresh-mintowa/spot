<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>穴場サーチ</title>
          <script src="{{ asset('js/app.js') }}" defer></script>
         <link href="{{ asset('/css/app.css')}}" rel="stylesheet">
        <link href="{{ asset('/css/spot.css')}}" rel="stylesheet">
        <link href="{{ asset('/css/map.css')}}" rel="stylesheet">
    
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    </head>
    <body>
        <header>
            <!--<div class="header-inner page-flex">-->
            <!--    <h1>穴場サーチャー</h1>-->
            <!--    <div>-->
            <!--        <ul class="header-list">-->
            <!--            <li><a href="/">検索</a></li>-->
            <!--            <li><a href="/create">投稿</a></li>-->
            <!--            <li><a href="/login">ログイン</a></li>-->
            <!--            <li><a href="/register">新規登録</a></li>-->
            <!--        </ul>-->
            <!--    </div>-->
            <!--</div>-->
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', '穴場サーチ') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item">
                            <a class="nav-link" href="/">検索</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/create">投稿</a>
                        </li>
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        </header>
     <!--@yield('layouts.header')-->
        <div class="page-wrapper page-flex">
            <div class="home-left">
                
                <form class="search_form" action="/search" method="POST">
                   @csrf
                    
                        
                    <div class="page-flex form-item">
                          <P>カテゴリー</P>
                          <select name="search[category_id]">
                              <option value="1">食事</option>
                              <option value="2">観光</option>
                              <option value="3">宿泊</option>
                          </select>
                     </div>
                    <div class="page-flex form-item">
                        <p>都道府県</p>
                        <select name="search[pref_id]">
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
                    </div>
                    <!--<div class="page-flex form-item">-->
                    <!--      <P>順番</P>-->
                    <!--      <select name="search[order_id]">-->
                    <!--          <option value="1">最新順</option>-->
                    <!--          <option value="2">人気順</option>-->
                    <!--      </select>-->
                    <!-- </div>-->
                    
                    
                    <div class="page-flex form-item">
                       <p>フリーワード</p>
                    　 <input class="freeword" type="text" name="search[title]">
                   </div>
                      
                   <div class="center">
                       <input class="submit" type="submit" value="検索">
                   </div>
               </form>
               
               <div class="japan_map">
                    <img src="{{ asset('storage/map.png')}}" alt="日本地図">
                    <span class="area_btn area1" data-area="1">北海道・東北</span>
                    <span class="area_btn area2" data-area="2">関東</span>
                    <span class="area_btn area3" data-area="3">中部</span>
                    <span class="area_btn area4" data-area="4">近畿</span>
                    <span class="area_btn area5" data-area="5">中国・四国</span>
                    <span class="area_btn area6" data-area="6">九州・沖縄</span>
                    
                    <div class="area_overlay"></div>
                    <div class="pref_area">
                        <div class="pref_list" data-list="1">
                            <div data-id="1">北海道</div>
                            <div data-id="2">青森県</div>
                            <div data-id="3">岩手県</div>
                            <div data-id="4">宮城県</div>
                            <div data-id="5">秋田県</div>
                            <div data-id="6">山形県</div>
                            <div data-id="7">福島県</div>
                            <div></div>
                        </div>
                        
                        <div class="pref_list" data-list="2">
                            <div data-id="8">茨城県</div>
                            <div data-id="9">栃木県</div>
                            <div data-id="10">群馬県</div>
                            <div data-id="11">埼玉県</div>
                            <div data-id="12">千葉県</div>
                            <div data-id="13">東京都</div>
                            <div data-id="14">神奈川県</div>
                            <div></div>
                        </div>
                        
                        <div class="pref_list" data-list="3">
                            <div data-id="15">新潟県‎</div>
                            <div data-id="16">富山県‎</div>
                            <div data-id="17">石川県‎</div>
                            <div data-id="18">福井県‎</div>
                            <div data-id="19">山梨県‎</div>
                            <div data-id="20">長野県‎</div>
                            <div data-id="21">岐阜県</div>
                            <div data-id="22">静岡県</div>
                            <div data-id="23">愛知県‎</div>
                            <div></div>
                        </div>
                        
                        <div class="pref_list" data-list="4">
                            <div data-id="24">三重県</div>
                            <div data-id="25">滋賀県</div>
                            <div data-id="26">京都府</div>
                            <div data-id="27">大阪府</div>
                            <div data-id="28">兵庫県</div>
                            <div data-id="29">奈良県</div>
                            <div data-id="30">和歌山県</div>
                            <div></div>
                        </div>
                        
                        <div class="pref_list" data-list="5">
                            <div data-id="31">鳥取県</div>
                            <div data-id="32">島根県</div>
                            <div data-id="33">岡山県</div>
                            <div data-id="34">広島県</div>
                            <div data-id="35">山口県</div>
                            <div data-id="36">徳島県</div>
                            <div data-id="37">香川県</div>
                            <div data-id="38">愛媛県</div>
                            <div data-id="39">高知県</div>
                            <div></div>
                        </div>
                        
                        <div class="pref_list" data-list="6">
                            <div data-id="40">福岡県</div>
                            <div data-id="41">佐賀県</div>
                            <div data-id="42">長崎県</div>
                            <div data-id="43">熊本県</div>
                            <div data-id="44">大分県</div>
                            <div data-id="45">宮崎県</div>
                            <div data-id="46">鹿児島県</div>
                            <div data-id="47">沖縄県</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="home-right">
                <div class="pref_result"></div>
            </div>
           
        </div>
       
      <script type="text/javascript" src="{{ asset('/js/map.js')}}"></script>
    </body>
</html>


