@extends('tampilan')

@section('konten')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Jumlah Layanan</p>
                                    <h5 class="font-weight-bolder">
                                        {{$transaksilunas + $transaksibelumlunas}}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Transaksi Baru</p>
                                    <h5 class="font-weight-bolder">
                                        {{$transaksibaru}}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Sedang Di proses</p>
                                    <h5 class="font-weight-bolder">
                                        {{$transaksiproses}}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Belum di bayar</p>
                                    <h5 class="font-weight-bolder">
                                       {{$transaksibelumlunas}}
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row mt-4">
            <div class="card z-index-2 h-100">
                <div class="card-header pb-0 pt-3 bg-transparent">
                    <div class="row mt-4">
                        <div class="card ">
                            <div class="card-header pb-0 p-3">
                                <div class="d-flex justify-content-between">
                                    <h6 class="mb-2">Sales by Country</h6>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table align-items-center ">
                                    <tbody>
                                        <thead class="table-secondary">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Pelanggan</th>
                                                <th>Layanan</th>
                                                <th>Berat</th>
                                                <th>Tanggal Transaksi</th>
                                                <th>Pembayaran</th>
                                            </tr>
                                        </thead>
                                    <tbody>
                                        @foreach ($dashboard as $index => $item)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $item->nama_pelanggan }}</td>
                                                <td>{{ $item->layanan->layanan }}</td>
                                                <td>{{ $item->berat }} kg</td>
                                                <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                                                <td>{{ $item->pembayaran }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <footer class="footer pt-3  ">
                            <div class="container-fluid">
                                <div class="row align-items-center justify-content-lg-between">
                                    <div class="col-lg-6 mb-lg-0 mb-4">
                                        <div class="copyright text-center text-sm text-muted text-lg-start">
                                            ©
                                            <script>
                                                document.write(new Date().getFullYear())
                                            </script>,
                                            made with <i class="fa fa-heart"></i> by
                                            <a href="https://www.creative-tim.com" class="font-weight-bold"
                                                target="_blank">Creative Tim</a>
                                            for a better web.
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                                            <li class="nav-item">
                                                <a href="https://www.creative-tim.com" class="nav-link text-muted"
                                                    target="_blank">Creative Tim</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="https://www.creative-tim.com/presentation"
                                                    class="nav-link text-muted" target="_blank">About Us</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="https://www.creative-tim.com/blog" class="nav-link text-muted"
                                                    target="_blank">Blog</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="https://www.creative-tim.com/license"
                                                    class="nav-link pe-0 text-muted" target="_blank">License</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </footer>
                    </div>
                @endsection
