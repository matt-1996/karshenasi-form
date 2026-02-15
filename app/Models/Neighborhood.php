<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Neighborhood extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'city_id',
    ];
}
