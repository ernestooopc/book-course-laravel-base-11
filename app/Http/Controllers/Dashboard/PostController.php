<?php

namespace App\Http\Controllers\Dashboard;
use Illuminate\Support\Facades\Cache;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\PutRequest;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //session()->forget('key');
        // session(['key'=>'value']);
        // session(['key2'=>'value2']);


        $posts = Post::paginate(2);
        return view('dashboard.post.index', compact('posts'));

        return "index";

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::pluck('id','title');
        $post = new Post();

        return view('dashboard.post.create', compact('categories','post'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {

        Post::create($request->validated());
        return to_route('post.index')->with('status','Post created');

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
        return view('dashboard/post/show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
        $categories = Category::pluck('id','title');

        return view('dashboard.post.edit', compact('categories','post'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PutRequest $request, Post $post)
    {
        //
        $data = $request->validated();

        //image
        if(isset($data['image'])){
            $data['image'] = $filename = time().'.'.$data['image']->extension();

            $request->image->move(public_path('uploads/posts'),$filename)->with('status','Post updated');

        }

        //

        Cache::forget('post_show_'.$post->id);
        $post->update($data);
        return to_route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
        $post->delete();
        return to_route('post.index')->with('status','Post delete');

    }
}
