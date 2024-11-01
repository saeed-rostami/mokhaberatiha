<?php

namespace App\Http\Controllers;

use App\Models\Archive;
use App\Models\Poll;
use App\Models\Post;
use App\Models\Settings;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::query()
            ->latest()
            ->take(9)
            ->get();

        $active_poll = Poll::query()
            ->where('is_active', 1)
            ->latest()
            ->first();


        return view('website.index')
            ->with(
                ['posts' => $posts , 'poll' => $active_poll]
            );
    }

    public function news()
    {
        $posts = Post::query()
            ->orderByDesc('view')
            ->paginate(15);
        return view('website.news', compact('posts'));
    }

    public function archives()
    {
        $archives = Archive::query()->paginate(15);
        return view('website.archives', compact('archives'));
    }

    public function aboutUs()
    {
        $setting = Settings::query()->first();
        return view('website.about-us', compact('setting'));
    }

    public function contactUs()
    {
        $setting = Settings::query()->first();
        return view('website.contact-us', compact('setting'));
    }
}
