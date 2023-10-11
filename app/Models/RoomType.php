<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class RoomType extends Model
{
    use HasFactory;
    public $table = "room_types";
    public $fillable = ['name', 'description', 'publish_rate'];

    public function photos(): HasMany
    {
        return $this->hasMany(RoomPhoto::class);
    }

    public static function getPrice($roomTypeId)
    {
        $ret = self::find($roomTypeId);
        if (!$ret) {
            return NULL;
        }

        return $ret->publish_rate;
    }

    protected static function booted ()
    {
        static::deleting(function(RoomType $roomType) {
            if (!$roomType->photos->isEmpty()) {
                foreach ($roomType->photos as $photo) {
                    Storage::delete($photo->image);
                }
            }
        });
    }
}
