<?php

namespace App\Http\Requests\Group;

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
            'code' => 'required|unique:group',
            'nameGroup' => 'required',
            'slugGroup' => 'unique:group',
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
        ];
    }

    public function messages(){
        return [
            'code.required' => 'Trường Không Được Để Trống!',
            'code.unique' => 'Mã Đã Tồn Tại!',
            'nameGroup.required' => 'Trường Không Được Để Trống!',
            'slugGroup.unique' => 'Danh Mục Đã Tồn Tại!',
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
        ];
    }
}
