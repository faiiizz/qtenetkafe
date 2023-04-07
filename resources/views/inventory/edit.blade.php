@extends('layouts.master')
@section('content-wrapper')

<div class=" row justify-content-center" >
	<div class="col-lg-6">
	<form  method="post" action ="/inventory/{{ $inventories->id }}">
		@method('PUT')
		@csrf
		<div class="card border-dark mb-3" >
			<div class="card-header text-center "><b><h3>
				Edit Inventory
			</h3></b></div>
			<div class="card-body">
				      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Stok</label>
                        <input type="text" class="form-control @error('stok') is-invalid @enderror" id="stok" name="stok" value="{{old('stok', $inventories->stok)}}">
                        @error('stok')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
				      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Harga</label>
                        <input type="text" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{old('harga', $inventories->harga)}}">
                        @error('harga')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="container p-3">
                    <div class="row">
                        <a href="/inventory" class="btn btn-outline-dark col-md-3 offset-md-8">Kembali</a>

                        <button type="submit" name="submit" class="btn btn-success col-md-3 offset-md-8 mt-3">Update</button>
                    </div>
                </div>
			</div>
		</div>

	</form>
	</div>

</div>

@endsection
