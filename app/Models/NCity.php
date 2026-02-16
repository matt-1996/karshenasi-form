<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class NCity extends Model
{
    public $timestamps = false;
    protected $table = 'n_cities';

    public function neighborhoods(): HasMany
    {
        return $this->hasMany(Neighborhood::class, 'n_city_id' , 'id');
    }
}
