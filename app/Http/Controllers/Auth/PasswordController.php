<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Infinitypaul\LaravelPasswordHistoryValidation\Rules\NotFromPasswordHistory;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed', new NotFromPasswordHistory($request->user())],
        ]);

        $request->user()->update([
            'password' => $validated['password'],
        ]);

        return back()->with('status', 'password-updated');
    }
}
