<?php

namespace App\Rules\Profile;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PasswordRule  implements Rule
{
    public function passes($attribute, $value)
    {
        // Get the currently authenticated user
        $user = Auth::guard('admin')->user();
        // Check if the provided password matches the user's current password
        return Hash::check($value, $user->password);
    }

    public function message()
    {
        return 'Mật khẩu hiện tại không chính xác.';
    }
}
