<?php

namespace App\Repositories\Tag;

use App\Models\Tag;
use App\Repositories\RepositoryAbstract;

class TagRepository extends RepositoryAbstract implements TagRepositoryInterface
{
    public function __construct(Tag $tag)
    {
        $this->model = $tag;
    }

    public function paginate($perPage, $conditions)
    {
        return $this->model
            ->when($conditions['name'], function ($q) use ($conditions) {
                $q->where('name', 'like', '%' . $conditions['name'] . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);
    }
}