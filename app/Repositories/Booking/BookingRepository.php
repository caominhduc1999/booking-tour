<?php

namespace App\Repositories\Booking;

use App\Models\Booking;
use App\Repositories\RepositoryAbstract;

class BookingRepository extends RepositoryAbstract implements BookingRepositoryInterface
{
    public function __construct(Booking $booking)
    {
        $this->model = $booking;
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