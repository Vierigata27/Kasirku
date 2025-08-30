<?php

namespace App\Filament\Resources\Barangs\Pages;

use App\Filament\Resources\Barangs\BarangResource;
use Filament\Resources\Pages\Page;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use App\Models\Barang;

class Barcode extends Page implements HasForms
{
    protected static string $resource = BarangResource::class;

    protected string $view = 'filament.resources.barangs.pages.barcode';

    public $barcode = '';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                // Anda bisa menambahkan input form jika diperlukan, misal untuk menampilkan hasil scan
            ]);
    }

    protected function getHeaderWidgets(): array
    {
        return [
            //
        ];
    }

    public function processBarcode()
{
    if ($this->barcode) {
        $barang = Barang::where('kode_barang', $this->barcode)->first();

        if ($barang) {
            // Logika untuk menampilkan atau mencetak data barang
            // Anda bisa menggunakan notifikasi atau redirect ke halaman cetak
            \Filament\Notifications\Notification::make()
                ->title('Barang ditemukan: ' . $barang->nama_barang)
                ->success()
                ->send();

            // Opsional: Redirect ke halaman cetak dengan ID barang
            // return redirect()->route('filament.pages.print', ['record' => $barang->id]);
        } else {
            \Filament\Notifications\Notification::make()
                ->title('Barang tidak ditemukan.')
                ->danger()
                ->send();
        }
    }
}
}
