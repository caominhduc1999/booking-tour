<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TourService;
use App\Http\Requests\Tour\StoreTourRequest;
use App\Http\Requests\Tour\UpdateTourRequest;
use App\Services\HotelService;
use App\Services\TourGuideService;

class TourController extends Controller
{
    protected $tourService;
    protected $tourGuideService;
    protected $hotelService;

    public function __construct(
        TourService $tourService,
        TourGuideService $tourGuideService,
        HotelService $hotelService
    ) {
        $this->tourService = $tourService;
        $this->tourGuideService = $tourGuideService;
        $this->hotelService = $hotelService;
    }

    public function index(Request $request)
    {
        $perPage = 10;
        $conditions = [ 
            'name' => $request->name,
            'code' => $request->code,
            'tour_guide_id' => $request->tour_guide_id,
            'hotel_id' => $request->hotel_id,
            'frequency' => $request->frequency,
            'is_feature' => $request->is_feature,
            'people_limit_from' => $request->people_limit_from,
            'people_limit_to' => $request->people_limit_to,
            'days_from' => $request->days_from,
            'days_to' => $request->days_to,
            'type' => $request->type,
            'departure' => $request->departure,
            'destination' => $request->destination,
            'adult_price_from' => $request->adult_price_from,
            'adult_price_to' => $request->adult_price_to,
            'children_price_from' => $request->children_price_from,
            'children_price_to' => $request->children_price_to,
            'baby_price_from' => $request->baby_price_from,
            'baby_price_to' => $request->baby_price_to,
        ];
        $tours = $this->tourService->paginate($perPage, $conditions);
        $tourGuides = $this->tourGuideService->getAll();
        $hotels = $this->hotelService->getAll();

        return view('admin.pages.tour.index', compact('tours', 'tourGuides', 'hotels'));
    }

    public function create()
    {
        $tourGuides = $this->tourGuideService->getAll();
        $hotels = $this->hotelService->getAll();

        return view('admin.pages.tour.create', compact('tourGuides', 'hotels'));
    }

    public function store(StoreTourRequest $request)
    {
        $result = $this->tourService->store($request->all());

        $messages = [
            'success' => 'Th??m m???i th??nh c??ng',
            'error' => 'Th??m m???i th???t b???i'
        ];
        $notify = $this->notify($result, $messages);

        return redirect()->route('tours.index')->with($notify);
    }

    public function edit($id)
    {
        $tour = $this->tourService->find($id);
        $initialHotelIds = $tour->hotels->pluck('id')->toArray();
        $tourGuides = $this->tourGuideService->getAll();
        $hotels = $this->hotelService->getAll();

        return view('admin.pages.tour.edit', compact('tour', 'initialHotelIds', 'tourGuides', 'hotels'));
    }

    public function update(UpdateTourRequest $request, $id)
    {
        $result = $this->tourService->update($id, $request->all());

        $messages = [
            'success' => 'S???a th??nh c??ng',
            'error' => 'S???a th???t b???i'
        ];
        $notify = $this->notify($result, $messages);

        return redirect()->route('tours.index')->with($notify);
    }

    public function destroy($id)
    {
        $result = $this->tourService->delete($id);

        $messages = [
            'success' => 'X??a th??nh c??ng',
            'error' => 'X??a th???t b???i'
        ];
        $notify = $this->notify($result, $messages);

        return redirect()->route('tours.index')->with($notify);
    }
}
