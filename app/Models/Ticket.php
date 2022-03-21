<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use HasFactory, SoftDeletes;

    public function show(): BelongsTo
    {
        return $this->BelongsTo(Show::class);
    }

    public function showSlot(): BelongsTo
    {
        return $this->BelongsTo(ShowSlot::class);
    }

    public function orderContents(): HasMany
    {
        return $this->hasMany(OrderContent::class);
    }
}
