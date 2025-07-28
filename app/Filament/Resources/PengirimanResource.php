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
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use App\Models\Transaksi;
use App\Models\User;
use Filament\Forms\Components\TextInput;

class PengirimanResource extends Resource
{
    protected static ?string $model = Pengiriman::class;

    protected static ?string $navigationIcon = 'heroicon-o-truck';

    protected static ?string $navigationGroup = 'Pengelolaan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('id_transaksi')
                    ->label('Transaksi (No Resi)')
                    ->options(function () {
                        return Transaksi::with('produk')
                            ->get()
                            ->mapWithKeys(fn($trx) => [$trx->id => $trx->no_resi])
                            ->toArray();
                    })
                    ->searchable()
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(function (callable $set, $state) {
                        $transaksi = Transaksi::find($state);
                        if ($transaksi) {
                            $set('no_resi', $transaksi->no_resi);
                        }
                    }),

                TextInput::make('no_resi')
                    ->label('No Resi')
                    ->disabled()
                    ->dehydrated(),

                Select::make('id_kurir')
                    ->label('Nama Kurir')
                    ->options(function () {
                        return User::whereIn('role', ['kurir', 'kurir_motor', 'kurir_truk'])
                            ->pluck('name', 'id')
                            ->toArray();
                    })
                    ->searchable()
                    ->preload()
                    ->required(),

                DatePicker::make('tanggal_kirim')
                    ->label('Tanggal Kirim')
                    ->required(),

                Select::make('tipe_kendaraan')
                    ->label('Tipe Kendaraan')
                    ->options([
                        'motor' => 'Motor',
                        'truk' => 'Truk',
                    ])
                    ->required(),

                DatePicker::make('estimasi_sampai')
                    ->label('Estimasi Sampai')
                    ->required(),

                Select::make('status')
                    ->label('Status')
                    ->options([
                        'belum dikirim' => 'Belum Dikirim',
                        'sedang dikirim' => 'Sedang Dikirim',
                        'terkirim' => 'Terkirim',
                    ])
                    ->default('belum dikirim')
                    ->required(),

                Textarea::make('catatan')
                    ->label('Catatan')
                    ->maxLength(255)
                    ->nullable(),
            ]);
    }



    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('transaksi.produk.no_resi')
                    ->label('No Resi'),

                TextColumn::make('kurir.name')
                    ->label('Kurir'),

                TextColumn::make('tanggal_kirim')
                    ->label('Tanggal Kirim')
                    ->date(),

                TextColumn::make('estimasi_sampai')
                    ->label('Estimasi Sampai')
                    ->date(),

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
