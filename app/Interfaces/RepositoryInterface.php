<?php

namespace App\Interfaces;

interface RepositoryInterface
{
    public function all(): object;

    public function find($id): ?object;

    public function create(array $attributes): object;

    public function update(array $attributes, $id): void;

    public function delete($id): void;
}
