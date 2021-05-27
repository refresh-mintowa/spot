<?php

namespace App\Http\Controllers;

use App\Area;
use App\Post;
use App\Category;
use App\Pref;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index(Post $post,Area $area,Pref $pref)
    {
        $mapImg = \Storage::disk('s3')->url('map.png');
        return view('index')->with(['areas'=>$area->get(),'prefs'=>$pref->get(),'mapImg'=>$mapImg]);
    }
    
    public function show(Post $post)
    {
        return view('show')->with(['post'=>$post]);
    }
    
    public function create(Post $post)
    {
        return view('create');
    }
    
    public function save(PostRequest $request,Post $post)
    {
        $input = $request['post'];
 
        if(!empty($request->file('post.image')))
        {
            $filename = request()->file('post.image')->getClientOriginalName();
            $disk = Storage::disk('s3');
            $upload_info = $disk->putFileAs('/spot-img',$request->file('post.image'),$filename,'public');
            $path = Storage::disk('s3')->url($upload_info);
            $input['image'] = $path;
        }
        
        $input['user_id'] = auth()->user()->id;
        $post->fill($input)->save();
        return redirect('/'.$post->id) ;
    }
    
    public function edit(Post $post)
    {
        return view('edit')->with(['post'=>$post]);
    }
    
    public function update(Request $request,Post $post)
    {
        $input_update = $request['post'];
        $post->fill($input_update)->save();
        return redirect('/'.$post->id);
    }
    
    public function search(Request $request,Post $post)
    {
        // フォームから検索条件引き出し
        $search_elements = $request->input('search');
        
        $users = DB::table('posts')->getPaginateByLimit(5);
        
        $paginate = $users->get();
        
        // postクラスにて定義したsearchメソッド
        [$search_result,$category,$pref,$word] = $post->search($search_elements);
        
        return view('results')->with(['search_results'=>$search_result,'category'=>$category,'pref'=>$pref,'word'=>$word,'users'=>$users]);
    }
    
    public function pref(Post $post,$id)
    {
        $pref = Post::where('pref_id','=',$id)->get();
        
        return response()->json($pref);
    }
}

