<?php

namespace Modules\Auth\Repositories;

use App\Repositories\Repository;
use Modules\Auth\Entities\Operator;
use Modules\Auth\Interfaces\OperatorRepositoryInterface;

class OperatorRepository extends Repository implements OperatorRepositoryInterface
{
    public function __construct(Operator $operator)
    {
        parent::__construct($operator);
    }

    public function findByInternalCode(string $internalCode): ?object
    {
        return $this->entity->whereInternalCode($internalCode)->first();
    }
}
