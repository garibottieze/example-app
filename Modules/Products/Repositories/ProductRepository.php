<?php

namespace Modules\Products\Repositories;

use App\Repositories\Repository;
use Modules\Products\Entities\Product;
use Modules\Products\Interfaces\ProductRepositoryInterface;

class ProductRepository extends Repository implements ProductRepositoryInterface
{
    public function __construct(Product $product)
    {
        parent::__construct($product);
    }

    public function skuExists(string $sku): bool
    {
        return $this->entity->whereSku($sku)->exists();
    }
}
