<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    public $fillable = ['user_id', 'room_id', 'date_checkin', 'date_checkout', 'date_book_start', 'date_book_end', 'total_price'];
}
