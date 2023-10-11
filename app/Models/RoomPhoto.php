<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RoomPhoto extends Model
{
    use HasFactory;
    public $fillable = ['type_room_id', 'image'];

    public function room_type(): BelongsTo {
        return $this->belongsTo(RoomType::class);
    }
}
