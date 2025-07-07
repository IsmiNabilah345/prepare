<?php

return [
    App\Providers\AppServiceProvider::class,
    App\Providers\Filament\AdminPanelProvider::class,
    App\Providers\Filament\KurirPanelProvider::class,

];

$app = new Illuminate\Foundation\Application(
    $_ENV['APP_BASE_PATH'] ?? dirname(__DIR__)
);

// Register custom providers
$app->register(App\Providers\AppServiceProvider::class);
$app->register(App\Providers\Filament\AdminPanelProvider::class);
$app->register(App\Providers\Filament\KurirPanelProvider::class);
