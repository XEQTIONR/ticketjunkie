<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderContent extends Model
{
    use HasFactory;

    public function order() : BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function ticket() : BelongsTo
    {
        return $this->belongsTo(Ticket::class, 'belongs_to_id');
    }
}
