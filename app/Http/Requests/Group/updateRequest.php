<?php

namespace App\Http\Requests\Group;

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
            'code' => 'required',
            'nameGroup' => 'required',
            'name_user_group' => 'required',
            'linkGroup' => 'required',
            'category' => 'required',
            'idCategory' => 'required',
            'account_group' => 'required',
            'account_group_week' => 'required|numeric',
            'account_group_blog' => 'required|numeric',
            'rent_cost' => 'required|numeric',
            'price' => 'required|numeric',
            'type_sale' => 'required',
            'status_color' => 'required',
            'status' => 'required',
            'type' => 'required',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10000',
        ];
    }

    public function messages(){
        return [
            'code.required' => 'Trường Không Được Để Trống!',
            'nameGroup.required' => 'Trường Không Được Để Trống!',
            'name_user_group.required' => 'Trường Không Được Để Trống!',
            'linkGroup.required' => 'Trường Không Được Để Trống!',
            'category.required' => 'Trường Không Được Để Trống!',
            'idCategory.required' => 'Trường Không Được Để Trống!',
            'account_group.required' => 'Trường Không Được Để Trống!',
            'account_group_week.required' => 'Trường Không Được Để Trống!',
            'account_group_blog.required' => 'Trường Không Được Để Trống!',
            'account_group_week.numeric' => 'Trường Phải Là Số!',
            'account_group_blog.numeric' => 'Trường Phải Là Số!',
            'rent_cost.required' => 'Trường Không Được Để Trống!',
            'rent_cost.numeric' => 'Trường Phải Là Số!',
            'price.required' => 'Trường Không Được Để Trống!',
            'price.numeric' => 'Trường Phải Là Số!',
            'type_sale.required' => 'Trường Không Được Để Trống!',
            'status_color.required' => 'Trường Không Được Để Trống!',
            'status.required' => 'Trường Không Được Để Trống!',
            'type.required' => 'Trường Không Được Để Trống!',
            'file.image' => 'Trường phải là một hình ảnh.',
            'file.mimes' => 'Chỉ chấp nhận các định dạng hình ảnh là jpeg, png, jpg, gif.',
            'file.max' => 'Kích thước tệp hình ảnh không được vượt quá 10 megabytes.',
        ];
    }
}
