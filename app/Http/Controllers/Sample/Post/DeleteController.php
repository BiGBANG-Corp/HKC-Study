<?php

namespace App\Http\Controllers\Sample\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function postDelete(Request $req)
    {
        if (! $req->has('post_id')) {
            abort('404');
        }

        $post = Post::findOrFail($req->post_id);

        $post->comments()->delete();
        $post->delete();

        return redirect()->route('sample.post.archive');
    }
}