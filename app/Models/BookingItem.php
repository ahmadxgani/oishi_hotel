<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BookingItem extends Model
{
    use HasFactory;
    public $fillable = ['booking_id', 'room_id', 'date_checkin', 'date_checkout', 'price'];

    public function room(): BelongsTo {
        return $this->belongsTo(Room::class);
    }
}
