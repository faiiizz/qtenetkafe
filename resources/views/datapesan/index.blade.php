@extends('layouts.master')
@section('content-wrapper')

<div class="container p-4">
    @if (session()->has('pesan_tambah'))
    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
        Data Berhasil di Tambah
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif(session()->has('pesan_edit'))
    <div class="alert alert-primary alert-dismissible fade show mt-3" role="alert">
        {{ session('pesan_edit') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif(session()->has('pesan_hapus'))
    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
        {{ session('pesan_hapus') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <center>
        <h2>Data Pesanan</h2>
    </center>
    <table class="table table-striped my-4  text-center">
        <tr style="background-color: gray;">
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Stok</th>
            <th>Harga</th>
            <th>Satuan</th>
            <th width="190px">Aksi</th>
        </tr>
        @foreach ($inventories as $inv)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$inv->kd_barang}}</td>
            <td>{{$inv->nama_barang}}</td>
            <td>{{$inv->stok}}</td>
            <td>{{$inv->harga}}</td>
            <td>{{$inv->satuan}}</td>
            <td>
                <a href="inventory/{{ $inv->id }}/edit" class="btn btn-warning"><i class="fa fa-edit"></i>Edit</a>

                <form action="inventory/{{ $inv->id }}" method="post" class="d-inline">
                    @method('DELETE')
                    @csrf

                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin Ingin Menghapus Data ?')"><i class="fa fa-trash"></i> Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {{ $inventories->links('pagination::bootstrap-5')}}
</div>
@endsection
