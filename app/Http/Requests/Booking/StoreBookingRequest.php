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
            'tour_id.required' => 'Vui l??ng ch???n tour',
            'start_date.required' => 'Vui l??ng nh???p ng??y kh???i h??nh',
            'adult_number.required' => 'Vui l??ng nh???p s??? l?????ng ng?????i l???n',
            'children_number.required' => 'Vui l??ng nh???p s??? l?????ng tr??? em',
            'baby_number.required' => 'Vui l??ng nh???p s??? l?????ng tr??? s?? sinh',
            'adult_number.numeric' => 'S??? l?????ng kh??ng h???p l???',
            'children_number.numeric' => 'S??? l?????ng kh??ng h???p l???',
            'baby_number.numeric' => 'S??? l?????ng kh??ng h???p l???',
            'adult_number.min' => 'S??? l?????ng kh??ng h???p l???',
            'children_number.min' => 'S??? l?????ng kh??ng h???p l???',
            'baby_number.min' => 'S??? l?????ng kh??ng h???p l???',
            'booking_person_name.required' => 'Vui l??ng nh???p t??n ng?????i ?????t',
            'booking_person_phone.required' => 'Vui l??ng nh???p S??T ng?????i ?????t',
            'booking_person_email.required' => 'Vui l??ng nh???p email ng?????i ?????t',
            'booking_person_address.required' => 'Vui l??ng nh???p ?????a ch??? ng?????i ?????t',
            'payment.required' => 'Vui l??ng nh???p h??nh th???c thanh to??n',
            'people_limit.max' => 'L???ch kh???i h??nh b???n ch???n ch??? c??n ' . $remainSlot . ' ch???'
        ];
    }
}
