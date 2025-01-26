<?php

namespace Modules\Operators\Entities;

use App\Entities\Entity;
use Laravel\Sanctum\HasApiTokens;

class Operator extends Entity
{
    use HasApiTokens;

    protected $fillable = [
        'full_name',
        'status',
        'internal_code',
        'email',
        'password'
    ];

    protected $hidden = [
        'password'
    ];
}
