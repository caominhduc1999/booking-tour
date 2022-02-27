<?php

namespace App\Http\Requests\Discount;

use Illuminate\Foundation\Http\FormRequest;

class StoreDiscountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'code' => 'required|unique:discounts,code',
            'start_date' => 'required|date|before_or_equal:end_date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'remain_number' => 'required|numeric|min:0',
            'discount_rate' => 'required|numeric|min:0'
        ];
    }

    public function messages()
    {
        return [
            'code.required' => 'Vui lòng nhập mã giảm giá',
            'code.unique' => 'Mã giảm giá đã tồn tại',
            'start_date.required' => 'Vui lòng nhập ngày bắt đầu',
            'end_date.required' => 'Vui lòng nhập ngày kết thúc',
            'start_date.before_or_equal' => 'Ngày bắt đầu phải <= ngày kết thúc',
            'end_date.after_or_equal' => 'Ngày kết thúc phải >= ngày bắt đầu',
            'remain_number.required' => 'Vui lòng nhập số lượng',
            'remain_number.numeric' => 'Số lượng không hợp lệ',
            'remain_number.min' => 'Số lượng không hợp lệ',
            'discount_rate.required' => 'Vui lòng nhập % giảm giá',
            'discount_rate.numeric' => '% giảm giá không hợp lệ',
            'discount_rate.min' => '% giảm giá không hợp lệ',
        ];
    }
}
