<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Bukti Transaksi | {{ $transaksi->nama_pelanggan }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body onload="window.print();">
    <div class="container justify-content-center align-items-center text-center" style="max-width: 58mm;">
        <h4 class="fw-bold text-uppercase">AXDYYT LAUNDRY</h4>
        <hr class="border border-dark border-1 opacity-75" style="min-width: 58mm">
        <h5 class="fw-bold">BUKTI TRANSAKSI</h5>
        <hr class="border border-dark border-1 opacity-75" style="min-width: 58mm">
        <div class="d-flex">
            <span class="flex-grow-1 text-start">Nama:</span>
            <span class="fw-bold text-end">{{ $transaksi->nama_pelanggan }}</span>
        </div>
        <div class="d-flex">
            <span class="flex-grow-1 text-start">Tanggal:</span>
            <span class="fw-bold text-end">{{ date('d-m-Y', strtotime($transaksi->tanggal)) }}</span>
        </div>
        <hr class="border border-dark border-1 opacity-75" style="min-width: 58mm">
        <div class="d-flex">
            <span class="flex-grow-1 text-start">Layanan:</span>
            <span class="fw-bold text-end">{{ $transaksi->layanan->layanan }}</span>
        </div>
        <div class="d-flex">
            <span class="flex-grow-1 text-start">Berat:</span>
            <span class="fw-bold text-end">{{ $transaksi->berat }} kg</span>
        </div>
        <div class="d-flex">
            <span class="flex-grow-1 text-start">Harga:</span>
            <span class="fw-bold text-end">Rp {{ number_format($transaksi->layanan->harga_per_kg, 0, ',', '.') }}</span>
        </div>
        <hr class="border border-dark border-1 opacity-75" style="min-width: 58mm">
        <h4 class="fw-bold text-uppercase">Total: Rp
            {{ number_format($transaksi->berat * $transaksi->layanan->harga_per_kg, 0, ',', '.') }}</h4>
        <hr class="border border-dark border-1 opacity-75" style="min-width: 58mm">
        <p class="small">LSP 2024 - Praditya</p>
    </div>
</body>

</html>