@extends('layouts.master')
@section('content-wrapper')
<title>Catatan</title>
<div class=" row justify-content-center p-5">
    <div class="col-lg-6">
        <form action="/catatan" method="post">

            @csrf
            <div class="card border-dark mb-3">
                <div class="card-header text-center "><b>
                        <h3>
                            Form Catatan
                        </h3>
                    </b></div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{old('nama')}}">
                        @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-row row">
                        <div class="col-md-12 mb-2">
                            <label class="form-label">Tanggal</label>
                            <input type="date" placeholder="Masukan tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{ old('tanggal') }}" id="tanggal" name="tanggal">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Keterangan</label>
                        <input type="text" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" value="{{old('keterangan')}}">
                        @error('keterangan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="container p-3">
                    <div class="row">
                        <a href="/catatan" class="btn btn-outline-dark col-md-3 offset-md-8">Kembali</a>

                        <button type="submit" name="submit" class="btn btn-success col-md-3 offset-md-8 mt-3">Create</button>
                    </div>
                </div>
            </div>
    </div>

    </form>
</div>

</div>

@endsection
