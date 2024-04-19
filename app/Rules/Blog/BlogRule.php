<?php

namespace App\Rules\Blog;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Blog;

class BlogRule implements Rule
{
    protected $slug;

    public function __construct($slug)
    {
        $this->slug = $slug;
    }

    public function passes($attribute, $value)
    {
        return Blog::where('slug', $value)->where('slug', '!=', $this->slug)->doesntExist();
    }

    public function message()
    {
        return 'Danh mục đã tồn tại.';
    }
}
