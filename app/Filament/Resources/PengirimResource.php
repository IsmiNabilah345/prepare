<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PengirimResource\Pages;
use App\Filament\Resources\PengirimResource\RelationManagers;
use App\Models\Pengirim;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;

class PengirimResource extends Resource
{
    protected static ?string $model = Pengirim::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationLabel = 'Pengirim';

    protected static ?string $navigationGroup = 'Pengelolaan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_pengirim')
                    ->required(),
                TextInput::make('alamat_pengirim')
                    ->required()
                    ->label('Alamat'),
                TextInput::make('kota_pengirim')
                    ->required()
                    ->label('Kota'),
                TextInput::make('kode_pos')
                    ->required()
                    ->label('Kode Pos'),
                TextInput::make('telp_pengirim')
                    ->required()
                    ->label('Nomor Telepon'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_pengirim')
                    ->label('Nama Pengirim')
                    ->searchable(),
                TextColumn::make('alamat_pengirim')
                    ->label('Alamat'),
                TextColumn::make('kota_pengirim')
                    ->label('Kota'),
                TextColumn::make('kode_pos')
                    ->label('Kode Pos'),
                TextColumn::make('telp_pengirim')
                    ->label('Nomor Telepon'),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
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
            'index' => Pages\ListPengirims::route('/'),
            'create' => Pages\CreatePengirim::route('/create'),
            'edit' => Pages\EditPengirim::route('/{record}/edit'),
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
