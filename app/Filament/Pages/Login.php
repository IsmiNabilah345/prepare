<?php

namespace App\Filament\Kurir\Pages\Auth;

use App\Http\Responses\CustomLoginResponse; // Pastikan namespace ini benar
use Filament\Http\Responses\Auth\Contracts\LoginResponse;
use Filament\Pages\Auth\Login as BaseLogin;

class Login extends BaseLogin
{
    protected function getLoginResponse(): LoginResponse
    {
        return app(CustomLoginResponse::class);
    }
}