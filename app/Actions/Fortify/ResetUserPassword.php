<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Infinitypaul\LaravelPasswordHistoryValidation\Rules\NotFromPasswordHistory;
use Laravel\Fortify\Contracts\ResetsUserPasswords;

class ResetUserPassword implements ResetsUserPasswords
{
    use PasswordValidationRules;

    /**
     * Validate and reset the user's forgotten password.
     *
     * @param  array<string, string>  $input
     */
    public function reset(User $user, array $input): void
    {
        Validator::make($input, [
            'password' => [$this->passwordRules(), new NotFromPasswordHistory($user)],
        ])->validate();

        $user->forceFill([
            'password' => $input['password'],
        ])->save();
    }
}
