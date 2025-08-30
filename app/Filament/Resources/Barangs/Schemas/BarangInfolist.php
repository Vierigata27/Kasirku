<?php

namespace App\Filament\Resources\Barangs\Schemas;

use Filament\Schemas\Schema;
use Filament\Infolists\Components\TextEntry;


class BarangInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('nama_barang')
                    ->label('Nama Barang')
                    ->size('xl')
                    ->weight('bold'),

                TextEntry::make('kode_barang')
                    ->label('Kode barang')
                    ->weight('bold'),

                TextEntry::make('harga_barang')
                    ->label('Harga')
                    ->money('IDR'),

                
            ]);
    }
}
