<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    public function customer() : BelongsTo
    {
        $this->belongsTo(User::class, 'customer_id');
    }

    public function contents() : HasMany
    {
        return $this->hasMany(OrderContent::class);
    }
}
