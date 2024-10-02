<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function single($post_id)
    {
        return Post::query()
            ->find($post_id);
    }

}
