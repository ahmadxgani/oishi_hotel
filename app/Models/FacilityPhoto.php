<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FacilityPhoto extends Model
{
    use HasFactory;

    public $fillable = ['facility_id', 'image'];

    public function facility(): BelongsTo {
        return $this->belongsTo(Facility::class);
    }

    public static function scopeSearch(Builder $q, $name)
    {
        $q->select(["facility_photos.*"]);
        $q->join("facilities", "facilities.id", "facility_photos.facility_id");
        $q->where("facilities.name", 'LIKE', '%' . $name . '%');
    }
}
