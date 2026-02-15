<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
    ];

    public function brandModel(): Brand|\Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\BrandModel::class, 'brand_id', 'id');
    }
}
