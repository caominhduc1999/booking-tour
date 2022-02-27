<?php

namespace App\Repositories\Hotel;

use App\Repositories\RepositoryInterface;

interface HotelRepositoryInterface extends RepositoryInterface
{
    public function paginate($perPage, $conditions);
}