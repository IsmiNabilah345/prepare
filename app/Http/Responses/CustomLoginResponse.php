<?php

namespace App\Http\Responses;

use Filament\Http\Responses\Auth\Contracts\LoginResponse as LoginResponseContract;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class CustomLoginResponse implements LoginResponseContract
{
    public function toResponse($request): RedirectResponse
    {
        $user = Auth::guard('kurir')->user();

        if ($user && in_array($user->role, ['kurir', 'kurir_motor', 'kurir_truk'])) {
            return redirect('/kurir/dashboard-kurir');
        }

        return redirect('/admin');
    }
}
