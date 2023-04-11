@extends('layouts.master')
@section('content-wrapper')
<title>Pengambilan</title>
<div class=" row justify-content-center p-5">
    <div class="col-lg-6">
        <form action="/pengambilan" method="post">

            @csrf
            <div class="card border-dark mb-3">
                <div class="card-header text-center "><b>
                        <h3>
                            Form Pengambilan
                        </h3>
                    </b></div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="inventory" class="form-label">Inventory_id</label>
                        <select class="form-control" name="inventory_id" aria-label="Default select example">
                            <option selected>- Pilih -</option>
                            @foreach($inv as $inven)
                                @if (old('inventory_id') == $inven->id)
                                    <option value="{{ $inven->id }}" selected>{{ $inven->nama_barang }}</option>
                                @else
                                    <option value="{{ $inven->id }}">{{ $inven->nama_barang }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Jumlah</label>
                        <input type="text" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" name="jumlah" value="{{old('jumlah')}}">
                        @error('jumlah')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
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
                    <div class="form-row row">
                        <div class="col-md-12 mb-2">
                            <label class="form-label">Tanggal</label>
                            <input type="date" placeholder="Masukan tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{ old('tanggal') }}" id="tanggal" name="tanggal">
                        </div>
                    </div>
                </div>
                <div class="container p-3">
                    <div class="row">
                        <a href="/pengambilan" class="btn btn-outline-danger col-md-3 offset-md-8">Kembali</a>

                        <button type="submit" name="submit" class="btn btn-success col-md-3 offset-md-8 mt-3">Create</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>

@endsection
