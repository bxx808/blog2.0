<?php

namespace App\Services\Post;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostUpdateService
{
    /**
     * @param array{
     *   title:string,
     *   content:string,
     *   category_id:int,
     *   short_description:string,
     *   tags:array<int>,
     *   main_image:string|null
     * } $data
     */
    public function execute(array $data, Post $post): void
    {
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
    }
}
