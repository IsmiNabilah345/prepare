<?php

namespace App\Http\Responses;

use Filament\Http\Responses\Auth\Contracts\LoginResponse as LoginResponseContract;
use Illuminate\Support\Facades\Auth;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        $user = Auth::user();

        $redirectTo = match ($user->role) {
            'kurir', 'kurir_motor', 'kurir_truk' => route('filament.pages.dashboard-kurir'),
            default => route('filament.admin.pages.dashboard'),
        };

        return redirect()->intended($redirectTo);
    }
}
