<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TourGuide\StoreTourGuideRequest;
use App\Http\Requests\TourGuide\UpdateTourGuideRequest;
use App\Services\TourGuideService;

class TourGuideController extends Controller
{
    protected $tourGuideService;

    public function __construct(TourGuideService $tourGuideService)
    {
        $this->tourGuideService = $tourGuideService;
    }
    public function index(Request $request)
    {
        $perPage = 10;
        $conditions = [
            'name' => $request->name,
            'phone' => $request->phone
        ];
        $tourGuides = $this->tourGuideService->paginate($perPage, $conditions);

        return view('admin.pages.tour-guide.index', compact('tourGuides'));
    }

    public function create()
    {
        return view('admin.pages.tour-guide.create');
    }

    public function store(StoreTourGuideRequest $request)
    {
        $result = $this->tourGuideService->store($request->all());

        $messages = [
            'success' => 'Thêm mới thành công',
            'error' => 'Thêm mới thất bại'
        ];
        $notify = $this->notify($result, $messages);

        return redirect()->route('tour-guides.index')->with($notify);
    }

    public function edit($id)
    {
        $tourGuide = $this->tourGuideService->find($id);

        return view('admin.pages.tour-guide.edit', compact('tourGuide'));
    }

    public function update(UpdateTourGuideRequest $request, $id)
    {
        $result = $this->tourGuideService->update($id, $request->all());

        $messages = [
            'success' => 'Sửa thành công',
            'error' => 'Sửa thất bại'
        ];
        $notify = $this->notify($result, $messages);

        return redirect()->route('tour-guides.index')->with($notify);
    }

    public function destroy($id)
    {
        $result = $this->tourGuideService->delete($id);

        $messages = [
            'success' => 'Xóa thành công',
            'error' => 'Xóa thất bại'
        ];
        $notify = $this->notify($result, $messages);

        return redirect()->route('tour-guides.index')->with($notify);
    }
}
