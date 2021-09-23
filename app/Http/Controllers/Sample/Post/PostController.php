<?php

namespace App\Http\Controllers\Sample\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

class PostController extends Controller
{
    public function getArchive()
    {
        $posts = Post::get();

        $view_args = compact('posts');

        return view('sample.post.archive', $view_args);
    }
}