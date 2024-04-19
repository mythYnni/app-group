<?php

namespace App\Http\Requests\Blog;

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
            'name' => 'required',
            'slug' => 'unique:blog',
            'detail' => 'required',
            'status' => 'required',
            'file' => 'required|nullable|image|mimes:jpeg,png,jpg,gif|max:10000',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Trường không được để trống!',
            'slug.unique' => 'Danh mục đã tồn tại!',
            'status.required' => 'Trạng thái là bắt buộc!',
            'detail.required' => 'Định dạng là bắt buộc!',
            'file.required' => 'Trường Ảnh Không Được Để Trống',
            'file.image' => 'Trường phải là một hình ảnh.',
            'file.mimes' => 'Chỉ chấp nhận các định dạng hình ảnh là jpeg, png, jpg, gif.',
            'file.max' => 'Kích thước tệp hình ảnh không được vượt quá 10 megabytes.',
        ];
    }
}
