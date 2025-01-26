<?php

namespace Modules\Products\Entities;

use App\Entities\NoTimestamp;

class Category extends NoTimestamp
{
    protected $fillable = [
        'name',
    ];
}
