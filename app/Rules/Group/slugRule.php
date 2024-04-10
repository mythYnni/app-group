<?php

namespace App\Rules\Group;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Group;


class slugRule implements Rule
{
    protected $slug;

    public function __construct($slug)
    {
        $this->slug = $slug;
    }

    public function passes($attribute, $value)
    {
        return Group::where('slugGroup', $value)->where('slugGroup', '!=', $this->slug)->doesntExist();
    }

    public function message()
    {
        return 'Nhóm bạn nhập đã tồn tại.';
    }
}
