<?php

namespace App\Http\Controllers\Sample\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function getCreate()
    {
        return view('sample.post.create');
    }


    public function postCreate(Request $req)
    {
        // バリデーション処理
        $req->validate([
            'post_title'    => 'required|max:100',
            'post_content'  => 'required'
        ]);

        Post::create([
            'post_title'    => $req->post_title,
            'post_content'  => $req->post_content,
            'post_date'     => Carbon::now(),
            'post_status'   => $req->post_status,
        ]);

        return redirect()->route('sample.post.archive');
    }
}