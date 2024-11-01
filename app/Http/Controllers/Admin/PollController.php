<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Poll;
use App\Models\PollItem;
use Illuminate\Http\Request;

class PollController extends Controller
{

    public function index()
    {
        $polls = Poll::query()
        ->paginate(25);
        return view('admin.pages.poll', compact('polls'));
    }
    public function create()
    {
        return view('admin.components.pollCreate');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required' , 'string' ],
            'item_1' => ['required' , 'string' ],
            'item_2' => ['required' , 'string' ],
        ]);

      $poll = Poll::query()
            ->create([
               'title' => $request->title,
               'end_at' => $request->end_at ?? now(),
               'is_active' => $request->is_active ?? true,
            ]);

        $a_ex = Poll::query()
            ->whereNot('id', $poll->id)
            ->where('is_active', 1)
            ->get();

        if ($a_ex) {
            $a_ex->toQuery()->update([
                'is_active' => 0
            ]);
        }

        PollItem::query()
            ->create([
              'poll_id' => $poll->id,
              'title' => $request->item_1,
            ]);

        PollItem::query()
            ->create([
                'poll_id' => $poll->id,
                'title' => $request->item_2,
            ]);
      if (isset($request->item_3)) {
          PollItem::query()
              ->create([
                  'poll_id' => $poll->id,
                  'title' => $request->item_3,
              ]);
      }

        if (isset($request->item_4)) {
            PollItem::query()
                ->create([
                    'poll_id' => $poll->id,
                    'title' => $request->item_4,
                ]);
        }

        return redirect()->route('poll.index');

    }

    public function edit(Poll $poll)
    {
        return view('admin.components.pollUpdate', compact('poll'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'poll_id' => ['required' , 'exists:polls,id' ],
            'title' => ['required' , 'string' ],
            'item_1' => ['required' , 'string' ],
            'item_2' => ['required' , 'string' ],
        ]);

        $poll = Poll::query()->find($request->poll_id);
        if ($poll->isDirty('title')) {
            $poll->update([
                'title' => $request->title
            ]);
        }

        $items = PollItem::query()
            ->where('poll_id', $request->poll_id)
            ->get();


        if($request->old_item_1 !== $request->item_1) {
            $items->where('title', $request->old_item_1)
                ->first()
                ->update([
                    'title' => $request->item_1
                ]);
        }

        if($request->old_item_2 !== $request->item_2) {
            $items->where('title', $request->old_item_2)
                ->first()
                ->update([
                    'title' => $request->item_2
                ]);
        }

        if($request->old_item_3 !== $request->item_3) {
            if ($request->old_item_3 == null) {
                PollItem::query()
                    ->create([
                        'poll_id' => $poll->id,
                        'title' => $request->item_3,
                    ]);
            }
            else {
                if ($request->item_3 == null) {
                    $items->where('title', $request->old_item_3)
                        ->first()->delete();
                }
                else {
                    $items->where('title', $request->old_item_3)
                        ->first()
                        ->update([
                            'title' => $request->item_3
                        ]);
                }

            }

        }

        if($request->old_item_4 !== $request->item_4) {
            if ($request->old_item_3 == null) {
                PollItem::query()
                    ->create([
                        'poll_id' => $poll->id,
                        'title' => $request->item_3,
                    ]);
            }
           else{
               if ($request->item_4 == null) {
                   $items->where('title', $request->old_item_4)
                       ->first()->delete();
               }
               else {
                   $items->where('title', $request->old_item_4)
                       ->first()
                       ->update([
                           'title' => $request->item_4
                       ]);
               }
           }
        }
        return redirect()->route('poll.index');
    }

    public function delete(Poll $poll)
    {
         $poll->delete();
        return redirect()->route('poll.index');

    }

    public function statistic(Poll $poll)
    {
        return view('admin.pages.poll-statistic')
            ->with([
                'poll' => $poll,
                'items' => $poll->items,
            ]);
    }

    public function activation(Poll $poll)
    {
        $a_ex = Poll::query()
            ->whereNot('id', $poll->id)
            ->where('is_active', 1)
            ->first();

        if ($a_ex) {
            $a_ex->update([
                'is_active' => 0
            ]);
        }

        $poll->is_active ? $poll->update([
            'is_active' => 0
        ]) : $poll->update([
            'is_active' => 1
        ]);

        return redirect()->route('poll.index');

    }
}
