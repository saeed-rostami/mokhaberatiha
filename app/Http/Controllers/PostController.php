<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function single($post_id)
    {
        $post = Post::query()
            ->find($post_id);

        $post->increment('view');

        return view('website.singleNew', compact('post'));
    }

}
