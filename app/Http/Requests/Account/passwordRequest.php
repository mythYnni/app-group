<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;

class passwordRequest extends FormRequest
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
            'password' => 'required|min:8',
            'check_password' => 'required|same:password|min:8',
        ];
    }

    public function messages(){
        return [
            'password.required' => 'Trường Không Được Để Trống!',
            'password.min' => 'Mật khẩu của bạn phải có từ 8 đến 30 ký tự.',
            'password.confirmed' => 'Xác Nhận Mật Khẩu Không Khớp.!',
            'check_password.required' => 'Trường Không Được Để Trống!',
            'check_password.min' => 'Mật khẩu của bạn phải có từ 8 đến 30 ký tự.',
            'check_password.same' => 'Xác Nhận Mật Khẩu Không Khớp.!',
        ];
    }
}
