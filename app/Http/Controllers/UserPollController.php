<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use App\Models\PollItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPollController extends Controller
{
    public function vote(Request $request)
    {
        $poll = Poll::query()
            ->find($request->poll_id);

//        CHECK POLL IS ELIGIBLE

        $poll->items()->where('user_id', Auth::id())
        ->exists();

//        CHECK USER IF DID NOT VOTED TO THIS POLL


    }
}
