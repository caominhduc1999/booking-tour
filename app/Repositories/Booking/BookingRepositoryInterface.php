<?php

namespace App\Repositories\Booking;

use App\Repositories\RepositoryInterface;

interface BookingRepositoryInterface extends RepositoryInterface
{
    public function paginate($perPage, $conditions);
}