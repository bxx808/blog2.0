<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\PostStoreRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Exception;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.post.create', [
            'categories' => $categories,
            'tags' => $tags
        ]);
    }

    public function store(PostStoreRequest $request)
    {
        try {
            $data = $request->validated();
            $path = Storage::put('posts', $data['main_image']);
            Post::create([
                'title' => $data['title'],
                'content' => $data['content'],
                'category_id' => $data['category_id'],
                'user_id' => 1,
                'main_image' => $path,
                'short_description' => $data['short_description'],
            ]);
            return redirect()->route('admin.post.create')->with('success', 'Post created successfully!');
        } catch (Exception $e) {
            return redirect()->route('admin.post.create')->with('error', $e->getMessage());
        }
    }

}
