<?php

namespace App\Filament\Kurir\Pages\Auth;

// use App\Http\Responses\CustomLoginResponse; 
use Filament\Facades\Filament;
use Filament\Http\Responses\Auth\Contracts\LoginResponse;
use Filament\Pages\Auth\Login as BaseLogin;
use Illuminate\Support\Facades\Auth;
use Filament\Notifications\Notification;

class Login extends BaseLogin
{
    protected static string $view = 'filament.kurir.pages.auth.login';

    // protected function getLoginResponse(): LoginResponse
    // {
    //     return app(CustomLoginResponse::class);
    // }

    public function submit()
    {
        $data = $this->form->getState();

        $credentials = [
            'email' => $data['email'],
            'password' => $data['password'],
        ];
        if (!Auth::guard('kurir')->attempt($credentials, $data['remember'] ?? false)) {
            Notification::make()
                ->title('Email atau password salah!')
                ->danger()
                ->send();

            return;
        }

        $user = Auth::guard('kurir')->user();

        if (!in_array($user->role, ['kurir', 'kurir_motor', 'kurir_truk'])) {
            Auth::guard('kurir')->logout();

            Notification::make()
                ->title('Akses Ditolak!')
                ->body('Akun Anda tidak memiliki hak akses sebagai kurir.')
                ->danger()
                ->send();

            return;
        }
        session()->regenerate();

        return redirect()->intended(Filament::getUrl());
    }
}
