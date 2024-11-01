<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\NewsPublished;
use App\Models\Archive;
use App\Models\Image;
use App\Models\Post;
use App\Validations\PostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::query()->paginate(25);
        return view('admin.pages.posts', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.components.postCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required' , 'string' ],
            'description' => ['required' , 'string' ],
            'file' => ['required' , 'file'],
        ]);
        try {
            $path = $request->file('file')->store('images/posts', 'public');
        } catch (\Throwable $throwable) {
            return $throwable->getMessage();
        }
        $post = Post::query()
            ->create([
                'title' => $request->title,
                'short_description' => $request->description,
                'description' => $request->description,
                'allow_comment' => $request->allow_comment ?? true,
                'allow_like' => $request->allow_like ?? true,
            ]);

        Image::query()
            ->create([
                'item_type' => Post::class,
                'item_id' => $post->id,
                'path' => $path
            ]);

        if ($request->archive) {
            $archive_path = $request->file('file')->store('images/archives', 'public');
            Archive::query()
                ->create([
                    'path' => $archive_path
                ]);
        }

//        if ($request->notif) {
//            Mail::to(['saeedrostami1991@gmail.com'])
//            ->send(new NewsPublished());
//        }

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
    public function edit(Post $post)
    {
        return view("admin.components.postUpdate" , compact('post'));
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
                'short_description' => $request->description,
                'description' => $request->description,
                'allow_comment' => $request->allow_comment ?? 0,
                'allow_like' => $request->allow_like ?? 0,
            ]);


        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('images/posts', 'public');

            Image::query()
                ->create([
                    'item_type' => Post::class,
                    'item_id' => $post_id,
                    'path' => $path
                ]);
        }

        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Post $post)
    {
        $post
            ->delete();

        return redirect()->back();

    }
}
