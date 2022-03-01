<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Discount\StoreDiscountRequest;
use App\Http\Requests\Discount\UpdateDiscountRequest;
use App\Services\DiscountService;

class DiscountController extends Controller
{
    protected $discountService;

    public function __construct(DiscountService $discountService)
    {
        $this->discountService = $discountService;
    }
    public function index(Request $request)
    {
        $perPage = 10;
        $conditions = [
            'code' => $request->code,
            'start_date_from' => $request->start_date_from,
            'start_date_to' => $request->start_date_to,
            'end_date_from' => $request->end_date_from,
            'end_date_to' => $request->end_date_to,
            'remain_number_from' => $request->remain_number_from,
            'remain_number_to' => $request->remain_number_to,
            'discount_rate_from' => $request->discount_rate_from,
            'discount_rate_to' => $request->discount_rate_to,
        ];
        $discounts = $this->discountService->paginate($perPage, $conditions);

        return view('admin.pages.discount.index', compact('discounts'));
    }

    public function create()
    {
        return view('admin.pages.discount.create');
    }

    public function store(StoreDiscountRequest $request)
    {
        $result = $this->discountService->store($request->all());

        $messages = [
            'success' => 'Thêm mới thành công',
            'error' => 'Thêm mới thất bại'
        ];
        $notify = $this->notify($result, $messages);

        return redirect()->route('discounts.index')->with($notify);
    }

    public function edit($id)
    {
        $discount = $this->discountService->find($id);

        return view('admin.pages.discount.edit', compact('discount'));
    }

    public function update(UpdateDiscountRequest $request, $id)
    {
        $result = $this->discountService->update($id, $request->all());

        $messages = [
            'success' => 'Sửa thành công',
            'error' => 'Sửa thất bại'
        ];
        $notify = $this->notify($result, $messages);

        return redirect()->route('discounts.index')->with($notify);
    }

    public function destroy($id)
    {
        $result = $this->discountService->delete($id);

        $messages = [
            'success' => 'Xóa thành công',
            'error' => 'Xóa thất bại'
        ];
        $notify = $this->notify($result, $messages);

        return redirect()->route('discounts.index')->with($notify);
    }
}
