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
}
