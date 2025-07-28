<?php

namespace App\Filament\Admin\Pages\Auth;

use Filament\Pages\Auth\Login as BaseLogin;
use Illuminate\Support\Facades\Auth;
use Filament\Notifications\Notification;

class Login extends BaseLogin
{
    protected static string $view = 'filament.admin.pages.auth.login';

    public function submit()
    {
        $data = $this->form->getState();

        $credentials = [
            'email' => $data['email'],
            'password' => $data['password'],
        ];

        if (!Auth::attempt($credentials)) {
            Notification::make()
                ->title('Login gagal')
                ->body('Cek email dan password kamu lagi ya!')
                ->danger()
                ->send();

            return;
        }

        session()->regenerate();

        return redirect('/admin');
    }
}
