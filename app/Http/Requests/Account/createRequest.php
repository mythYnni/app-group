<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;

class createRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'fullName' => 'required',
            'phone' =>  ['required', 'regex:/^(03|05|07|08|09)+([0-9]{8})\b/','unique:users'],
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'check_password' => 'required|same:password|min:8',
            'sex' => 'required',
        ];
    }

    public function messages(){
        return [
            'fullName.required' => 'Trường Không Được Để Trống!',
            'email.unique' => 'Email Đã Tồn Tại!',
            'email.required' => 'Trường Không Được Để Trống!',
            'email.email' => 'Sai Định Dạng Email!',
            'phone.unique' => 'Trường Đã Tồn Tại!',
            'phone.required' => 'Phone Không Được Để Trống!',
            'phone.regex' => 'Sai Định Dạng Phone!',
            'password.required' => 'Trường Không Được Để Trống!',
            'password.min' => 'Mật khẩu của bạn phải có từ 8 đến 30 ký tự.',
            'password.confirmed' => 'Xác Nhận Mật Khẩu Không Khớp.!',
            'check_password.required' => 'Trường Không Được Để Trống!',
            'check_password.min' => 'Mật khẩu của bạn phải có từ 8 đến 30 ký tự.',
            'check_password.same' => 'Xác Nhận Mật Khẩu Không Khớp.!',
            'sex.required' => 'Giới tính là bắt buộc!',
        ];
    }
}
