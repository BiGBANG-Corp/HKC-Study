<?php

namespace App\Http\Controllers\Sample\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function getUpdate(Request $req)
    {
        if (! $req->has('post_id')) {
            abort('404');
        }

        $post = Post::findOrFail($req->post_id);

        $view_args = compact('post');

        return view('sample.post.update', $view_args);
    }


    public function postUpdate(Request $req)
    {
        // バリデーション処理
        $req->validate([
            'post_title'    => 'required|max:100',
            'post_content'  => 'required'
        ]);

        $post = Post::findOrFail($req->post_id);

        $post->post_title   = $req->post_title;
        $post->post_content = $req->post_content;
        $post->post_status  = $req->post_status;

        $post->save();

        return redirect()->route('sample.post.archive');
    }
}