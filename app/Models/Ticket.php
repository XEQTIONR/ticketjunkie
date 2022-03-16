<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use HasFactory, SoftDeletes;

    public function show(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->BelongsTo(Show::class);
    }

    public function showSlot(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->BelongsTo(ShowSlot::class);
    }
}
