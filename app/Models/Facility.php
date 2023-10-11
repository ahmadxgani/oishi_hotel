<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Facility extends Model
{
    use HasFactory;
    public $fillable = ['name', 'description'];

    public static function scopeSearch(Builder $q, $text)
    {
        $q->select(["facilities.*"]);
        $q->where("name", 'LIKE', '%' . $text . '%');
        $q->where("description", 'LIKE', '%' . $text . '%');
    }
}
