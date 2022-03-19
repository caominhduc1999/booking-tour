<?php

namespace App\Http\Controllers;

use App\Services\ArticleService;
use App\Services\BookingService;
use App\Services\TourService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AdminController extends Controller
{
    protected $bookingService;
    protected $userService;
    protected $tourService;
    protected $articleService;

    public function __construct(
        BookingService $bookingService,
        UserService $userService,
        TourService $tourService,
        ArticleService $articleService
    ) {
        $this->bookingService = $bookingService;
        $this->userService = $userService;
        $this->tourService = $tourService;
        $this->articleService = $articleService;
    }

    public function index()
    {
        $revenue = [];
        $tours = [];
        $now = Carbon::now();
        $month = $now->month;
        $year = $now->year;

        for($d=1; $d<=31; $d++)
        {
            $time = mktime(12, 0, 0, $month, $d, $year);
            if (date('m', $time) == $month)
                $date = date('Y-m-d', $time);
                $revenue[$date] = $this->bookingService->getRevenue($date);
                $tours[$date] = $this->bookingService->getTourCount($date);
        }

        $totalUser = $this->userService->getAll()->count();
        $totalTour = $this->tourService->getAll()->count();
        $totalArticle = $this->articleService->getAll()->count();
        $newBookings = $this->bookingService->getNewBookings()->count();

        return view('admin.pages.index', compact('revenue', 'tours', 'totalUser', 'totalTour', 'totalArticle', 'newBookings'));
    }
}
