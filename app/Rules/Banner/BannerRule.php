<?php

namespace App\Rules\Banner;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Banner;

class BannerRule implements Rule
{
    protected $slug;

    public function __construct($slug)
    {
        $this->slug = $slug;
    }

    public function passes($attribute, $value)
    {
        return Banner::where('slug', $value)->where('slug', '!=', $this->slug)->doesntExist();
    }

    public function message()
    {
        return 'Danh mục đã tồn tại.';
    }
}
