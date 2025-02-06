@extends('tampilan')

@section('konten')
<div class="container-fluid">
    <div class="container">
        <div class="row mt-4">
            <div class="card z-index-2 h-100">
                <div class="card-header pb-0 pt-3 bg-transparent">
                    <div class="row mt-4">
                        <h3 class="text-start">Ubah Transaksi</h3>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center justify-content-center mb-0">
                                <tbody>
                                    <form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label for="tanggal" class="form-label">Tanggal</label>
                                            <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ $transaksi->tanggal }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
                                            <input type="text" name="nama_pelanggan" id="nama_pelanggan" class="form-control" value="{{ $transaksi->nama_pelanggan }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="layanan_id" class="form-label">Layanan</label>
                                            <select name="layanan_id" id="layanan_id" class="form-control" required>
                                                <option value="">Pilih Layanan</option>
                                                @foreach($layanan as $item)
                                                <option value="{{ $item->id }}" {{ $transaksi->layanan_id == $item->id ? 'selected' : '' }}>
                                                    {{ $item->layanan }} - Rp. {{ number_format($item->harga_per_kg, 0, ',', '.') }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="berat" class="form-label">Berat (kg)</label>
                                            <input type="number" name="berat" id="berat" class="form-control" step="0.1" value="{{ $transaksi->berat }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="keterangan" class="form-label">Keterangan</label>
                                            <select name="keterangan" id="keterangan" class="form-control" required>
                                                <option value="Proses" {{ $transaksi->keterangan == 'Proses' ? 'selected' : '' }}>Proses</option>
                                                <option value="Selesai" {{ $transaksi->keterangan == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="pembayaran" class="form-label">Pembayaran</label>
                                            <select name="pembayaran" id="pembayaran" class="form-control" required>
                                                <option value="Belum Bayar" {{ $transaksi->pembayaran == 'Belum Bayar' ? 'selected' : '' }}>Belum Bayar</option>
                                                <option value="Lunas" {{ $transaksi->pembayaran == 'Lunas' ? 'selected' : '' }}>Lunas</option>
                                            </select>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <a href="{{ route('transaksi.index') }}" class="btn btn-secondary">Kembali</a>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

