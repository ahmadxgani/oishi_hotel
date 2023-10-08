<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RoomPhoto extends Model
{
    use HasFactory;
    public $fillable = ['type_room_id', 'image'];

    public function type_room(): BelongsTo {
        return $this->belongsTo(TypeRoom::class);
    }
}
