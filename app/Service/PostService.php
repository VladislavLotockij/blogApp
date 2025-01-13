<?php

namespace App\Service;

use App\Models\Post;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService 
{
    public function store($data)
    {
        try {
            DB::beginTransaction();
            if(isset($data['tag_ids'])) {
                $tagsIds = $data['tag_ids'];
                unset($data['tag_ids']);
            }
            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
            
            $post = Post::firstOrCreate($data);
            if(isset($tagsIds)) {
                $post->tags()->attach($tagsIds);
            }
            DB::commit();
        } catch(Exception $e) {
            DB::rollBack();
            abort(500);
        }
    }

    public function update($data, $post)
    {
        try {
            DB::beginTransaction();
            if(isset($data['tag_ids'])) {
                $tagsIds = $data['tag_ids'];
                unset($data['tag_ids']);
            }
            
            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
        
            $post->update($data);
            if(isset($tagsIds)) {
                $post->tags()->sync($tagsIds);
            }
            DB::commit();
            return $post;
        } catch(Exception $e) {
            DB::rollBack();
            abort(500);
        }
    }
}