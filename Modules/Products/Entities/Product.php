<?php

namespace Modules\Products\Entities;

use App\Entities\Entity;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Entity
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'active',
        'sku',
        'category_id',
        'stock',
        'price',
        'description',
    ];

    public function category(): object
    {
        return $this->belongsTo(Category::class);
    }
}
