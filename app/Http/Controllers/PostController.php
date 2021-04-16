<?php

namespace App\Http\Controllers;

use App\Area;
use App\Post;
use App\Category;
use App\Pref;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function index(Post $post,Area $area,Pref $pref){
        return view('index')->with(['areas'=>$area->get(),'prefs'=>$pref->get()]);
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
    public function save(PostRequest $request,Post $post){
       $input = $request['post'];
 
            if(!empty($request->file('post.image'))){
                
                $filename = request()->file('post.image')->getClientOriginalName();
                $input['image'] = request('post.image')->storeAs('public',$filename);
              
            }
        
        $input['user_id'] = auth()->user()->id;
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

        $word = $request->input('search.title');
        $category = Category::where('id',$request->input('search.category_id'))->get();
        $pref = Pref::where('id',$request->input('search.pref_id'))->get();
        $query = Post::query();
          if(!empty($category)){
            $query->where('category_id','=',"{$request->search['category_id']}");
            }
            
            
          if(!empty($request['pref_id'])){
            $query->where('pref_id','=',"{$request->search['pref_id']}");
            }
            
          if(!empty($word)){
            $query->where('title','like',"%{$request->search['title']}%")
                ->orWhere('body','like',"%{$request->search['title']}%");
            }
            
        $search_result = $query->get();
        $search_result_count = count($search_result);
        \Session::put(['search_results'=>$search_result,'search_result_count'=>$search_result_count,'category'=>$category,'pref'=>$pref,'word'=>$word,'post'=>$post]);
            
        
         return view('results')->with(['search_results'=>$search_result,'search_result_count'=>$search_result_count,'category'=>$category,'pref'=>$pref,'word'=>$request['title'],'post'=>$post]);
        
  
    }
    
    public function pref(Post $post,$id){
        $pref = Post::where('pref_id','=',$id)->get();
        
        return response()->json($pref);
    }
    // public function results(Post $post){
    //     return view('results',['data'=>$data]);
    // }
    // dd(auth()->user()->name);
}

