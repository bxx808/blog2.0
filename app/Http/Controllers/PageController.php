<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PageController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'posts' => Post::all()
        ]);
    }

    public function post(int $id)
    {
        return view('post', [
            'post' => Post::find($id)
        ]);
    }
}
