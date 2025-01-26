<?php

namespace Modules\Products\Entities;

use App\Entities\Entity;

class ProductImage extends Entity
{
    protected $fillable = [
        'product_id',
        'image_url',
        'description',
    ];
}
