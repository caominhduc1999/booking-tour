<?php

namespace App\Repositories\Booking;

use App\Models\Booking;
use App\Repositories\RepositoryAbstract;
use Illuminate\Support\Carbon;

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

    public function getRevenue($date)
    {
        return $this->model->whereBetween('created_at', [Carbon::parse($date)->startOfDay(), Carbon::parse($date)->endOfDay()])->get()->sum('total_price');
    }

    public function getTourCount($date)
    {
        return $this->model->whereBetween('created_at', [Carbon::parse($date)->startOfDay(), Carbon::parse($date)->endOfDay()])->count();
    }

    public function getNewBookings()
    {
        return $this->model->where('status', 1)->get();
    }
}