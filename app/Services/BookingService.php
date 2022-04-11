<?php

namespace App\Services;

use App\Mail\BookingInformation;
use App\Repositories\Booking\BookingRepository;
use App\Repositories\Discount\DiscountRepository;
use App\Repositories\Hotel\HotelRepository;
use App\Repositories\Tour\TourRepository;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class BookingService {
    protected $bookingRepository;
    protected $tourRepository;
    protected $discountRepository;
    protected $hotelRepository;
    
    public function __construct(
        BookingRepository $bookingRepository,
        TourRepository $tourRepository,
        DiscountRepository $discountRepository,
        HotelRepository $hotelRepository
    ) {
        $this->bookingRepository = $bookingRepository;   
        $this->tourRepository = $tourRepository;
        $this->discountRepository = $discountRepository;
        $this->hotelRepository = $hotelRepository;
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
            if (isset($data['discount_id'])) {
                $discount = $this->discountRepository->find($data['discount_id']);
                if ($discount) {
                    $data['total_price'] = $data['total_price'] * (1 - $discount->discount_rate);
                }
            }

            if (isset($data['hotel_id'])) {
                $hotel = $this->hotelRepository->find($data['hotel_id']);
                $data['total_price'] = $data['total_price'] + $hotel->price_per_day * $tour->days + $hotel->price_per_night * $tour->nights;
            }

            $data['start_date'] = Carbon::createFromFormat('d/m/Y', $data['start_date'])->format('Y-m-d');
            $data['booking_date'] = now()->format('Y-m-d');
            $booking = $this->bookingRepository->store($data);
            Mail::to($data['booking_person_email'])->send(new BookingInformation($booking));

            return $booking;
        } catch (Exception $e){
            Log::info($e->getMessage());
            
            return false;
        }     
    }

    public function update($id, $data) 
    {
        try {
            $tour = $this->tourRepository->find($data['tour_id']);
            $adultPrice = $tour->adult_price * $data['adult_number'];
            $childrenPrice = $tour->children_price * $data['children_number'];
            $babyPrice = $tour->baby_price * $data['baby_number'];

            $data['total_price'] = $adultPrice + $childrenPrice + $babyPrice;
            if (isset($data['discount_id'])) {
                
                $discount = $this->discountRepository->find($data['discount_id']);
                if ($discount) {
                    $data['total_price'] = $data['total_price'] * (1 - $discount->discount_rate);
                }
            }
            
            if (isset($data['hotel_id'])) {
                $hotel = $this->hotelRepository->find($data['hotel_id']);
                $data['total_price'] = $data['total_price'] + $hotel->price_per_day * $tour->days + $hotel->price_per_night * $tour->nights;
            }
            $data['start_date'] = Carbon::createFromFormat('d/m/Y', $data['start_date'])->format('Y-m-d');
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

    public function getRevenue($date)
    {
        return $this->bookingRepository->getRevenue($date);
    }

    public function getNewBookings()
    {
        return $this->bookingRepository->getNewBookings();
    }

    public function getTourCount($date)
    {
        return $this->bookingRepository->getTourCount($date);
    }
}