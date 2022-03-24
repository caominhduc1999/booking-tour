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
            ->when(isset($conditions['booking_person_name']), function ($q) use ($conditions) {
                $q->where('booking_person_name', 'like', '%' . $conditions['booking_person_name'] . '%');
            })
            ->when(isset($conditions['booking_person_phone']), function ($q) use ($conditions) {
                $q->where('booking_person_phone', 'like', '%' . $conditions['booking_person_phone'] . '%');
            })
            ->when(isset($conditions['booking_person_email']), function ($q) use ($conditions) {
                $q->where('booking_person_email', 'like', '%' . $conditions['booking_person_email'] . '%');
            })
            ->when(isset($conditions['tour_id']), function ($q) use ($conditions) {
                $q->where('tour_id', $conditions['tour_id']);
            })
            ->when(isset($conditions['booking_date']), function ($q) use ($conditions) {
                $q->whereDate('booking_date', $conditions['booking_date']);
            })
            ->when(isset($conditions['start_date']), function ($q) use ($conditions) {
                $q->whereDate('start_date', $conditions['start_date']);
            })
            ->when(isset($conditions['status']), function ($q) use ($conditions) {
                $q->where('status', $conditions['status']);
            })
            ->when(isset($conditions['payment_status']), function ($q) use ($conditions) {
                $q->where('payment_status', $conditions['payment_status']);
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