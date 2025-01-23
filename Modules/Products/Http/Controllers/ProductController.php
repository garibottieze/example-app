<?php

namespace Modules\Products\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaginateRequest;
use Modules\Products\Http\Requests\JustProductIdRequest;
use Modules\Products\Http\Requests\StoreProductRequest;
use Modules\Products\Http\Requests\UpdateProductRequest;
use Modules\Products\Http\Resources\ProductResource;
use Modules\Products\Http\Resources\ProductSummaryResource;
use Modules\Products\Interfaces\ProductRepositoryInterface;

class ProductController extends Controller
{
    public function __construct(
        protected ProductRepositoryInterface $productRepository
    )
    {
    }

    public function index(PaginateRequest $request): object
    {
        $products = $this->productRepository->paginate($request->per_page);
        return response()->withPaginate(ProductSummaryResource::collection($products));
    }

    public function store(StoreProductRequest $request): object
    {
        $this->productRepository->create($request->validated());
        return response()->justMessage('Product created successfully.');
    }

    public function show(JustProductIdRequest $request): object
    {
        $product = $this->productRepository->find($request->id);
        return response()->success(ProductResource::make($product));
    }

    public function update(UpdateProductRequest $request): object
    {
        $this->productRepository->update($request->validated(), $request->id);
        return response()->justMessage('Product updated successfully.');
    }

    public function delete(JustProductIdRequest $request): object
    {
        $this->productRepository->delete($request->id);
        return response()->justMessage('Product deleted successfully.');
    }
}
