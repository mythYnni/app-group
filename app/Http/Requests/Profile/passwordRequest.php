<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Profile\PasswordRule;

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
            'password_out' => ['required', new PasswordRule],
            'password' => 'required|min:8|different:password_out',
            'check_password' => 'required|same:password',
        ];
    }

    public function messages()
    {
        return [
            'password_out.required' => 'Trường Không Được Để Trống!',
            'password.required' => 'Trường Không Được Để Trống!',
            'password.min' => 'Mật khẩu mới phải có ít nhất 8 ký tự.',
            'password.different' => 'Mật khẩu mới phải khác mật khẩu cũ.',
            'check_password.required' => 'Trường Không Được Để Trống!',
            'check_password.same' => 'Xác Nhận Mật Khẩu Không Khớp.',
        ];
    }
}
