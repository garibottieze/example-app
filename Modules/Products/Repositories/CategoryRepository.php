<?php

namespace Modules\Products\Repositories;

use App\Repositories\Repository;
use Modules\Products\Entities\Category;
use Modules\Products\Interfaces\CategoryRepositoryInterface;

class CategoryRepository extends Repository implements CategoryRepositoryInterface
{
    public function __construct(Category $category)
    {
        parent::__construct($category);
    }
}
