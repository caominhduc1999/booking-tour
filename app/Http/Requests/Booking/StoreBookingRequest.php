<?php

namespace App\Http\Requests\Booking;

use App\Models\Booking;
use App\Models\Tour;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class StoreBookingRequest extends FormRequest
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
    public function prepareForValidation()
    {
        $this->merge([
            'people_limit' => (request()->adult_number ?? 0) + (request()->children_number) + (request()->baby_number ?? 0),
        ]);
    }

    public function rules()
    {
        $tourSlot = Tour::find(request()->tour_id)->people_limit;
        $sameBooking = Booking::whereDate('start_date', Carbon::createFromFormat('d/m/Y', request()->start_date)->format('Y-m-d'))->where('tour_id', request()->tour_id);
        $adultSlot = $sameBooking->sum('adult_number');
        $childrenSlot = $sameBooking->sum('children_number');
        $babySlot = $sameBooking->sum('baby_number');
        $placedSlot = $adultSlot + $childrenSlot + $babySlot;
        $remainSlot = $tourSlot - $placedSlot;

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
            'payment' => 'required',
            'people_limit' => 'numeric|max:' . $remainSlot
        ];
    }

    public function messages()
    {
        $tourSlot = Tour::find(request()->tour_id)->people_limit;
        $sameBooking = Booking::whereDate('start_date', Carbon::createFromFormat('d/m/Y', request()->start_date)->format('Y-m-d'))->where('tour_id', request()->tour_id);
        $adultSlot = $sameBooking->sum('adult_number');
        $childrenSlot = $sameBooking->sum('children_number');
        $babySlot = $sameBooking->sum('baby_number');
        $placedSlot = $adultSlot + $childrenSlot + $babySlot;
        $remainSlot = $tourSlot - $placedSlot;

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
            'payment.required' => 'Vui lòng nhập hình thức thanh toán',
            'people_limit.max' => 'Lịch khởi hành bạn chọn chỉ còn ' . $remainSlot . ' chỗ'
        ];
    }
}
