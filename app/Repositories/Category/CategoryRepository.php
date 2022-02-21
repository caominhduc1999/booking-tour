<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Repositories\RepositoryAbstract;

class CategoryRepository extends RepositoryAbstract implements CategoryRepositoryInterface
{
    public function __construct(Category $category)
    {
        $this->model = $category;
    }

    public function paginate($perPage, $conditions)
    {
        return $this->model
            ->when($conditions['name'], function ($q) use ($conditions) {
                $q->where('name', 'like', '%' . $conditions['name'] . '%');
            })
            ->paginate($perPage);
    }
}