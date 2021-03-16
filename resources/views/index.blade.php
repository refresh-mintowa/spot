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
       <a href="/create">投稿</a>
       <a href="/list">検索</a>
       <form action="/search" method="POST">
           @csrf
           <input type="text" name="search[title]">
           
            <div>
                  <P>カテゴリー</P>
                  <select name="search[category]">
                      <option value="food">食事</option>
                      <option value="tourism">観光</option>
                      <option value="stay">宿泊</option>
                  </select>
              </div>
            <!--<textarea name="search[body]"></textarea>-->
           <input type="submit" value="検索">
       </form>
    </body>
</html>
