<?php

namespace App\Services\Post;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostStoreService
{
    /**
     * @param array{
     * main_image:string,
     * title:string,
     * content:string,
     * category_id:int,
     * short_description:string,
     * tags:array|null
     * } $data
     */
    public function execute(array $data): void
    {
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
    }
}
