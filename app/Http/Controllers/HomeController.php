<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\BookingRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\ArticleService;
use App\Services\BookingService;
use App\Services\CategoryService;
use App\Services\DiscountService;
use App\Services\HotelService;
use App\Services\TagService;
use Illuminate\Http\Request;
use App\Services\TourService;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    protected $tourService;
    protected $articleService;
    protected $categoryService;
    protected $tagService;
    protected $userService;
    protected $discountService;
    protected $hotelService;
    protected $bookingService;

    public function __construct(
        TourService $tourService,
        ArticleService $articleService,
        CategoryService $categoryService,
        TagService $tagService,
        UserService $userService,
        DiscountService $discountService,
        HotelService $hotelService,
        BookingService $bookingService
    ) {
        $this->tourService = $tourService;
        $this->articleService = $articleService;
        $this->categoryService = $categoryService;
        $this->tagService = $tagService;
        $this->userService = $userService;
        $this->discountService = $discountService;
        $this->hotelService = $hotelService;
        $this->bookingService = $bookingService;
    }

    public function index()
    {
        $tours = $this->tourService->getFeatureTours();
        $articles = $this->articleService->getLatestArticlesByLimit(2);

        return view('client.index', compact('tours', 'articles'));
    }

    public function tourList(Request $request)
    {
        $tours = $this->tourService->findByCondition($request->all(), 6);

        $latestTours = $this->tourService->getLatestTourByLimit(3);

        return view('client.tour_list', compact('tours', 'latestTours'));
    }

    public function tourDetail($id)
    {
        $tour = $this->tourService->find($id);

        return view('client.tour_detail', compact('tour'));
    }

    public function articleList(Request $request)
    {
        $categories = $this->categoryService->getAll();
        $latestArticles = $this->articleService->getLatestArticlesByLimit(3);
        $tags = $this->tagService->getAll();
        if (isset($request->category_id)) {
            $articles = $this->articleService->getByCategoryId($request->category_id, 6);
        } elseif (isset($request->tag_id)) {
            $articles = $this->articleService->getByTagId($request->tag_id, 6);
        } elseif (isset($request->search)) {
            $articles = $this->articleService->search($request->search, 6);
        } else {
            $articles = $this->articleService->getPaginate(4);
        }

        return view('client.article_list', compact('articles', 'categories', 'latestArticles', 'tags'));
    }

    public function articleDetail($id)
    {
        $article = $this->articleService->find($id);
        $categories = $this->categoryService->getAll();
        $latestArticles = $this->articleService->getLatestArticlesByLimit(3);
        $tags = $this->tagService->getAll();

        return view('client.article_detail',  compact('article', 'categories', 'latestArticles', 'tags'));
    }

    public function getLogin()
    {
        return view('client.login');
    }

    public function postLogin(LoginRequest $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember_me)) {
            $user = $this->userService->findByField('email', $request->email)->first();
            if ($user->role == 2) {
                return redirect('/');
            } else {
                return redirect()->back()->with('notify', 'Sai email hoặc mật khẩu');
            }
        } else {
            return redirect()->back()->with('notify', 'Sai email hoặc mật khẩu');
        }
    }

    public function booking($tourId)
    {
        $tour = $this->tourService->find($tourId);

        return view('client.booking', compact('tour'));
    }

    public function confirmBooking(BookingRequest $request, $tourId)
    {
        $tour = $this->tourService->find($tourId);
        $booking = $request;
        $hotel = $request->hotel_id ? $this->hotelService->find($request->hotel_id) : null;

        return view('client.confirm_booking', compact('tour', 'booking', 'hotel'));
    }

    public function getRegister()
    {
        return view('client.register');
    }

    public function postRegister(RegisterRequest $request)
    {
        $data = $request->all();
        $data['role'] = 2;
        $result = $this->userService->store($data);
        if ($result) {
            return redirect('/login')->with('notify', 'Đăng ký thành công');
        }

        return redirect('/login')->with('notify', 'Đăng ký thất bại');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }

    public function getDiscount($code)
    {
        $discount = $this->discountService->findByField('code', $code)->first();
        if ($discount->start_date <= date('Y-m-d') && $discount->end_date >= date('Y-m-d') && $discount->remain_number > 0) {
            return response()->json([
                'status' => true,
                'discount_rate' => $discount->discount_rate
            ]);
        }
        
        return response()->json(['status' => false]);
    }

    public function completeBooking(Request $request)
    {
        if ($request->resultCode == '0')
        {
            $extraData = unserialize(urldecode($request->extraData));
            $email = $extraData['email'];

            // send mail booking
            return view('client.complete_booking', compact('email'));

        } else {
            $extraData = unserialize(urldecode($request->extraData));
            $booking = $this->bookingService->find($extraData['booking_id']);
            $booking->delete();
            return redirect()->with('notify', 'Thanh toán thất bại.');
        }
    }

    public function momoPayment(Request $request)
    {
        $bookingData['tour_id'] = $request->tour_id;
        $bookingData['user_id'] = Auth::check() ? Auth::user()->id : null;
        $bookingData['hotel_id'] = $request->hotel_id;
        $bookingData['booking_person_phone'] = $request->booking_person_phone;
        $bookingData['booking_person_name'] = $request->booking_person_name;
        $bookingData['booking_person_email'] = $request->booking_person_email;
        $bookingData['booking_person_address'] = $request->booking_person_address;
        $bookingData['total_price'] = $request->booking_price;
        $bookingData['start_date'] = $request->start_date;
        $bookingData['adult_number'] = $request->adult_number;
        $bookingData['children_number'] = $request->children_number;
        $bookingData['baby_number'] = $request->baby_number;
        $bookingData['discount_id'] = $request->discount_id;
        $bookingData['note'] = $request->note;
        $bookingData['status'] = 1;
        $bookingData['payment_status'] = 1;
        $bookingData['payment'] = 3;

        $newBooking = $this->bookingService->store($bookingData);

        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán qua MoMo";
        $amount = $request->booking_price;
        $orderId = time() ."";
        $redirectUrl = "http://localhost:8000/complete-booking";
        $ipnUrl = "https://webhook.site/b3088a6a-2d17-4f8d-a383-71389a6c600b";
        $extraData = urlencode(serialize([
            'booking_id' => $newBooking->id,
            'email' => $request->booking_person_email
        ]));

        $requestId = time() . "";
        $requestType = "payWithATM";

        //before sign HMAC SHA256 signature
        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $secretKey);

        $data = array('partnerCode' => $partnerCode,
            'partnerName' => "Test",
            "storeId" => "MomoTestStore",
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature,
        );
        $result = $this->execPostRequest($endpoint, json_encode($data));
        $jsonResult = json_decode($result, true);  // decode json

        //Just a example, please check more in there
        return redirect()->to($jsonResult['payUrl']);
    }

    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data))
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }
}
