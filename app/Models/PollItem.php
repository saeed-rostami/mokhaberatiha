<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class PollItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'poll_items';

    public function poll(): BelongsTo
    {
        return $this->belongsTo(Poll::class);
    }

    public function userItems(): HasMany
    {
        return $this->hasMany(PollUserItem::class);
    }
}
