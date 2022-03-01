<?php

namespace App\Services;

use App\Repositories\Booking\BookingRepository;
use App\Repositories\Discount\DiscountRepository;
use App\Repositories\Tour\TourRepository;
use Exception;
use Illuminate\Support\Facades\Log;

class BookingService {
    protected $bookingRepository;
    protected $tourRepository;
    protected $discountRepository;
    
    public function __construct(
        BookingRepository $bookingRepository,
        TourRepository $tourRepository,
        DiscountRepository $discountRepository
    ) {
        $this->bookingRepository = $bookingRepository;   
        $this->tourRepository = $tourRepository;
        $this->discountRepository = $discountRepository;
    }

    public function getAll()
    {
        return $this->bookingRepository->all();
    }
    
    public function paginate($perPage, $conditions) 
    {
        return $this->bookingRepository->paginate($perPage, $conditions);
    }

    public function find($id)
    {
        return $this->bookingRepository->findOrFail($id);
    }

    public function store($data) 
    {
        try {
            $tour = $this->tourRepository->find($data['tour_id']);
            $adultPrice = $tour->adult_price * $data['adult_number'];
            $childrenPrice = $tour->children_price * $data['children_number'];
            $babyPrice = $tour->baby_price * $data['baby_number'];

            $data['total_price'] = $adultPrice + $childrenPrice + $babyPrice;
            if ($data['discount_id']) {
                
                $discount = $this->discountRepository->find($data['discount_id']);
                if ($discount) {
                    $data['total_price'] = $data['total_price'] * (1 - $discount->discount_rate);
                }
            }
            $data['booking_date'] = now()->format('Y-m-d');
            $this->bookingRepository->store($data);

            return true;
        } catch (Exception $e){
            Log::info($e->getMessage());
            
            return false;
        }     
    }

    public function update($id, $data) 
    {
        try {
            $this->bookingRepository->update($id, $data);

            return true;
        } catch (Exception $e){
            Log::info($e->getMessage());
            
            return false;
        }     
    }

    public function delete($id) 
    {
        try {
            $booking = $this->bookingRepository->findOrFail($id);
            $booking->delete();

            return true;
        } catch (Exception $e){
            Log::info($e->getMessage());
            
            return false;
        }     
    } 
}