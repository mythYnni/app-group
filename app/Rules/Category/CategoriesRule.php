<?php

namespace App\Rules\Category;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Category;

class CategoriesRule implements Rule
{
    protected $slug;

    public function __construct($slug)
    {
        $this->slug = $slug;
    }

    public function passes($attribute, $value)
    {
        return Category::where('slug', $value)->where('slug', '!=', $this->slug)->doesntExist();
    }

    public function message()
    {
        return 'Danh mục đã tồn tại.';
    }
}
