<?php

namespace App\Http\Controllers\blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Cache;

class BlogController extends Controller
{
    function index(){
        $posts = Post::paginate(2);
        return view('blog.index',compact('posts'));
    }

    function show(Post $post){
        // if(Cache::has('post_show_'.$post->id)){
        //     return Cache::get('post_show_'.$post->id);
        // }else{
        //     echo 'no cache';
        //     $cacheView = view('blog.show',['post' => $post])->render();
        //     //dd($cacheView);
        //     Cache::put('post_show_'.$post->id, $cacheView);
        //     return $cacheView;
        // }

        return Cache::rememberForever('post_show_'.$post->id, function () use ($post){

            return view('blog.show',['post'=>$post])->render();
        });
    }
}
