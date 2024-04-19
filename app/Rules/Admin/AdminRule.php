<?php

namespace App\Rules\Admin;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Admin;


class AdminRule implements Rule
{
    protected $slug;

    public function __construct($slug)
    {
        $this->slug = $slug;
    }

    public function passes($attribute, $value)
    {
        return Admin::where('linkFacebook', $value)->where('slugUser', '!=', $this->slug)->doesntExist();
    }

    public function message()
    {
        return 'linkFacebook bạn nhập đã tồn tại.';
    }
}
