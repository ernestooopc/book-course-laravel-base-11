<?php

namespace App\Http\Controllers\Api;
use Storage;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\Post\StoreRequest;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    public function all()
    {
        return response()->json(Cache::remember('posts_index', now()->addMinutes(10), function () {
            return Post::all();


        }));
    }


    public function index(){
        return response()->json(Post::with('category')->paginate(2));

    }


    public function store(StoreRequest $request)
{
    return response()->json(Post::create($request->validated()));
}


    public function show(Post $post)
    {
        return response()->json($post);

    }

    public function slug(string $slug){
        $post = Post::where('slug', $slug)->firstOrFail();
        return response()->json($post);
    }


    public function update(Request $request, Post $post)
{
    $data = $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'posted' => 'required|string',
        'description' => 'nullable|string',
        'slug' => 'required|string|unique:posts,slug,' . $post->id,
        'category_id' => 'required|integer',
    ]);

    try {
        $post->update($data);
        return response()->json(['message' => 'Post actualizado'], 200);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}


    public function destroy(Post $post)
    {
        //
        $post->delete();
        return response()->json('Post Eliminada');
    }

    function upload(Request $request, Post $post){
        $request->validate([
            'image' => 'required|mimes:png,jpg,jpeg,gif|max:10240'
        ]);

        Storage::disk('public_upload')->delete("image/".$post->image);

        $data['image'] = $filename = time() . '.'. $request->image->extension();
        $request->image->move(public_path('image'), $filename);
        $post->update($data);
        return response()->json($post);
    }
}
