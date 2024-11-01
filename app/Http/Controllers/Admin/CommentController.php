<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::query()->paginate(25);
        return view('admin.pages.comments', compact('comments'));
    }

    public function reject(Comment $comment)
    {
        $comment->update([
           "is_confirmed" => 0
        ]);
        return redirect()->back();
    }

    public function approve(Comment $comment)
    {
        $comment->update([
            "is_confirmed" =>1
        ]);
        return redirect()->back();

    }

    public function response(Comment $comment)
    {
        return view('admin.components.commentResponse', compact('comment'));
    }

    public function sendResponse(Comment $comment, Request $request)
    {
        Comment::query()
            ->create([
                'user_id' => Auth::id(),
                'reply_to' => $comment->id,
                'post_id' => $comment->post->id,
                'comment' => $request->reply,
                'is_admin' => 1,
                'is_confirmed' => 1
            ]);

        return redirect()->back();

    }
}
