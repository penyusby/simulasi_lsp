@extends('tampilan')
@section('konten')
<div class="container">
    <div class="row mt-4">
        <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
                <div class="row mt-4">
                    <h6>Jenis Layanan</h6>
                </div>
                <div class= "text end">
                    <a href="{{ route ('layanan.create')}}">
                        <button type="button" class="btn btn-outline-primary">Tambah</button></a>
                </div>          
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center justify-content-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Harga</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Layanan</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">
                                        aksi</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ( $layanan as $items => $key )
                                <tr>
                                    <td>
                                       {{$items + 1}}
                                    </td>
                                    <td>
                                        {{$key->layanan}}
                                    </td>
                                    <td>
                                        {{$key->harga_per_kg_formatted}}
                                    </td>
                                    <td class="text-end">
                                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                                            <a href="{{ route ('layanan.edit', $key->id)}}" class="btn btn-outline-warning">Ubah</a>
                                            <form action="{{ route('layanan.destroy', $key->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger">Hapus</button>
                                            </form>
                                        </div>
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
