<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Room extends Model
{
    use HasFactory;
    public $fillable = ['no_room', 'type_room_id'];

    public function type_room(): BelongsTo {
        return $this->belongsTo(TypeRoom::class);
    }
}
