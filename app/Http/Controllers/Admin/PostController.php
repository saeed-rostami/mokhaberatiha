<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Validations\PostRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Post::query()->paginate();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $post = Post::query()
            ->create([
                'title' => $request->title,
                'short_description' => $request->short_description,
                'description' => $request->description,
                'allow_comment' => $request->allow_comment,
                'allow_like' => $request->allow_like,
            ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show($post_id)
    {
        return Post::query()->find($post_id);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $post_id)
    {
        $post = Post::query()
            ->find($post_id)
            ->update([
                'title' => $request->title,
                'short_description' => $request->short_description,
                'description' => $request->description,
                'allow_comment' => $request->allow_comment,
                'allow_like' => $request->allow_like,
            ]);

        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $post_id)
    {
        Post::query()
            ->find($post_id)
            ->delete();

        return redirect()->back();

    }
}
