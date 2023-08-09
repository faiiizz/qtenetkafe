@extends('fe.menufe.layout')

@section('content')
    <title>Pemesan</title>
    <div class=" row justify-content-center p-5">
        <div class="col-lg-6">
            <form action="/pemesanan" method="post">

                @csrf
                <div class="card border-dark mb-3">
                    <div class="card-header text-center "><b>
                            <h3>
                                Form Pemesanan
                            </h3>
                        </b></div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Kode Meja</label>
                            <select name="kode_meja" class="form-control">
                                <option value="">- Pilih -</option>
                                <option value="Pojok Kaca">PK</option>
                                <option value="Bulat Petak">BP</option>
                                <option value="Pojok Musholla">PM</option>
                                <option value="Pojok Lampu">PL</option>
                                <option value="Tapsu Tiang">TT</option>
                                <option value="Samping Kasir">SK</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nama Pemesan</label>
                            <input type="text" class="form-control @error('nama_pemesan') is-invalid @enderror"
                                id="nama_pemesan" name="nama_pemesan" value="{{ old('nama_pemesan') }}">
                            @error('nama_pemesan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="container p-3">
                        <div class="row">
                            <a href="{{ route('cart') }}" class="btn btn-outline-danger col-md-3 offset-md-8">Kembali</a>

                            <button type="submit" name="submit"
                                class="btn btn-success col-md-3 offset-md-8 mt-3" >Pembayaran</button>
                        </div>
                    </div>
                </div>
        </div>

        </form>
    </div>

    </div>
@endsection
