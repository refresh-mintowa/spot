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
                            @foreach($prefs as $pref)
                      
                            <option value="{{ $pref->id }}">{{ $pref->name }}</option>
                            @endforeach
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
                    @foreach($areas as $area)
                    <span class="area_btn area{{$area->id}}" data-area="{{$area->id}}">{{$area->name}}</span>
                    @endforeach
                    
                    <div class="area_overlay"></div>
                  
                    <div class="pref_area">
                        @foreach($areas as $area)
                        
                        <div class="pref_list" data-list="{{$area->id}}">
                            @foreach($area->prefs as $pref)
                            <div data-id="{{$pref->id}}">{{$pref->name}}</div>
                            @endforeach
                            
                        </div>
                        @endforeach
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


