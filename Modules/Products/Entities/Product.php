<?php

namespace Modules\Products\Entities;

use App\Entities\Entity;

class Product extends Entity
{
    protected $fillable = [
        'name',
        'active',
        'sku',
        'category_id',
        'stock',
        'price',
        'description',
    ];
}
