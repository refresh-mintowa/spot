@extends('layouts.app')

@section('content')
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
                    <img src="{{ $mapImg }}" alt="日本地図">
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
                
                <div class="pref_result">
                    <h2>県の検索結果をここに表示</h2>
                    <div class="pref_result_space"></div>
                </div>
            </div>
           
        </div>
       
      <script type="text/javascript" src="{{ asset('/js/map.js')}}"></script>
@endsection