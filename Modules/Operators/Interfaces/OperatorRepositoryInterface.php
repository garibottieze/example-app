<?php

namespace Modules\Operators\Interfaces;

use App\Interfaces\RepositoryInterface;

interface OperatorRepositoryInterface extends RepositoryInterface
{
    public function internalCodeExists(string $internalCode): bool;

    public function emailExists(string $email): bool;
}
