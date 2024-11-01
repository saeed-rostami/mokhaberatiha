<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'posts';

    protected $guarded = ['id'];

    protected $with = ['comments' , 'confirmedComments'];
    protected $withCount = ['comments' , 'confirmedComments'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function likes(): MorphMany
    {
        return $this->morphMany(Like::class, 'item');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function confirmedComments(): HasMany
    {
        return $this->hasMany(Comment::class)
            ->where('is_admin' , 0)
            ->where('is_confirmed' , 1)

            ;
    }

    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'item');
    }

    public function image()
    {
        return $this->images()->latest()->first();
    }
}
