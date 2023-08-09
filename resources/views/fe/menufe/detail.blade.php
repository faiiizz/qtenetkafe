@extends('layoutspem.masterpem')
@section('contentpem-wrapper')
<section class="content">

    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <div class="col-12">
                        <img src="{{ url('images') . '/' . $menu->gmbr_menu }}" class="product-image"
                            alt="Product Image">
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <h3 style="font-weight: bold" class="my-3">{{ $menu->nama_menu }}</h3>
                    <p style="font-weight: bold">{{ $menu->deskripsi }}</p>

                    <hr>
                    <div class="bg-gray py-3 px-3 mt-2 col-5" style="width: 195px;">
                        <h4 class="mb-1">
                            <i class="fas fa-lg fa-money-bill-wave mr-2"></i>
                            Rp {{ number_format($menu->harga, 0, ',', '.') }}
                        </h4>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('add_to_cart', $menu->id)}}" class="btn btn-primary btn-lg btn-block">
                            <i class="fas fa-cart-plus fa-lg mr-2"></i>
                            Masukkan Ke keranjang
                        </a>
                    </div>
                    <div class="mt-2">
                        <a href="/menufe" class="btn btn-danger btn-lg btn-block">
                            <i class="fas fa-arrow-left fa-lg mr-2"></i>
                            Back to menu
                        </a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>
@endsection
