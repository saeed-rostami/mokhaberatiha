<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class PollUserItem extends Model
{
    use HasFactory;

    protected $table = 'poll_user_items';

    protected $guarded = ['id'];

    public function pollItem(): BelongsTo
    {
        return $this->belongsTo(PollItem::class, 'poll_item_id');
    }

    public function poll(): HasOneThrough
    {
        return $this->hasOneThrough(
            Poll::class,
            PollItem::class,
            'poll_id',
            'poll_item_id',
        );
    }
}
