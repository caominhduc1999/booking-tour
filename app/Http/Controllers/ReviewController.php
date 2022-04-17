<?php

namespace App\Http\Controllers;

use App\Services\ReviewService;
use App\Services\TourService;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    protected $reviewService;
    protected $tourService;

    public function __construct(ReviewService $reviewService, TourService $tourService)
    {
        $this->reviewService = $reviewService;
        $this->tourService = $tourService;
    }

    public function index(Request $request)
    {
        $perPage = 10;
        $conditions = [
            'tour_id' => $request->tour_id,
            'stars' => $request->stars
        ];
        $reviews = $this->reviewService->paginate($perPage, $conditions);
        $tours = $this->tourService->getAll();

        return view('admin.pages.review.index', compact('reviews', 'tours'));
    }

    public function update(Request $request, $id)
    {
        $data = [
            'is_show' => $request->is_show == 1 ? 2 : 1
        ];
        $result = $this->reviewService->update($id, $data);

        $messages = [
            'success' => 'Sửa thành công',
            'error' => 'Sửa thất bại'
        ];
        $notify = $this->notify($result, $messages);

        return redirect()->route('reviews.index')->with($notify);
    }
}
