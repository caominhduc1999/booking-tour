<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
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
            'password' => 'required|min:8',
            'password_confirm' => 'required|same:password'
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password_confirm.required' => 'Vui lòng nhập mật khẩu xác nhận',
            'password_confirm.same' => 'Mật khẩu xác nhận không khớp',
            'password.min' => 'Mật khẩu phải > 8 ký tự',
        ];
    }
}
