<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class Room extends Model
{
    use HasFactory;
    public $fillable = ['no_room', 'room_type_id'];

    public function room_type()
    {
        return $this->belongsTo(RoomType::class)->first();
    }

    public static function getAvailableRooms($roomTypeId, $dateStart, $dateEnd, $limit)
    {
        return DB::select(<<<SQL
            SELECT rooms.id FROM rooms
            LEFT JOIN booking_items ON rooms.id = booking_items.room_id
            LEFT JOIN bookings ON bookings.id = booking_items.booking_id
            WHERE
            rooms.room_type_id = {$roomTypeId} AND
            (bookings.date_book_start IS NULL AND bookings.date_book_end IS NULL) OR
            -- (bookings.status IS 'cancelled') OR
            (
                ('{$dateStart}' >= bookings.date_book_end) OR
                ('{$dateStart}' < bookings.date_book_start AND '{$dateEnd}' <= bookings.date_book_start)
            )
            GROUP BY rooms.id ORDER BY rooms.id ASC LIMIT {$limit};
        SQL);
    }

    public static function scopeSearch(Builder $q, $name)
    {
        $q->select(["rooms.*"]);
        $q->join("room_types", "room_types.id", "rooms.room_type_id");
        $q->where("room_types.name", 'LIKE', '%' . $name . '%');
    }
}
