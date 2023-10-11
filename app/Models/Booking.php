<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Booking extends Model
{
    use HasFactory;
    public $fillable = ['user_id', 'date_book_start', 'date_book_end', 'total_price', 'status', 'nr_adults', 'nr_children', 'nr_rooms'];

    public static function scopeSearch(Builder $q, $name)
    {
        $q->select(["bookings.*"]);
        $q->join("users", "users.id", "bookings.user_id");
        $q->where("users.name", 'LIKE', '%' . $name . '%');
    }

    public function booking_items(): HasMany {
        return $this->hasMany(BookingItem::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
