<?php

namespace App\Filament\Resources\Barangs\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;

class BarangForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_barang')
                ->required(),
                
                TextInput::make('kode_barang')
                ->required(),

                TextInput::make('harga_barang')
                ->label('Harga Barang')
                ->numeric()
                ->prefix('IDR')
                ->required(),
            ]);
    }
}
