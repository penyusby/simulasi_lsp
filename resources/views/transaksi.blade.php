@extends('tampilan')

@section('konten')
    <div class="container ms-4">
        <div class="row mt-4">
            <div class="card z-index-2 h-100">
                <div class="card-header pb-0 pt-3 bg-transparent">
                    <div class="row mt-4">
                        <h6>Jenis Layanan</h6>
                    </div>
                    <div class= "text end">
                        <a href="{{ route('transaksi.create') }}">
                            <button type="button" class="btn btn-outline-primary">Tambah</button></a>
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success text-white alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger text-white alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table id="example" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No
                                        </th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Tanggal</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Nama Pelanggar</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">
                                            layanan</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Beratnya</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">
                                            Harga Satuan</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Jumlah Bayar</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">
                                            Keterangan</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Pembayaran</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">
                                            Aksi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transaksi as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}</td>
                                            <td>{{ $item->nama_pelanggan }}</td>
                                            <td>{{ $item->layanan->layanan }}</td>
                                            <td>{{ $item->berat }} kg</td>
                                            <td>Rp. {{ number_format($item->layanan->harga_per_kg, 0, ',', '.') }}</td>
                                            <td>Rp.
                                                {{ number_format($item->layanan->harga_per_kg * $item->berat, 0, ',', '.') }}
                                            </td>
                                            <td>{{ $item->keterangan }}</td>
                                            <td>
                                                {{ $item->pembayaran }}
                                                <br>
                                                @if ($item->pembayaran === 'Belum Bayar')
                                                    <form action="{{ route('transaksi.bayar', $item->id) }}" method="POST"
                                                        style="display:inline;">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" class="btn btn-outline-success btn-sm mt-1"
                                                            onclick="return confirm('Yakin ingin membayar?')">
                                                            Bayar
                                                        </button>
                                                    </form>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($item->pembayaran == 'Lunas')
                                                    <a href="{{ route('transaksi.cetak', $item->id) }}"
                                                        class="btn btn-outline-info btn-sm" target="_blank">Cetak</a>
                                                @else
                                                    <button class="btn btn-outline-secondary btn-sm"
                                                        target="_blank">Cetak</button>
                                                @endif
                                                <a href="{{ route('transaksi.edit', $item->id) }}"
                                                    class="btn btn-outline-warning btn-sm">Ubah</a>
                                                <form action="{{ route('transaksi.destroy', $item->id) }}" method="POST"
                                                    style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-outline-danger btn-sm"
                                                        onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
