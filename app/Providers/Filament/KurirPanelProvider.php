<?php

namespace App\Providers\Filament;

use App\Filament\Pages\DashboardKurir;
use App\Http\Responses\CustomLoginResponse;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Auth\Login;
use Filament\Panel;
use Filament\PanelProvider;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class KurirPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('kurir')
            ->path('kurir')
            ->login(\App\Filament\Kurir\Pages\Auth\Login::class)
            ->authGuard('kurir')
            ->pages([
                DashboardKurir::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
