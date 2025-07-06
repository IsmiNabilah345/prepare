<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TrackingResource\Pages;
use App\Filament\Resources\TrackingResource\RelationManagers;
use App\Models\Tracking;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;

class TrackingResource extends Resource
{
    protected static ?string $model = Tracking::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-magnifying-glass';

    protected static ?string $navigationLabel = 'Tracking';

    protected static ?string $navigationGroup = 'Pengelolaan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('no_resi')
                    ->required()
                    ->label('Nomor Resi'),
                TextInput::make('status')
                    ->required()
                    ->label('Status'),
                TextInput::make('nama_kurir')
                    ->required()
                    ->label('Nama Kurir')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('no_resi')
                    ->label('Nomor Resi'),
                TextColumn::make('status')
                    ->label('Status'),
                TextColumn::make('nama_kurir')
                    ->label('Nama Kurir')
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ForceDeleteAction::make(),
                Tables\Actions\RestoreAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
                Tables\Actions\RestoreBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTrackings::route('/'),
            'create' => Pages\CreateTracking::route('/create'),
            'edit' => Pages\EditTracking::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
