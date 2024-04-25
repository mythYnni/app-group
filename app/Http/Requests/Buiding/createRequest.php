<?php

namespace App\Http\Requests\Buiding;

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
        $rules = [
            'code' => 'required|unique:buiding',
            'code_group' => 'required',
            'nameGroup' => 'required',
        ];

        // Check if status_type is 0
        if ($this->input('status_type') == 0) {
            $rules['time'] = 'required';
            $rules['time_out'] = 'required|after:time';
            $rules['rent_cost'] = 'required|numeric';
            $rules['date'] = 'required';
        } else {
            $rules['price'] = 'required|numeric';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'code.required' => 'Trường Không Được Để Trống!',
            'code.unique' => 'Mã Phiếu Đã Tồn Tại!',
            'nameGroup.required' => 'Trường Không Được Để Trống!',
            'time.required' => 'Ngày Bắt Đầu Không Được Để Trống!',
            'time_out.required' => 'Ngày Kết Thúc Không Được Để Trống!',
            'time_out.after' => 'Ngày Kết Thúc Phải Sau Ngày Bắt Đầu!',
            'rent_cost.required' => 'Trường Không Được Để Trống!',
            'rent_cost.numeric' => 'Trường Phải Là Số!',
            'date.required' => 'Tháng Không Được Để Trống!',
            'price.required' => 'Trường Không Được Để Trống!',
            'price.numeric' => 'Trường Phải Là Số!',
        ];
    }
}
