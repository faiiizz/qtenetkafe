@extends('layouts.master')
@section('content-wrapper')

<div class=" row justify-content-center p-5" >
    {{-- @php
        dd($catatans);
    @endphp --}}
	<div class="col-lg-6">
	<form  method="post" action ="/pengeluaran/{{ $pengeluarans->id }}">
		@method('PUT')
		@csrf
		<div class="card border-dark mb-3" >
			<div class="card-header text-center "><b><h3>
				Edit Pengeluaran
			</h3></b></div>
			<div class="card-body">
				      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Rincian</label>
                        <input type="text" class="form-control @error('rincian') is-invalid @enderror" id="rincian" name="rincian" value="{{old('rincian', $pengeluarans->rincian)}}">
                        @error('rincian')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="container p-3">
                    <div class="row">
                        <a href="/pengeluaran" class="btn btn-outline-danger col-md-3 offset-md-8">Kembali</a>

                        <button type="submit" name="submit" class="btn btn-success col-md-3 offset-md-8 mt-3">Update</button>
                    </div>
                </div>
			</div>
		</div>

	</form>
	</div>

</div>

@endsection
