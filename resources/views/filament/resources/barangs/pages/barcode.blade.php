<x-filament-panels::page>
    <div class="fi-section-content-ctn p-4">
        <h2>Pindai Barcode Barang</h2>
        
        <video id="preview" class="w-full h-auto rounded-lg shadow-md"></video>

        <div id="result" class="mt-4 p-3 bg-gray-100 dark:bg-gray-800 rounded-lg">
            <p id="barcode-result">Hasil Barcode: Menunggu...</p>
        </div>
    </div>
</x-filament-panels::page>

@push('scripts')
    <script src="https://raw.githack.com/schmich/instascan-js/master/instascan.min.js"></script>

    <script type="text/javascript">
        let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
        let resultContainer = document.getElementById('barcode-result');

        scanner.addListener('scan', function (content) {
            resultContainer.textContent = 'Hasil Barcode: ' + content;

            // Panggil metode Livewire untuk memproses barcode
            @this.barcode = content;
            @this.call('processBarcode');
        });

        Instascan.Camera.getCameras().then(function (cameras) {
            if (cameras.length > 0) {
                scanner.start(cameras[0]);
            } else {
                console.error('Tidak ada kamera yang ditemukan.');
                resultContainer.textContent = 'Error: Tidak ada kamera yang ditemukan.';
            }
        }).catch(function (e) {
            console.error(e);
            resultContainer.textContent = 'Error: ' + e.message;
        });
    </script>
@endpush

