<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class PollUserItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'poll_user_items';

    public function pollItem(): BelongsTo
    {
        return $this->belongsTo(PollItem::class);
    }
}
