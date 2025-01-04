<?php

use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostService 
{
    public function store($data)
    {
        try {
            $tagsIds = $data['tag_ids'];
            unset($data['tag_ids']);
            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
            $post = Post::firstOrCreate($data);
            $post->tags()->attach($tagsIds);
        } catch(Exception $e) {
            aborT(404);
        }
    }

    public function update($data, $post)
    {
        $tagsIds = $data['tag_ids'];
        unset($data['tag_ids']);

        $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
        $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
        
        $post->update($data);
        $post->tags()->sync($tagsIds);
        return $post;
    }
}