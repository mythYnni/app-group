<?php

namespace App\Http\Requests\Category;

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
            'name' => 'required',
            'slug' => 'required',
            'status' => 'required',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Trường không được để trống!',
            'slug.required' => 'Trường không được để trống!',
            'status.required' => 'Trạng thái là bắt buộc!',
        ];
    }
}
