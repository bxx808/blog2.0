<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\PostEditRequest;
use App\Http\Requests\Admin\Post\PostStoreRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Services\Post\PostStoreService;
use App\Services\Post\PostUpdateService;
use Exception;
use http\Env\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    private PostUpdateService $postUpdateService;
    private PostStoreService $postStoreService;
    public function __construct(
        PostUpdateService $postUpdateService,
        PostStoreService $postStoreService
    )
    {
        $this->postUpdateService = $postUpdateService;
        $this->postStoreService = $postStoreService;
    }

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
            $this->postStoreService->execute(data: $data);
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
            $this->postUpdateService->execute(data: $data, post: $post);
            return redirect()->route('admin.post.index')->with('success', 'Post updated successfully!');
        } catch (Exception $e) {
            return redirect()->route('admin.post.index')->with('error', $e->getMessage());
        }
    }

    public function delete(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.post.index')->with('success', 'Post deleted successfully!');
    }

}
