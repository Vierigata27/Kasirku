<?php

namespace App\Filament\Resources\Barangs\Pages;

use App\Filament\Resources\Barangs\BarangResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions\Action;

use App\Filament\Resources\Barangs\Pages\Barcode; 

class ListBarangs extends ListRecords
{
    protected static string $resource = BarangResource::class;

    protected function getHeaderActions(): array
    {
        return [
        CreateAction::make(),
        Action::make('scan_barcode')
            ->label('Scan Barcode')
            ->icon('heroicon-o-camera')
            ->url(Barcode::getUrl()), // Pastikan menggunakan getUrl()
    ];;
    }
}
