<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    public $fillable = ['no_room', 'publish_rate', 'type'];

    public const TYPE_MAP = [
        "SuperiorKing"  => "Superior King",
        "Deluxe"         => "Deluxe",
        "SuperiorTwin"  => "Superior Twin"
    ];

    public function type()
    {
        return self::TYPE_MAP[$this->type];
    }
}
