<?php

namespace Modules\Operators\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Operators\Http\Requests\JustOperatorIdRequest;
use Modules\Operators\Http\Requests\StoreOperatorRequest;
use Modules\Operators\Http\Requests\UpdateOperatorRequest;
use Modules\Operators\Http\Resources\OperatorResource;
use Modules\Operators\Http\Resources\OperatorSummaryResource;
use Modules\Operators\Interfaces\OperatorRepositoryInterface;

class OperatorsController extends Controller
{
    public function __construct(
        protected OperatorRepositoryInterface $operatorRepository
    )
    {
    }

    public function index(): object
    {
        $operators = $this->operatorRepository->all();
        return response()->success(OperatorSummaryResource::collection($operators));
    }

    public function store(StoreOperatorRequest $request): object
    {
        $this->operatorRepository->create($request->all());
        return response()->justMessage('Operator created successfully.');
    }

    public function show(JustOperatorIdRequest $request): object
    {
        $operator = $this->operatorRepository->find($request->id);
        return response()->success(OperatorResource::make($operator));
    }

    public function update(UpdateOperatorRequest $request): object
    {
        $operator = $this->operatorRepository->find($request->id);
        if ($operator->internal_code != $request->internal_code) {
            if ($this->operatorRepository->internalCodeExists($request->internal_code)) {
                abort(400, 'Internal code already exists.');
            }
        }
        if ($operator->email != $request->email) {
            if ($this->operatorRepository->emailExists($request->email)) {
                abort(400, 'Email already exists.');
            }
        }
        $this->operatorRepository->update($request->validated(), $operator->id);
        return response()->justMessage('Operator updated successfully.');
    }

    public function delete(JustOperatorIdRequest $request): object
    {
        $this->operatorRepository->delete($request->id);
        return response()->justMessage('Operator deleted successfully.');
    }
}
