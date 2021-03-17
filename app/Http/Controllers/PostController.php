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
        // dd($request->input('search.title'));
        
      
        
        if($request->has('search.category')){
          $category = $post->where('category','=',"{$request->search['category']}"); 
            if($request->has('search.title')){
                $keyword = $post->where('title','like',"%{$request->search['title']}%")
                      ->orWhere('body','like',"%{$request->search['title']}%");  
             }
        }
        
        $answer = $category->get();
        $answer = $keyword->get();
         
        // $search_result = $request->title.'の検索結果'.count($post).'件';
        
        return view('results')->with(['posts'=>$answer]);
        
        // return view('results')->with(['posts'=>$post]);
        
        // $title = Request::get('title');
        
        // if($title){
        // $item = Post::where('title', 'LIKE', "%$title%")->simplePaginate(2);
            
        // }else{
        //      $item = Post::select('*')->simplePaginate(2);
        //      $title='全件表示';
        // }
        
        // return view('results',['items' => $item])->with('title',$title);
        
        
        // $query = User::query();
        
        // $search_name = $request->input('title');
        //   $query = User::query()
        //     ->when($request->has('title'), function($query) use ($search_name) {
        //         $query->where('title', 'like', '%' . $search_name . '%');
        //     })
            
        //      return view('results');
        
        
        // $search_name = $request->input('title');
        // $query = User::query();
        
        // if(!empty($search_name)){
        //     $query->where('title','like','%'.$search_name.'%');
        // }
        
        // $books = $query->get();
        
        // return view('results',compact('books','search_name'));
        // if($request->has('title' && $search_name != '')){
        //     $query->where('title','like','%'.$search_name.'%')->get();
        // }
        // $data = $query->pagenate(10);
        
        // return view('results',['data'=>$data]);
    }
    // public function results(Post $post){
    //     return view('results',['data'=>$data]);
    // }
}

