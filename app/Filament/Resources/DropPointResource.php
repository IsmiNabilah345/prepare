<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DropPointResource\Pages;
use App\Models\DropPoint;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class DropPointResource extends Resource
{
    protected static ?string $model = DropPoint::class;

    protected static ?string $navigationIcon = 'heroicon-o-map-pin';
    protected static ?string $navigationLabel = 'Drop Point';
    protected static ?string $navigationGroup = 'Pengelolaan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')->required(),
                Forms\Components\TextInput::make('alamat')->required(),
                Forms\Components\TextInput::make('kota')->required(),
                Forms\Components\TextInput::make('latitude')->numeric()->nullable(),
                Forms\Components\TextInput::make('longitude')->numeric()->nullable(),
                Forms\Components\TextInput::make('telepon')->nullable(),
                Forms\Components\TextInput::make('jam_buka')->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')->searchable(),
                TextColumn::make('alamat')->limit(30),
                TextColumn::make('kota'),
                TextColumn::make('telepon'),
                TextColumn::make('jam_buka'),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDropPoints::route('/'),
            'create' => Pages\CreateDropPoint::route('/create'),
            'edit' => Pages\EditDropPoint::route('/{record}/edit'),
        ];
    }
} 