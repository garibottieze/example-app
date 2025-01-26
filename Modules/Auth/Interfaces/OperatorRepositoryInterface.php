<?php

namespace Modules\Auth\Interfaces;

use App\Interfaces\RepositoryInterface;

interface OperatorRepositoryInterface extends RepositoryInterface
{
    public function findByInternalCode(string $internalCode): ?object;
}
