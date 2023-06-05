@extends('layouts.master')
@section('content-wrapper')

<div class="container p-4">
    <center>
        <h2>Pengeluaran</h2>
    </center>
    <a href="/pengeluaran/create" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Pengeluaran</a>
    <a class="btn btn-default" href="/cetakluar" target="_blank"><i class="fa fa-print"></i> Cetak PDF</a>
    <table class="table table-striped my-4 text-center">
        <tr style="background-color: gray;">
            <th>No</th>
            <th>Pengeluaran</th>
            <th>Tanggal</th>
            <th>Nama barang</th>
            <th>Jumlah</th>
            <th>Rincian</th>
            <th width="190px">Aksi</th>
        </tr>
        @foreach ($pengeluarans as $luar)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td> Rp {{ number_format($luar->pengeluaran, 0, ',', '.')}}</td>
            <td>{{ $luar->tanggal }}</td>
            <td>{{ $luar->inventory->nama_barang }}</td>
            <td>{{ $luar->jumlah }}</td>
            <td>{{ $luar->rincian }}</td>
            <td>
                <a href="pengeluaran/{{ $luar->id }}/edit" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>
                <a href="#" class="btn btn-danger delete" data-id="{{ $luar->id }}" data-nama="{{ $luar->inventory_id }}"><i class="fa fa-trash"></i> Delete</a>
            </td>
        </tr>
        @endforeach
    </table>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    {{ $pengeluarans->links('pagination::bootstrap-5') }}
</div>
<script type="text/javascript">
    $('.delete').click(function() {
        var luarid = $(this).attr('data-id');
        var inventory_id = $(this).attr('data-nama');

        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Anda ingin menghapus Pengeluaran dengan Nama " + inventory_id + "?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = "/pengeluaran/" + luarid;
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
