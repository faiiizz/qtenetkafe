@extends('layouts.master')
@section('content-wrapper')

<div class="container p-4">
    <center>
        <h2>Pengambilan</h2>
    </center>
    <a href="/pengambilan/create" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Pengambilan</a>
    <a class="btn btn-default" href="/cetakambil" target="_blank"><i class="fa fa-print"></i> Cetak PDF</a>
    <table class="table table-striped my-4 text-center">
        <tr style="background-color: gray;">
            <th>No</th>
            <th>Nama barang</th>
            <th>Jumlah</th>
            <th>Tanggal</th>
            <th>Keterangan</th>
            <th width="190px">Aksi</th>
        </tr>
        @foreach ($pengambilans as $ambil)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $ambil->inventory->nama_barang }}</td>
            <td>{{ $ambil->jumlah }}</td>
            <td>{{ $ambil->tanggal }}</td>
            <td>{{ $ambil->keterangan }}</td>
            <td>
                <a href="pengambilan/{{ $ambil->id }}/edit" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>
                <a href="#" class="btn btn-danger delete" data-id="{{ $ambil->id }}" data-nama="{{ $ambil->inventory_id }}"><i class="fa fa-trash"></i> Delete</a>
            </td>
        </tr>
        @endforeach
    </table>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    {{ $pengambilans->links('pagination::bootstrap-5') }}
</div>
<script type="text/javascript">
    $('.delete').click(function() {
        var ambilid = $(this).attr('data-id');
        var inventory_id = $(this).attr('data-nama');

        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Anda ingin menghapus Pengambilan dengan Nama " + inventory_id + "?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = "/pengambilan/" + ambilid;
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
