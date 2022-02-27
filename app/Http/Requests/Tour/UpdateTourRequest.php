<?php

namespace App\Http\Requests\Tour;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTourRequest extends FormRequest
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
            'image' => 'image|mimes:jpg,jpeg,png,gif',
            'code' => 'required|unique:tours,code,' . $this->route()->tour,
            'name' => 'required',
            'departure' => 'required',
            'destination' => 'required',
            'people_limit' => 'required|numeric|min:0',
            'days' => 'required|numeric|min:0',
            'adult_price' => 'required|numeric|min:0',
            'children_price' => 'required|numeric|min:0',
            'baby_price' => 'required|numeric|min:0',
            'type' => 'required',
            'frequency' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'image.image' => 'Ảnh không hợp lệ',
            'image.mimes' => 'Ảnh không đúng định dạng',
            'code.required' => 'Vui lòng nhập mã tour',
            'code.unique' => 'Mã tour đã tồn tại',
            'departure.required' => 'Vui lòng nhập điểm khởi hành',
            'destination.required' => 'Vui lòng nhập điểm đến',
            'people_limit.required' => 'Vui lòng nhập số người giới hạn',
            'days.required' => 'Vui lòng nhập số ngày',
            'adult_price.required' => 'Vui lòng nhập giá tiền người lớn',
            'children_price.required' => 'Vui lòng giá tiền trẻ em',
            'baby_price.required' => 'Vui lòng nhập giá tiền trẻ sơ sinh',
            'type.required' => 'Vui lòng nhập loại tour',
            'frequency.required' => 'Vui lòng nhập tần suất tour',
            'people_limit.min' => 'Số người giới hạn không hợp lệ',
            'days.min' => 'Số ngày không hợp lệ',
            'adult_price.min' => 'Giá tiền không hợp lệ',
            'children_price.min' => 'Giá tiền không hợp lệ',
            'baby_price.min' => 'Giá tiền không hợp lệ',
            'people_limit.numeric' => 'Số người giới hạn không hợp lệ',
            'days.numeric' => 'Số ngày không hợp lệ',
            'adult_price.numeric' => 'Giá tiền không hợp lệ',
            'children_price.numeric' => 'Giá tiền không hợp lệ',
            'baby_price.numeric' => 'Giá tiền không hợp lệ',
        ];
    }
}
