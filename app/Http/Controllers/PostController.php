<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Post $post){
        return view('index');
    }
    public function list(Post $post){
        return view('list')->with(['posts'=>$post->get()]);
    }
    public function show(Post $post){
        return view('show')->with(['post'=>$post]);
    }
    public function create(Post $post){
        return view('create');
    }
    public function save(Request $request,Post $post){
       $input = $request['post'];
            // $this->validata($request,[
            //     'file' => [
            //                 'file',
            //                 'image',
            //                 'mimes:jpeg,png',
            //                 ]
            //     ]);
    
            if($request->file('post.image')->isValid([])){
                
                $filename = request()->file('post.image')->getClientOriginalName();
                $input['image'] = request('post.image')->storeAs('public',$filename);
              
            }
        
        
        $post->fill($input)->save();
        return redirect('/'.$post->id) ;
    }
    public function edit(Post $post){
        return view('edit')->with(['post'=>$post]);
    }
    public function update(Request $request,Post $post){
        $input_update = $request['post'];
        $post->fill($input_update)->save();
        return redirect('/'.$post->id);
    }
    public function search(Request $request,Post $post){
   
        $category_name = array('','食事','観光','宿泊');
        $category_id = $request->input('search.category_id');
        $category = $category_name[$category_id];
        
        $pref_name = array(
            '',
            '北海道',
            '青森県',
            '岩手県',
            '宮城県',
            '秋田県',
            '山形県',
            '福島県',
            '茨城県',
            '栃木県',
            '群馬県',
            '埼玉県',
            '千葉県',
            '東京都',
            '神奈川県',
            '新潟県',
            '富山県',
            '石川県',
            '福井県',
            '山梨県',
            '長野県',
            '岐阜県',
            '静岡県',
            '愛知県',
            '三重県',
            '滋賀県',
            '京都府',
            '大阪府',
            '兵庫県',
            '奈良県',
            '和歌山県',
            '鳥取県',
            '島根県',
            '岡山県',
            '広島県',
            '山口県',
            '徳島県',
            '香川県',
            '愛媛県',
            '高知県',
            '福岡県',
            '佐賀県',
            '長崎県',
            '熊本県',
            '大分県',
            '宮崎県',
            '鹿児島県',
            '沖縄県'
            );
        $pref_id = $request->input('search.pref_id');
        if(!empty($pref_id)){
        $pref = $pref_name[$pref_id];
            
        }else{
            $pref = '';
        }
        
        
        $word = $request->input('search.title');
         
       
          if(!empty($category)){
            $search_result = Post::where('category_id','=',"{$request->search['category_id']}")->with('category')->get();
              
               if(!empty($pref_id)){
                    $search_result = $post->where('category_id','=',"{$request->search['category_id']}")
                    ->where('pref_id','=',"{$request->search['pref_id']}")->get();
                          
                     if(!empty($word)){
                        $search_result = $post->where('category_id','=',"{$request->search['category_id']}")
                        ->where('pref_id','=',"{$request->search['pref_id']}")
                            ->where('title','like',"%{$request->search['title']}%")
                            ->orWhere('body','like',"%{$request->search['title']}%")->get();
                       }
                   }
            }
            
        $search_result_count = count($search_result);
        
        return view('results')->with(['search_results'=>$search_result,'search_result_count'=>$search_result_count,'category'=>$category,'pref'=>$pref,'word'=>$word,'post'=>$post]);
        
  
    }
    // public function results(Post $post){
    //     return view('results',['data'=>$data]);
    // }
    // dd(auth()->user()->name);
}

