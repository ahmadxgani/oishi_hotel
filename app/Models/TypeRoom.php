<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class TypeRoom extends Model
{
    use HasFactory;
    public $fillable = ['name', 'description', 'publish_rate'];

    public function photos(): HasMany
    {
        return $this->hasMany(RoomPhoto::class);
    }

    protected static function booted () {
        static::deleting(function(TypeRoom $typeRoom) {
            if (!$typeRoom->photos->isEmpty()) {
                foreach ($typeRoom->photos as $photo) {
                    Storage::delete($photo->image);
                }
            }
        });
    }
}
