<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable =['title','body','category_id','pref_id','image','user_id','lat','lng'];
    
    public function search($elements)
    {
        // 記事検索のためのクエリ
        $query = Post::query();
        
        // カテゴリー検索
        $category_id = $elements['category_id'];
        $query->where('category_id',$category_id);
        $category = Category::where('id',$category_id)->get();
         
        // 都道府県検索
        if(!empty($elements['pref_id']))
        {
            $pref_id = $elements['pref_id'];
            $query->where('pref_id',$pref_id);
            $pref = Pref::where('id',$pref_id)->get();
        }else{
            $pref = null;
        }
        
        // フリーワード検索
        if(!empty($elements['title']))
        {
            $word = $elements['title'];
            //半角スペースを全角スペースにする
            $request->words = mb_convert_kana($request->words, 's');
            //スペースごとに配列に格納
            $strArry = preg_split('/[\s]+/', $request->words);

            //use Illuminate\Support\Collectionで配列要素全てにワイルドカード（%）を追加
            //$pが配列の要素ひとつずつになる. その要素に処理をして,returnで元の要素と入れ替えるイメージ
            $search_words = Collection::make($strArry)->map(function($p)
            {
                return "%" . $p . "%";
            })->toArray();
            
            $query->where('title','like',"%{$word}%")
                ->orWhere('body','like',"%{$word}%");
        }else{
            $word = null;
        }
            
        $search_result = $query->get();
        
        // セッションに保存
        \Session::put([
            'search_results'=>$search_result,
            'category'=>$category,
            'pref'=>$pref,
            'word'=>$word
            ]);
        return [$search_result,$category,$pref,$word];
    }
    
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    
    public function pref()
    {
        return $this->belongsTo('App\Pref');
    }
    
    public function Likes()
    {
        return $this->hasMany('App\Like');
    }
    
    public function user(){
        return $this->belongsTo('App\User');
    }
    
    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }
}
