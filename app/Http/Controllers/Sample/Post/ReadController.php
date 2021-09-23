<?php

namespace App\Http\Controllers\Sample\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class ReadController extends Controller
{
    public function getRead(Request $req)
    {
        if (! $req->has('post_id')) {
            abort('404');
        }

        $post = Post::findOrFail($req->post_id);
        $comments = $post->comments()->orderBy('created_at', 'desc')->get();

        $view_args = compact('post', 'comments');

        return view('sample.post.read', $view_args);
    }


    public function postAddComment(Request $req)
    {
        $post = Post::find($req->post_id);

        $comment = $post->comments()->create([
            'comment_content' => $req->comment
        ]);

        return $comment;
    }
}