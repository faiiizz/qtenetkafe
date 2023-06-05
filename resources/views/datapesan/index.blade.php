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
            <th>User</th>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
            <th width="190px">Aksi</th>
        </tr>
        @foreach ($datpesans as $datpes)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{ $datpes->user->name }}</td>
            <td>{{ $datpes->product->name }}</td>
            <td>{{ $datpes->quantity }}</td>
            <td>{{ $datpes->price }}</td>
            <td>
                <a href="datpes/{{ $datpes->id }}/edit" class="btn btn-warning"><i class="fa fa-edit"></i>Edit</a>

                <form action="datpes/{{ $datpes->id }}" method="post" class="d-inline">
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
