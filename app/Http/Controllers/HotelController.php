<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Hotel\StoreHotelRequest;
use App\Http\Requests\Hotel\UpdateHotelRequest;
use App\Services\HotelService;

class HotelController extends Controller
{
    protected $hotelService;

    public function __construct(HotelService $hotelService)
    {
        $this->hotelService = $hotelService;
    }
    public function index(Request $request)
    {
        $perPage = 10;
        $conditions = [
            'name' => $request->name,
            'hotline' => $request->hotline
        ];
        $hotels = $this->hotelService->paginate($perPage, $conditions);

        return view('admin.pages.hotel.index', compact('hotels'));
    }

    public function create()
    {
        return view('admin.pages.hotel.create');
    }

    public function store(StoreHotelRequest $request)
    {
        $result = $this->hotelService->store($request->all());

        $messages = [
            'success' => 'Thêm mới thành công',
            'error' => 'Thêm mới thất bại'
        ];
        $notify = $this->notify($result, $messages);

        return redirect()->route('hotels.index')->with($notify);
    }

    public function edit($id)
    {
        $hotel = $this->hotelService->find($id);

        return view('admin.pages.hotel.edit', compact('hotel'));
    }

    public function update(UpdateHotelRequest $request, $id)
    {
        $result = $this->hotelService->update($id, $request->all());

        $messages = [
            'success' => 'Sửa thành công',
            'error' => 'Sửa thất bại'
        ];
        $notify = $this->notify($result, $messages);

        return redirect()->route('hotels.index')->with($notify);
    }

    public function destroy($id)
    {
        $result = $this->hotelService->delete($id);

        $messages = [
            'success' => 'Xóa thành công',
            'error' => 'Xóa thất bại'
        ];
        $notify = $this->notify($result, $messages);

        return redirect()->route('hotels.index')->with($notify);
    }
}
