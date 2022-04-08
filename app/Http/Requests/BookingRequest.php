<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
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
            'start_date' => 'required',
            'adult_number' => 'required|min:0',
            'children_number' => 'required|min:0',
            'baby_number' => 'required|min:0',
            'booking_person_name' => 'required',
            'booking_person_phone' => 'required',
            'booking_person_email' => 'required|email',
        ];
    }

    public function messages()
    {
        return [
            'start_date.required' => 'Vui lòng nhập ngày khởi hành',
            'adult_number.required' => 'Vui lòng nhập số lượng người lớn',
            'adult_number.min' => 'Số lượng không hợp lệ',
            'children_number.required' => 'Vui lòng nhập số lượng trẻ em',
            'children_number.min' => 'Số lượng không hợp lệ',
            'baby_number.required' => 'Vui lòng nhập số lượng trẻ nhỏ',
            'baby_number.min' => 'Số lượng không hợp lệ',
            'booking_person_name.required' => 'Vui lòng nhập tên',
            'booking_person_phone.required' => 'Vui lòng nhập SĐT',
            'booking_person_email.required' => 'Vui lòng nhập email',
            'booking_person_email.email' => 'Email không hợp lệ',
        ];
    }
}
