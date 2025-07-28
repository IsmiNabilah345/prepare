<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PenerimaResource\Pages;
use App\Filament\Resources\PenerimaResource\RelationManagers;
use App\Models\Penerima;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;

class PenerimaResource extends Resource
{
    protected static ?string $model = Penerima::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationLabel = 'Penerima';

    protected static ?string $navigationGroup = 'Pengelolaan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_penerima')
                    ->required(),
                TextInput::make('alamat_penerima')
                    ->required()
                    ->label('Alamat'),
                TextInput::make('kota_penerima')
                    ->required()
                    ->label('kota'),
                TextInput::make('kode_pos')
                    ->required()
                    ->label('Kode Pos'),
                TextInput::make('telp_penerima')
                    ->required()
                    ->label('Nomor Telepon'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_penerima')
                    ->label('Nama Penerima')
                    ->searchable(),
                TextColumn::make('alamat_penerima')
                    ->label('Alamat'),
                TextColumn::make('kota_penerima')
                    ->label('Kota'),
                TextColumn::make('kode_pos')
                    ->label('Kode Pos'),
                TextColumn::make('telp_penerima')
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
            'index' => Pages\ListPenerimas::route('/'),
            'create' => Pages\CreatePenerima::route('/create'),
            'edit' => Pages\EditPenerima::route('/{record}/edit'),
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
