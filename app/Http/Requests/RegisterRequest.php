<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required',
            'phone' => ['required', 'regex:/^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/'],
            'address' => 'nullable',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|max:32',
            'confirm_password' => 'required|same:password',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên',
            'phone.required' => 'Vui lòng nhập SĐT',
            'phone.regex' => 'SĐT không hợp lệ',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email không hợp lệ',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Vui lòng nhập mạt khẩu',
            'password.min' => 'Mật khẩu quá ngắn (> 8 ký tự)',
            'password.max' => 'Mật khẩu quá dài (< 32 ký tự)',
            'confirm_password.required' => 'Vui lòng nhập mật khẩu xác nhận',
            'confirm_password.same' => 'Mật khẩu xác nhận không khớp',
        ];
    }
}
