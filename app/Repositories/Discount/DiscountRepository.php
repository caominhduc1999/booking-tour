<?php

namespace App\Repositories\Discount;

use App\Models\Discount;
use App\Repositories\RepositoryAbstract;

class DiscountRepository extends RepositoryAbstract implements DiscountRepositoryInterface
{
    public function __construct(Discount $discount)
    {
        $this->model = $discount;
    }

    public function paginate($perPage, $conditions)
    {
        return $this->model
            ->when(isset($conditions['name']), function ($q) use ($conditions) {
                $q->where('name', 'like', '%' . $conditions['name'] . '%');
            })
            ->paginate($perPage);
    }
}