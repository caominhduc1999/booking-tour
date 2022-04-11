<?php

namespace App\Http\Requests\Booking;

use App\Models\Tour;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBookingRequest extends FormRequest
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
            'tour_id' => 'required',
            'start_date' => 'required',
            'adult_number' => 'required|numeric|min:0',
            'children_number' => 'required|numeric|min:0',
            'baby_number' => 'required|numeric|min:0',
            'booking_person_phone' => 'required',
            'booking_person_name' => 'required',
            'booking_person_email' => 'required',
            'booking_person_address' => 'nullable',
            // 'payment' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'tour_id.required' => 'Vui lòng chọn tour',
            'start_date.required' => 'Vui lòng nhập ngày khởi hành',
            'adult_number.required' => 'Vui lòng nhập số lượng người lớn',
            'children_number.required' => 'Vui lòng nhập số lượng trẻ em',
            'baby_number.required' => 'Vui lòng nhập số lượng trẻ sơ sinh',
            'adult_number.numeric' => 'Số lượng không hợp lệ',
            'children_number.numeric' => 'Số lượng không hợp lệ',
            'baby_number.numeric' => 'Số lượng không hợp lệ',
            'adult_number.min' => 'Số lượng không hợp lệ',
            'children_number.min' => 'Số lượng không hợp lệ',
            'baby_number.min' => 'Số lượng không hợp lệ',
            'booking_person_name.required' => 'Vui lòng nhập tên người đặt',
            'booking_person_phone.required' => 'Vui lòng nhập SĐT người đặt',
            'booking_person_email.required' => 'Vui lòng nhập email người đặt',
            'booking_person_address.required' => 'Vui lòng nhập địa chỉ người đặt',
            // 'payment.required' => 'Vui lòng nhập hình thức thanh toán',
        ];
    }
}
