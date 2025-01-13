<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = Post::paginate(6);
        $randomPosts = Post::inRandomOrder()->take(4)->get();
        $likedPosts = Post::withCount('likedUsers')->orderBy('liked_users_count', 'desc')->take(4)->get();
        return view('post.index', compact('posts', 'randomPosts', 'likedPosts'));
    }
}