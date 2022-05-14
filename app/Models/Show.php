<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use \Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Show extends Model
{
    use SoftDeletes;
    use HasFactory;

    public function organizer(): BelongsTo
    {
        return $this->belongsTo(Organizer::class);
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(ShowType::class, 'show_type_id');
    }

    public function slots(): HasMany
    {
        return $this->hasMany(ShowSlot::class);
    }

    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }
}
