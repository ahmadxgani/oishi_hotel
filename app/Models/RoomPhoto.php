<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RoomPhoto extends Model
{
    use HasFactory;
    public $fillable = ['room_type_id', 'image'];

    public function room_type(): BelongsTo {
        return $this->belongsTo(RoomType::class);
    }

    public static function scopeSearch(Builder $q, $name)
    {
        $q->select(["room_photos.*"]);
        $q->join("room_types", "room_types.id", "room_photos.room_type_id");
        $q->where("room_types.name", 'LIKE', '%' . $name . '%');
    }
}
