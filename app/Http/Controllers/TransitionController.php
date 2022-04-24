<?php

namespace App\Http\Controllers;

use App\Services\TagService;
use Illuminate\Http\Request;
use App\Services\TransitionService;

class TransitionController extends Controller
{
    protected $transitionService;

    public function __construct(TransitionService $transitionService)
    {
        $this->transitionService = $transitionService;
    }

    public function index(Request $request)
    {
        $perPage = 10;
        $conditions = [
            'transaction_code' => $request->transaction_code,
            'payment_method' => $request->payment_method
        ];
        $transitions = $this->transitionService->paginate($perPage, $conditions);

        return view('admin.pages.transition.index', compact('transitions'));
    }
}
