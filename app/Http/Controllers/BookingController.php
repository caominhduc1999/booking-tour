<?php

namespace App\Http\Controllers;

use App\Http\Requests\Booking\StoreBookingRequest;
use App\Http\Requests\Booking\UpdateBookingRequest;
use Illuminate\Http\Request;
use App\Services\BookingService;
use App\Services\DiscountService;
use App\Services\HotelService;
use App\Services\TourService;
use App\Services\UserService;

class BookingController extends Controller
{
    protected $bookingService;
    protected $tourService;
    protected $userService;
    protected $discountService;
    protected $hotelService;

    public function __construct(
        BookingService $bookingService,
        TourService $tourService,
        UserService $userService,
        DiscountService $discountService,
        HotelService $hotelService
    ) {
        $this->bookingService = $bookingService;
        $this->tourService = $tourService;
        $this->userService = $userService;
        $this->discountService = $discountService;
        $this->hotelService = $hotelService;
    }
    public function index(Request $request)
    {
        $perPage = 10;
        $conditions = [ 
            'booking_person_name' => $request->booking_person_name,
            'booking_person_phone' => $request->booking_person_phone,
            'booking_person_email' => $request->booking_person_email,
            'tour_id' => $request->tour_id,
            'booking_date' => $request->booking_date,
            'start_date' => $request->start_date,
            'status' => $request->status,
            'payment_status' => $request->payment_status,
        ];
        $bookings = $this->bookingService->paginate($perPage, $conditions);
        $tours = $this->tourService->getAll();
        $hotels =  $this->hotelService->getAll();

        return view('admin.pages.booking.index', compact('bookings', 'tours', 'hotels'));
    }

    public function create()
    {
        $tours = $this->tourService->getAll();
        $users = $this->userService->getAll();
        $discounts = $this->discountService->getAll();
        $hotels =  $this->hotelService->getAll();

        return view('admin.pages.booking.create', compact('tours', 'users', 'discounts', 'hotels'));
    }

    public function store(StoreBookingRequest $request)
    {
        $result = $this->bookingService->store($request->all());

        $messages = [
            'success' => 'Thêm mới thành công',
            'error' => 'Thêm mới thất bại'
        ];
        $notify = $this->notify($result, $messages);

        return redirect()->route('bookings.index')->with($notify);
    }

    public function edit($id)
    {
        $booking = $this->bookingService->find($id);
        $tours = $this->tourService->getAll();
        $discounts = $this->discountService->getAll();
        $hotels =  $this->hotelService->getAll();

        return view('admin.pages.booking.edit', compact('booking', 'tours', 'discounts', 'hotels'));
    }

    public function update(Request $request, $id)
    {
        $result = $this->bookingService->update($id, $request->all());

        $messages = [
            'success' => 'Sửa thành công',
            'error' => 'Sửa thất bại'
        ];
        $notify = $this->notify($result, $messages);

        return redirect()->route('bookings.index')->with($notify);
    }

    public function destroy($id)
    {
        $result = $this->bookingService->delete($id);

        $messages = [
            'success' => 'Xóa thành công',
            'error' => 'Xóa thất bại'
        ];
        $notify = $this->notify($result, $messages);

        return redirect()->route('bookings.index')->with($notify);
    }
}
