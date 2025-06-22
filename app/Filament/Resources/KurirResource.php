<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KurirResource\Pages;
use App\Filament\Resources\KurirResource\RelationManagers;
use App\Models\Kurir;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;

class KurirResource extends Resource
{
    protected static ?string $model = Kurir::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

     protected static ?string $navigationLabel = 'Kurir';

    protected static ?string $navigationGroup = 'Pengelolaan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_kurir')
                    ->required()
                    ->label('Nama Kurir'),
                TextInput::make('no_telp')
                    ->required()
                    ->label('Nomor Telepon'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_kurir')
                    ->label('Nama Kurir'),
                TextColumn::make('no_telp')
                    ->label('Nomor Telepon')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListKurirs::route('/'),
            'create' => Pages\CreateKurir::route('/create'),
            'edit' => Pages\EditKurir::route('/{record}/edit'),
        ];
    }
}
