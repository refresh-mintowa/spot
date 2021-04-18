@extends('layouts.app')

@section('content')
        <div class="page-wrapper">
            <div class="page-head">
               <h1>編集</h1>
            </div>
               <div class="create-form">
                  <form action="/{{ $post->id }}" method="POST">
                      @csrf
                      @method('PUT')
                      <div class="post-item">
                          <dt>
                              <label class="contact-label contact-label-required" for="your-name">タイトル</label>
                        　</dt>
                        　<dd>
                        　     <input type="text" name="post[title]" value="{{$post->title }}">
                        　      <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
                        　</dd>
                         
                      </div>
                       <div class="post-item">
                          <dt>
                              <label class="contact-label contact-label-required" for="your-name">カテゴリー</label>
                          </dt>
                          <select name="post[category_id]">
                              <option value="1" @if($post->category_id == '1') selected @endif>食事</option>
                              <option value="2" @if($post->category_id == '2') selected @endif>観光</option>
                              <option value="3" @if($post->category_id == '3') selected @endif>宿泊</option>
                          </select>
                          <p class="title__error" style="color:red">{{ $errors->first('post.category_id') }}</p>
                      </div>
                      <div class="post-item">
                          <dt>
                              <label class="contact-label contact-label-required" for="your-name">都道府県</label>
                          </dt>
                          <div>
                              
                            <select name="post[pref_id]" value="{{ old('pref_id')?:$post->pref_id}}">
                                <option value="" selected>都道府県</option>
                                <option value="1" @if($post->category_id == '1') selected @endif>北海道</option>
                                <option value="2" @if($post->category_id == '2') selected @endif>青森県</option>
                                <option value="3" @if($post->category_id == '3') selected @endif>岩手県</option>
                                <option value="4" @if($post->category_id == '4') selected @endif>宮城県</option>
                                <option value="5" @if($post->category_id == '5') selected @endif>秋田県</option>
                                <option value="6" @if($post->category_id == '6') selected @endif>山形県</option>
                                <option value="7" @if($post->category_id == '7') selected @endif>福島県</option>
                                <option value="8" @if($post->category_id == '8') selected @endif>茨城県</option>
                                <option value="9" @if($post->category_id == '9') selected @endif>栃木県</option>
                                <option value="10" @if($post->category_id == '10') selected @endif>群馬県</option>
                                <option value="11" @if($post->category_id == '11') selected @endif>埼玉県</option>
                                <option value="12" @if($post->category_id == '12') selected @endif>千葉県</option>
                                <option value="13" @if($post->category_id == '13') selected @endif>東京都</option>
                                <option value="14" @if($post->category_id == '14') selected @endif>神奈川県</option>
                                <option value="15" @if($post->category_id == '15') selected @endif>新潟県</option>
                                <option value="16" @if($post->category_id == '16') selected @endif>富山県</option>
                                <option value="17" @if($post->category_id == '17') selected @endif>石川県</option>
                                <option value="18" @if($post->category_id == '18') selected @endif>福井県</option>
                                <option value="19" @if($post->category_id == '19') selected @endif>山梨県</option>
                                <option value="20" @if($post->category_id == '20') selected @endif>長野県</option>
                                <option value="21" @if($post->category_id == '21') selected @endif>岐阜県</option>
                                <option value="22" @if($post->category_id == '22') selected @endif>静岡県</option>
                                <option value="23" @if($post->category_id == '23') selected @endif>愛知県</option>
                                <option value="24" @if($post->category_id == '24') selected @endif>三重県</option>
                                <option value="25" @if($post->category_id == '25') selected @endif>滋賀県</option>
                                <option value="26" @if($post->category_id == '26') selected @endif>京都府</option>
                                <option value="27" @if($post->category_id == '27') selected @endif>大阪府</option>
                                <option value="28" @if($post->category_id == '28') selected @endif>兵庫県</option>
                                <option value="29" @if($post->category_id == '29') selected @endif>奈良県</option>
                                <option value="30" @if($post->category_id == '30') selected @endif>和歌山県</option>
                                <option value="31" @if($post->category_id == '31') selected @endif>鳥取県</option>
                                <option value="32" @if($post->category_id == '32') selected @endif>島根県</option>
                                <option value="33" @if($post->category_id == '33') selected @endif>岡山県</option>
                                <option value="34" @if($post->category_id == '34') selected @endif>広島県</option>
                                <option value="35" @if($post->category_id == '35') selected @endif>山口県</option>
                                <option value="36" @if($post->category_id == '36') selected @endif>徳島県</option>
                                <option value="37" @if($post->category_id == '37') selected @endif>香川県</option>
                                <option value="38" @if($post->category_id == '38') selected @endif>愛媛県</option>
                                <option value="39" @if($post->category_id == '39') selected @endif>高知県</option>
                                <option value="40" @if($post->category_id == '40') selected @endif>福岡県</option>
                                <option value="41" @if($post->category_id == '41') selected @endif>佐賀県</option>
                                <option value="42" @if($post->category_id == '42') selected @endif>長崎県</option>
                                <option value="43" @if($post->category_id == '43') selected @endif>熊本県</option>
                                <option value="44" @if($post->category_id == '44') selected @endif>大分県</option>
                                <option value="45" @if($post->category_id == '45') selected @endif>宮崎県</option>
                                <option value="46" @if($post->category_id == '46') selected @endif>鹿児島県</option>
                                <option value="47" @if($post->category_id == '47') selected @endif>沖縄県</option>
                            </select>
                            <p class="title__error" style="color:red">{{ $errors->first('post.pref_id') }}</p>
                          </div>
                       </div>

                      <div class="post-item">
                           <dt>
                              <label class="contact-label contact-label-required" for="your-name">画像</label>
                          </dt>
                          <input id="image" type="file" name="post[image]" value="{{ $post->image }}">
                      </div>
                       <div class="post-item">
                           <dt>
                               <label class="contact-label contact-label-required" for="your-name">内容</label>
                           </dt>
                           <dd>
                                <textarea type="textarea" name="post[body]">{{old('body')?:$post->body}}</textarea>
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
@endsection