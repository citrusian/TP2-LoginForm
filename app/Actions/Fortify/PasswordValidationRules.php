<?php

namespace App\Actions\Fortify;

//use Laravel\Fortify\Rules\Password;
//use Illuminate\Validation\Rules\Password;
use App\Models\Password;

trait PasswordValidationRules
{
    protected function passwordRules(): array
    {
//        return ['required', 'string', new Password, 'confirmed'];
        return ['required',
            'string',
            Password::min(10)
                ->mixedCase()
                ->numbers()
                ->symbols(),
            'confirmed'];
    }
}
