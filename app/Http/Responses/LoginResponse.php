<?php

namespace App\Http\Responses;

use Filament\Http\Responses\Auth\Contracts\LoginResponse as LoginResponseContract;
use Illuminate\Support\Facades\Auth;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect('/login'); // fallback, just in case
        }

        $redirectTo = match ($user->role) {
            'kurir', 'kurir_motor', 'kurir_truk' => route('filament.kurir.pages.dashboard-kurir'),
            default => route('filament.admin.pages.dashboard'),
        };

        return redirect()->intended($redirectTo);
    }
}
