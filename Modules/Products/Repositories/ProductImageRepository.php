<?php

namespace Modules\Products\Repositories;

use App\Repositories\Repository;
use Modules\Products\Entities\ProductImage;
use Modules\Products\Interfaces\ProductImageRepositoryInterface;

class ProductImageRepository extends Repository implements ProductImageRepositoryInterface
{
    public function __construct(ProductImage $productImage)
    {
        parent::__construct($productImage);
    }
}
