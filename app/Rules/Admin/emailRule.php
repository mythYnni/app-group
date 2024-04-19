<?php

namespace App\Rules\Admin;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Admin;

class emailRule implements Rule
{
    protected $slug;

    public function __construct($slug)
    {
        $this->slug = $slug;
    }

    public function passes($attribute, $value)
    {
        return Admin::where('email', $value)->where('slugUser', '!=', $this->slug)->doesntExist();
    }

    public function message()
    {
        return 'email bạn nhập đã tồn tại.';
    }
}
