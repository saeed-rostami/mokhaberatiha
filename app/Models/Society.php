<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Society extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'societies';
    protected $guarded = ['id'];

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
}
