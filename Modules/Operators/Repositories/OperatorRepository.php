<?php

namespace Modules\Operators\Repositories;

use App\Repositories\Repository;
use Modules\Operators\Entities\Operator;
use Modules\Operators\Interfaces\OperatorRepositoryInterface;

class OperatorRepository extends Repository implements OperatorRepositoryInterface
{
    public function __construct(Operator $operator)
    {
        parent::__construct($operator);
    }

    public function internalCodeExists(string $internalCode): bool
    {
        return $this->entity->whereInternalCode($internalCode)->exists();
    }

    public function emailExists(string $email): bool
    {
        return $this->entity->whereEmail($email)->exists();
    }
}
