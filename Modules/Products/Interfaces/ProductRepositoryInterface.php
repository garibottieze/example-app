<?php

namespace Modules\Products\Interfaces;

use App\Interfaces\RepositoryInterface;

interface ProductRepositoryInterface extends RepositoryInterface
{
    public function skuExists(string $sku): bool;
}
