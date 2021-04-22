# 穴場サーチ

<img width="1429" alt="home" src="https://user-images.githubusercontent.com/72063915/115534082-5fdbbc00-a2d2-11eb-832e-0fd62546cb7c.png">

## 概要
日本全国の穴場スポットを検索できる掲示板<br><br>
機能は大きく二つ<br>
投稿と検索<br>
【投稿】<br>
地元の穴場だなと思う場所を投稿し、共有していく。<br>
【検索】<br>
検索方法は２種類ある。<br>
1.日本地図の都道府県から選択する方法⇨右側のサイドバーに表示<br>
2.カテゴリー、都道府県、キーワードを入れるより細かい検索方法⇨検索結果一覧ページに遷移<br>

## 使用言語
HTML/CSS/JavaScript/PHP(7.3.27)

## フレームワーク
SCSS/JQuery/Laravel(6.0)

## OS
Linux(CentOS)

## データベース
MariaDB<br>
S3 画像保存に使用

## LOGIN情報
ユーザー名　test<br>
パスワード　testtest

## 機能

- いいね機能<br>
- ログイン機能<br>
- 検索機能<br>
- 投稿機能<br>
- 編集機能<br>
- 削除機能

## 今後追加予定の機能

- 人気順
- いいねリスト
- APIの実装


## 工夫した点
- 複数の項目を同時に検索できるようにしたこと<br>
一つ一つの項目での検索なら比較的簡単にできたが複数項目での検索には入れ子形式で実装すべきなのか、それとも場合分けを全通りしていかなければいけないのかなど色々考えさせられた。<br>

- 検索時の情報を保存するためにセッションを使ったこと<br>
検索結果を一覧で表示したものにいいねを押すとURLが変わるため変わった時に検索時の情報を持たせてあげるためにはどのようにすればいいか考え調べた。<br>
するとセッションを利用したやり方の記事が多かったためセッションを使ってみることにした。<br>

- 検索結果をシングルページで表示するためにajaxを使用したこと<br>
シングルページで値を返すための方法を調べjson形式で返すなどJavaScriptの知識もつける必要があったため時間がかかった。<br>

## 苦労したこと<br>
- 中間テーブルを使用し、いいね機能を実装したこと<br>
リレーションを理解することが最も大変でした。その中でも多対多の理解には中間テーブルについての学習も必要で時間がかかった。<br>

- Herokuでのデプロイ時の画像の表示<br>
シンボリックリンクで画像を表示できるようにしていたが、herokuはシンボリックリンクに対応していないとのことでS3を使って実装するようにしたこと。
 
## テーブル設計
![テーブル設計](https://user-images.githubusercontent.com/72063915/115521693-5ba9a180-a2c6-11eb-922f-e4f82f3658a3.png)
## URL
 https://immense-spire-64115.herokuapp.com/
 
 ## 検索結果画面
<img width="1430" alt="search" src="https://user-images.githubusercontent.com/72063915/115534100-636f4300-a2d2-11eb-84b5-1520375de665.png">

## 投稿画面
<img width="1418" alt="create" src="https://user-images.githubusercontent.com/72063915/115534070-5d796200-a2d2-11eb-96cc-ca856b87fec3.png">

## 記事詳細画面
<img width="1436" alt="post" src="https://user-images.githubusercontent.com/72063915/115534090-610ce900-a2d2-11eb-9def-8187aadb13be.png">


## 全体の動き
https://user-images.githubusercontent.com/72063915/115532857-2787ae00-a2d1-11eb-9491-e907fa5fac16.mov

