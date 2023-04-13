@extends('layouts.master')
@section('content-wrapper')

<div class="container p-4">
@if(session('success'))
    <script>
        toastr.success("{{ session('success') }}");
    </script>
@endif

    {{-- <!-- @if (session()->has('pesan_tambah'))
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
    @endif --> --}}
    <center>
        <h2>Catatan</h2>
    </center>
    <a href="/catatan/create" class="btn btn-dark"><i class="fa fa-plus"></i> Tambah Catatan</a>
    <table class="table table-striped my-4  text-center">
        <tr style="background-color: gray;">
            <th>No</th>
            <th>Nama</th>
            <th>Tanggal</th>
            <th>Keterangan</th>
            <th width="190px">Aksi</th>
        </tr>
        @foreach ($catatans as $ctt)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$ctt->nama}}</td>
            <td>{{$ctt->tanggal}}</td>
            <td>{{$ctt->keterangan}}</td>
            <td>
                <a href="catatan/{{ $ctt->id }}/edit" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>

                <a href="#" class="btn btn-danger delete" data-id="{{ $ctt->id}}" data-nama="{{ $ctt->nama}}"><i class="fa fa-trash"></i> Delete</a>

                <!-- <form action="catatan/{{ $ctt->id }}" method="post" class="d-inline">
                    @method('DELETE')
                    @csrf

                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin Ingin Menghapus Data ?')"><i class="fa fa-trash"></i> Delete</button>
                </form> -->
            </td>
        </tr>
        @endforeach
    </table>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    {{ $catatans->links('pagination::bootstrap-5')}}
</div>
<script type="text/javascript">
    $('.delete').click(function() {
        var catatanid = $(this).attr('data-id');
        var nama = $(this).attr('data-nama');

        Swal.fire({
            title: 'Yang Bener ?',
            text: "Kamu Mau Menghapus Catatan dengan Nama "+nama+" "+"?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location= "/catatan/"+catatanid+""
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
