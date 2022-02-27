<?php

namespace App\Repositories\Discount;

use App\Repositories\RepositoryInterface;

interface DiscountRepositoryInterface extends RepositoryInterface
{
    public function paginate($perPage, $conditions);
}