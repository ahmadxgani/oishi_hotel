<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Room extends Model
{
    use HasFactory;
    public $fillable = ['no_room', 'room_type_id'];

    public function room_type()
    {
        return $this->belongsTo(RoomType::class)->first();
    }

    public static function scopeSearch(Builder $q, $name)
    {
        $q->select(["rooms.*"]);
        $q->join("room_types", "room_types.id", "rooms.room_type_id");
        $q->where("room_types.name", 'LIKE', '%' . $name . '%');
    }
}
