<?php

namespace Modules\Products\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Products\Http\Resources\CategoryResource;
use Modules\Products\Interfaces\CategoryRepositoryInterface;

class CategoryController extends Controller
{
    public function __construct(
        protected CategoryRepositoryInterface $categoryRepository
    )
    {
    }

    public function index(): object
    {
        $categories = $this->categoryRepository->all();
        return response()->success(CategoryResource::collection($categories));
    }
}
