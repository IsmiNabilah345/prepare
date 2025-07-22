<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransaksiResource\Pages;
use App\Filament\Resources\TransaksiResource\RelationManagers;
use App\Models\Transaksi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use App\Models\Tarif;

class TransaksiResource extends Resource
{
    protected static ?string $model = Transaksi::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    protected static ?string $navigationGroup = 'Pengelolaan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('id_pengirim')
                    ->label('Pengirim')
                    ->relationship('pengirim', 'nama_pengirim')
                    ->preload()
                    ->searchable()
                    ->required(),

                Select::make('id_penerima')
                    ->label('Penerima')
                    ->relationship('penerima', 'nama_penerima')
                    ->preload()
                    ->searchable()
                    ->required(),

                Select::make('id_produk')
                    ->label('Produk')
                    ->relationship('produk', 'no_resi')
                    ->preload()
                    ->searchable()
                    ->required(),

                DatePicker::make('tgl_transaksi')
                    ->required(),

                Select::make('id_tarif')
                    ->label('Layanan')
                    ->relationship('tarif', 'jenis')
                    ->preload()
                    ->searchable()
                    ->reactive()
                    ->required()
                    ->afterStateUpdated(function (callable $set, $get, $state) {
                        $tarif = \App\Models\Tarif::find($state);
                        $harga = $tarif?->harga ?? 0;
                        $set('harga', $harga);

                        $berat = $get('berat') ?? 0;
                        $set('total_harga', $harga * $berat);
                    }),

                TextInput::make('harga')
                    ->label('Harga per Kg')
                    ->numeric()
                    ->disabled()
                    ->dehydrated()
                    ->required(),

                TextInput::make('berat')
                    ->label('Berat (kg)')
                    ->numeric()
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(function (callable $set, $get) {
                        $total = ($get('berat') ?? 0) * ($get('harga') ?? 0);
                        $set('total_harga', $total);
                    }),

                TextInput::make('total_harga')
                    ->label('Total Harga')
                    ->disabled()
                    ->numeric()
                    ->dehydrated(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('produk.ket_produk')
                    ->label('Nama Produk'),

                TextColumn::make('pengirim.nama_pengirim')
                    ->label('Pengirim'),

                TextColumn::make('penerima.nama_penerima')
                    ->label('Penerima'),

                TextColumn::make('tgl_transaksi')
                    ->label('Tanggal Transaksi')
                    ->date(),

                TextColumn::make('harga')
                    ->label('Harga')
                    ->money('IDR', locale: 'id'),

                TextColumn::make('total_harga')
                    ->label('Total Harga')
                    ->money('IDR', true),

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
            'index' => Pages\ListTransaksis::route('/'),
            'create' => Pages\CreateTransaksi::route('/create'),
            'edit' => Pages\EditTransaksi::route('/{record}/edit'),
        ];
    }
}
