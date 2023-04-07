@extends('layouts.master')
@section('content-wrapper')

<div class="container p-4">
    {{-- @if (session()->has('pesan_tambah'))
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
    @endif --}}

    <center>
        <h2>Inventory</h2>
    </center>
    <a href="/inventory/create" class="btn btn-dark"><i class="fa fa-plus"></i>     Tambah Inventory</a>
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

                <a href="#" class="btn btn-danger delete" data-id="{{ $inv->id}}" data-nama="{{ $inv->nama_barang}}"><i class="fa fa-trash"></i>Delete</a>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    {{ $inventories->links('pagination::bootstrap-5')}}
</div>
<script type="text/javascript">
    $('.delete').click(function() {
        var invid = $(this).attr('data-id');
        var nama_barang = $(this).attr('data-nama');

        Swal.fire({
            title: 'Yang Bener ?',
            text: "Kamu Mau Menghapus Inventory dengan Nama "+nama_barang+" "+"?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location= "/inventory/"+invid+""
                Swal.fire(
                    'Deleted!',
                    'Catatan Berhasil dihapus.',
                    'success'
                );
            }
        });
    });
</script>
@endsection
