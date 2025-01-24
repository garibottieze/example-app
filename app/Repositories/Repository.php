<?php

namespace App\Repositories;

use App\Entities\Entity;
use App\Interfaces\RepositoryInterface;

abstract class Repository implements RepositoryInterface
{
    public function __construct(protected Entity $entity)
    {
    }

    public function all(): object
    {
        return $this->entity->all();
    }

    public function paginate(object $request): object
    {
        return $this->entity
            ->when($request->search_by, function ($query) use ($request) {
                if ($request->search_value) {
                    return $request->strict_search?
                        $query->where($request->search_by, $request->search_value):
                        $query->whereLike($request->search_by, pct_between($request->search_value));
                } elseif ($request->search_between) {
                    return $query->whereBetween($request->search_by, $request->search_between);
                } else {
                    return $query->whereNull($request->search_by);
                }
            })
            ->when($request->order_by, function ($query) use ($request) {
                return $request->direction_desc?
                    $query->orderByDesc($request->order_by):
                    $query->orderBy($request->order_by);
            })
            ->simplePaginate(15);
    }

    public function find($id): ?object
    {
        return $this->entity->find($id);
    }

    public function findForced($id): ?object
    {
        return $this->entity->withTrashed()->find($id);
    }

    public function create(array $attributes): object
    {
        return $this->entity->create($attributes);
    }

    public function update(array $attributes, $id): void
    {
        $this->entity->findOrFail($id)->update($attributes);
    }

    public function delete($id): void
    {
        $this->entity->findOrFail($id)->delete();
    }
}
