<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class BrandModel extends EloquentModel
{
    use SoftDeletes;

    protected $table = 'models';
    protected $fillable = [
        'name',
        'brand_id',
        'year',
        'karshenasi_price'
    ];

    public function brand(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Brand::class , 'brand_id', 'id');
    }
}
