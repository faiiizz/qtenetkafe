@extends('layouts.master')
@section('content-wrapper')
<title>Inventory</title>
<div class=" row justify-content-center p-5">
    <div class="col-lg-6">
        <form action="/inventory" method="post">

            @csrf
            <div class="card border-dark mb-3">
                <div class="card-header text-center "><b>
                        <h3>
                            Form Inventory
                        </h3>
                    </b></div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Kode</label>
                        <input type="text" class="form-control @error('kd_barang') is-invalid @enderror" id="kd_barang" name="kd_barang" value="{{old('kd_barang')}}">
                        @error('kd_barang')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" id="nama_barang" name="nama_barang" value="{{old('nama_barang')}}">
                        @error('nama_barang')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Stok</label>
                        <input type="text" class="form-control @error('stok') is-invalid @enderror" id="stok" name="stok" value="{{old('stok')}}">
                        @error('stok')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Harga</label>
                        <input type="text" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{old('harga')}}">
                        @error('harga')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Satuan</label>
                        <select name="satuan" class="form-control">
                            <option value="">- Pilih -</option>
                            <option value="Kilogram">Kg</option>
                            <option value="Liter">Liter</option>
                            <option value="Gram">gram</option>
                            <option value="Pack">Pack</option>
                            <option value="Kaleng">Kaleng</option>
                            <option value="Renceng">Renceng</option>
                        </select>
                    </div>
                </div>

                <div class="container p-3">
                    <div class="row">
                        <a href="/inventory" class="btn btn-outline-danger col-md-3 offset-md-8">Kembali</a>

                        <button type="submit" name="submit" class="btn btn-success col-md-3 offset-md-8 mt-3">Create</button>
                    </div>
                </div>
            </div>
    </div>

    </form>
</div>

</div>

@endsection
