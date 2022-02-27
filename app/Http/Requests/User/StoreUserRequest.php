<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'phone' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8',
            'password_confirm' => 'required|same:password',
            'role' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên',
            'phone.required' => 'Vui lòng nhập SĐT',
            'email.required' => 'Vui lòng nhập email',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password_confirm.required' => 'Vui lòng nhập mật khẩu xác nhận',
            'password_confirm.same' => 'Mật khẩu xác nhận không khớp',
            'password.min' => 'Mật khẩu phải > 8 ký tự',
            'role.required' => 'Vui lòng chọn vai trò'
        ];
    }
}
