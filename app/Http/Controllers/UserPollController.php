<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use App\Models\PollItem;
use App\Models\PollUserItem;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPollController extends Controller
{
    public function vote(Request $request)
    {
        $request->validate([
            'item_id' => ['required', 'exists:poll_items,id'],
            'poll_id' => ['required', 'exists:polls,id'],
        ]);
        $poll = Poll::query()
            ->find($request->poll_id);

//        CHECK POLL IS ELIGIBLE
        $ex = PollItem::query()
            ->where('poll_id', $poll->id)
            ->whereHas('userItems', function (Builder $q) {
                $q->where('user_id', Auth::id());
            })
        ->exists();

        if ($ex) {
            return redirect()->back()
                ->withErrors('شما قبلا نظر خود را ثبت کردید');
        }

//        CHECK USER IF DID NOT VOTED TO THIS POLL


        PollUserItem::query()
            ->create([
                'user_id' => Auth::id(),
                'poll_item_id' => $request->item_id,
            ]);

        return redirect()->back();
    }
}
