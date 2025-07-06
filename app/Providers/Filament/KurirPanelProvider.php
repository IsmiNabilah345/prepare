<?php

namespace App\Providers\Filament;

use App\Filament\Pages\DashboardKurir;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Panel;
use Filament\PanelProvider;

class KurirPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('kurir')
            ->path('kurir') // login via /kurir
            ->login()
            ->pages([
                DashboardKurir::class,
            ])
            ->middleware([
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
