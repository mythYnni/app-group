<?php

namespace App\Rules\Account;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Account;

class AccountRule implements Rule
{
    protected $slug;

    public function __construct($slug)
    {
        $this->slug = $slug;
    }

    public function passes($attribute, $value)
    {
        return Account::where('phone', $value)->where('slugUser', '!=', $this->slug)->doesntExist();
    }

    public function message()
    {
        return 'Phone bạn nhập đã tồn tại.';
    }
}
