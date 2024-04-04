<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;

class updateRequest extends FormRequest
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
            'phone' =>  ['required', 'regex:/^(03|05|07|08|09)+([0-9]{8})\b/'],
        ];
    }

    public function messages(){
        return [
            'fullName.required' => 'Trường Không Được Để Trống!',
            'phone.required' => 'Phone Không Được Để Trống!',
            'phone.regex' => 'Sai Định Dạng Phone!',
        ];
    }
}
