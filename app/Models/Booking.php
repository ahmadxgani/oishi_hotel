<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    public $fillable = ['user_id', 'date_book_start', 'date_book_end', 'total_price', 'status', 'nr_adults', 'nr_children'];
}
