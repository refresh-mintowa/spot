<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable =['title','body','category_id','pref_id','image','user_id'];
    
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
