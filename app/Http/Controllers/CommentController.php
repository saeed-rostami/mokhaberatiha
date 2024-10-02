<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        Comment::query()
            ->create([
                'user_id' => Auth::id() ?? null,
                'item_type' => Post::class,
                'item_id' => $request->post_id,
                'comment' => $request->comment
            ]);
    }
}
