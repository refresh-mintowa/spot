<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>穴場サーチ</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    </head>
    <body>
       <h1>spots</h1>
       <div>
          <form action="/{{ $post->id }}" method="POST">
              @csrf
              @method('PUT')
              <div>
                  <P>タイトル</P>
                  <input type="text" name="post[title]" value="{{ $post->title }}">
              </div>
               <div>
                  <P>内容</P>
                  <textarea name="post[body]" value="{{ $post->body }}"></textarea>
              </div>
             <input type="submit" value="送信">
          </form>
         
       </div>
       <a href="/list">戻る</a>
    </body>
</html>
