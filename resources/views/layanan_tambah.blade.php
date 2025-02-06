@extends('tampilan')

@section('konten')
    <div class="container">
        <div class="row mt-4">
            <div class="card z-index-2 h-100">
                <div class="card-header pb-0 pt-3 bg-transparent">
                    <div class="row mt-4">
                        <h6>Tambah Jenis Layanan</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center justify-content-center mb-0">
                                <tbody>
                                    <form action="{{ route('layanan.store') }}" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="basic-url" class="form-label">Nama Layanan</label>
                                            <input type="text" class="form-control" name="layanan"
                                                placeholder="Masukkan Layanan Baru" value='{{ old('layanan') }}' required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="basic-url" class="form-label">Harga Perkilogram</label>
                                            <input type="number" class="form-control" name="harga_per_kg"
                                                placeholder="Masukkan Harga Layanan" value='{{ old('harga_per_kg') }}'
                                                required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <a href="{{ route('layanan.index') }}" class="btn btn-secondary">Batal</a>
                                    </form>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
