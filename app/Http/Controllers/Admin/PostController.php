<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\PostEditRequest;
use App\Http\Requests\Admin\Post\PostStoreRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Exception;
use http\Env\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {

        return view('admin.post.index', [
            'posts' => Post::with(['category', 'tags'])->latest()->paginate(9),
        ]);
    }

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
            $post = Post::create([
                'title' => $data['title'],
                'content' => $data['content'],
                'category_id' => $data['category_id'],
                'user_id' => 1,
                'main_image' => $path,
                'short_description' => $data['short_description'],
            ]);
            if (isset($data['tags'])) {
                $post->tags()->attach($data['tags']);
            }
            return redirect()->route('admin.post.create')->with('success', 'Post created successfully!');
        } catch (Exception $e) {
            return redirect()->route('admin.post.create')->with('error', $e->getMessage());
        }
    }

    public function edit(Post $post)
    {
        return view('admin.post.edit', [
            'post' => $post,
            'categories' => Category::all(),
            'tags' => Tag::all(),
        ]);
    }

    public function update(PostEditRequest $request, Post $post)
    {
        try {
            $data = $request->validated();
            $postData = [
                'title' => $data['title'],
                'content' => $data['content'],
                'category_id' => $data['category_id'],
                'short_description' => $data['short_description'],
            ];
            $tagIds = $data['tags'] ?? [];
            $post->tags()->sync($tagIds);
            if (isset($data['main_image'])) {
                $path = Storage::put('posts', $data['main_image']);
                $postData['main_image'] = $path;
                if (Storage::exists($post->main_image)) {
                    Storage::delete($post->main_image);
                }
            }
            $post->update($postData);
            return redirect()->route('admin.post.edit', $post)->with('success', 'Post updated successfully!');
        } catch (Exception $e) {
            return redirect()->route('admin.post.edit', $post)->with('error', $e->getMessage());
        }
    }

}
