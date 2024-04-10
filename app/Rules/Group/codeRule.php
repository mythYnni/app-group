<?php

namespace App\Rules\Group;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Group;

class codeRule implements Rule
{
    protected $slug;

    public function __construct($slug)
    {
        $this->slug = $slug;
    }

    public function passes($attribute, $value)
    {
        return Group::where('code', $value)->where('slugGroup', '!=', $this->slug)->doesntExist();
    }

    public function message()
    {
        return 'Mã Nhóm bạn nhập đã tồn tại.';
    }
}
