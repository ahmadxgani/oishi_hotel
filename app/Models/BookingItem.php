<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingItem extends Model
{
    use HasFactory;
    public $fillable = ['room_id', 'date_checkin', 'date_checkout', 'price'];
}
