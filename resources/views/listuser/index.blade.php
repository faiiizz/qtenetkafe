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
        <h2>List User</h2>
    </center>
    <a class="btn btn-default" href="/cetaklist" target="_blank"><i class="fa fa-print"></i> Cetak PDF</a>
    <table class="table table-striped my-4  text-center">
        <tr style="background-color: gray;">
            <th>No</th>
            <th>Nama User</th>
            <th>Email</th>
            <th>No HP</th>
            <th>Role</th>
            <th width="190px">Aksi</th>
        </tr>
        @foreach ($inventories as $listuser)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$listuser->nama}}</td>
            <td>{{$listuser->email}}</td>
            <td>{{$listuser->no_hp}}</td>
            <td>{{$listuser->role}}</td>
            <td>
                <a href="listuser/{{ $listuser->id }}/edit" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>

                <a href="#" class="btn btn-danger delete" data-id="{{ $listuser->id}}" data-nama="{{ $listuser->nama}}"><i class="fa fa-trash"></i> Delete</a>
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
        var nama = $(this).attr('data-nama');

        Swal.fire({
            title: 'Yang Bener ?',
            text: "Kamu Mau Menghapus User dengan Nama "+nama+" "+"?",
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
