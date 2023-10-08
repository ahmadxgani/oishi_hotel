<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FacilityPhoto extends Model
{
    use HasFactory;

    public $fillable = ['facility_id', 'image'];

    public function facility(): BelongsTo {
        return $this->belongsTo(Facility::class);
    }
}
