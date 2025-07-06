<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProdukResource\Pages;
use App\Filament\Resources\ProdukResource\RelationManagers;
use App\Models\Produk;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Hidden;

class ProdukResource extends Resource
{
    protected static ?string $model = Produk::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Produk';

    protected static ?string $navigationGroup = 'Pengelolaan';

    protected static ?string $slug = 'kelola-produk';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Hidden::make('id_kurir')->default(auth()->id()),

                TextInput::make('jumlah_produk')
                    ->required(),
                TextInput::make('berat_kiriman')
                    ->required()
                    ->label('Berat Kiriman (gr/kg)'),
                TextInput::make('berat_asli')
                    ->required()
                    ->label('Berat Asli (gr/kg)'),
                TextInput::make('volume_produk')
                    ->required(),
                TextInput::make('ket_produk')
                    ->required()
                    ->label('Keterangan produk'),
                TextInput::make('no_resi')
                    ->label('Nomor Resi')
                    ->readOnly()
                    ->default(fn() => 'Akan terisi otomatis saat simpan')
                    ->disabled()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('jumlah_produk'),
                TextColumn::make('berat_kiriman')
                    ->label('Berat Kiriman (gr/kg)'),
                TextColumn::make('berat_asli')
                    ->label('Berat Asli (gr/kg)'),
                TextColumn::make('volume_produk'),
                TextColumn::make('ket_produk')
                    ->label('Keterangan roduk'),
                TextColumn::make('no_resi')
                    ->searchable()
                    ->copyable(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListProduks::route('/'),
            'create' => Pages\CreateProduk::route('/create'),
            'edit' => Pages\EditProduk::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);

        if (auth()->user()->role !== 'admin') {
            $query->where('id_kurir', auth()->id());
        }
    }
}
