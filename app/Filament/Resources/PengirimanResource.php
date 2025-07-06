<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PengirimanResource\Pages;
use App\Filament\Resources\PengirimanResource\RelationManagers;
use App\Models\Pengiriman;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Textarea;

class PengirimanResource extends Resource
{
    protected static ?string $model = Pengiriman::class;

    protected static ?string $navigationIcon = 'heroicon-o-truck';

    protected static ?string $navigationGroup = 'Pengelolaan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('id_produk')
                    ->relationship('produk', 'no_resi')
                    ->searchable()
                    ->required()
                    ->label('Produk (No Resi)'),

                Forms\Components\Select::make('id_kurir')
                    ->relationship('kurir', 'name')
                    ->searchable()
                    ->required()
                    ->label('Nama Kurir'),

                Forms\Components\Select::make('id_penerima')
                    ->relationship('penerima', 'nama_penerima')
                    ->searchable()
                    ->required()
                    ->label('Penerima'),

                Forms\Components\DatePicker::make('tanggal_kirim')
                    ->label('Tanggal Kirim')
                    ->required(),

                Forms\Components\Select::make('status')
                    ->options([
                        'belum dikirim' => 'Belum Dikirim',
                        'sedang dikirim' => 'Sedang Dikirim',
                        'terkirim' => 'Terkirim',
                    ])
                    ->default('belum dikirim')
                    ->required(),

                Forms\Components\Select::make('tipe_kendaraan')
                    ->label('Tipe Kendaraan')
                    ->options([
                        'motor' => 'Motor',
                        'truk' => 'Truk',
                    ])
                    ->required(),

                Forms\Components\DatePicker::make('estimasi_sampai')
                    ->label('Estimasi Sampai'),

                Textarea::make('catatan')
                    ->label('Catatan')
                    ->nullable()
                    ->maxLength(255),

            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id_produk')
                    ->label('Produk')
                    ->searchable(),
                TextColumn::make('id_kurir')
                    ->label('Nama Kurir'),
                TextColumn::make('id_penerima')
                    ->label('Nama Penerima'),
                TextColumn::make('tanggal_kirim')
                    ->label('Tanggal Pengiriman'),
                TextColumn::make('status')
                    ->label('Status'),
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
            'index' => Pages\ListPengirimen::route('/'),
            'create' => Pages\CreatePengiriman::route('/create'),
            'edit' => Pages\EditPengiriman::route('/{record}/edit'),
        ];
    }
}
