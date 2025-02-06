<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Laundry</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fff;
            text-align: center;
        }

        .struk-container {
            width: 300px;
            margin: 20px auto;
            border: 1px dashed #000;
            padding: 10px;
        }

        h4,
        p {
            margin: 5px 0;
        }

        h4 {
            font-size: 18px;
            text-transform: uppercase;
        }

        .info {
            font-size: 12px;
            line-height: 1.6;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table td {
            font-size: 12px;
            padding: 4px 0;
        }

        table tr td:last-child {
            text-align: right;
        }

        hr {
            border: none;
            border-top: 1px dashed #000;
            margin: 10px 0;
        }

        .footer {
            font-size: 10px;
            margin-top: 10px;
        }

        .footer p {
            margin: 5px 0;
        }

        .highlight {
            font-weight: bold;
        }

        .print-btn {
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .print-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="struk-container" id="struk">
        <h4>Mas Abi Laundry</h4>
        <p class="info">JL. Nyaman Nyaman, Cerdas</p>
        <p class="info"> {{ \Carbon\Carbon::parse($transaksi->tanggal)->format('d-m-Y') }}</p>
        <p class="info">Pelanggan - {{ $transaksi->nama_pelanggan }}</p>
        <hr>
        <table>
            <tr>
                <p><strong>Layanan:</strong> {{ $transaksi->layanan->layanan }}</p>
                <p><strong>Berat:</strong> {{ $transaksi->berat }} kg</p>
                <p><strong>Harga per kg:</strong> Rp. {{ number_format($transaksi->layanan->harga_per_kg, 0, ',', '.') }}</p>
                <p><strong>Total Bayar:</strong> Rp. {{ number_format($transaksi->total_harga, 0, ',', '.') }}</p>
                <p><strong>Keterangan:</strong> {{ $transaksi->keterangan }}</p>
                <p><strong>Pembayaran:</strong> {{ $transaksi->pembayaran }}</p>            </tr>
        </table>
        <hr>
        <p class="footer">
            TERIMA KASIH SUDAH MENGGUNAKAN LAYANAN LAUNDRY KAMI<br>
        </p>
        <p class="footer">=== LAYANAN PELANGGAN ===</p>
    </div>
    <button class="print-btn" onclick="printStruk()">Print Struk</button>

    <script>
        function printStruk() {
            const strukElement = document.getElementById('struk');
            const originalContent = document.body.innerHTML;

            // Sembunyikan tombol saat mencetak
            document.body.innerHTML = strukElement.outerHTML;
            window.print();

            // Kembalikan konten awal
            document.body.innerHTML = originalContent;
        }
    </script>
</body>

</html>