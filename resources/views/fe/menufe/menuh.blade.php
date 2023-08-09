@extends('fe.menufe.layout')

@section('content')

  <div class="card card-solid ">
    <center><h1>Menu</h1></center>
    <div class="card-body pb-0">
      <div class="row">
       @foreach ($menus as $menu)
       <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
        <div class="card bg-light d-flex flex-fill">
          <div class="card-header text-muted border-bottom-0">
          </div>
          <div class="card-body pt-0">
            <div class="row">
              <div class="col-7">
                <h2 style="font-weight: bold" class="lead"><b>{{ $menu->nama_menu }}</b></h2>
                <p style="font-weight: bold" class="text-muted text-sm">{{ $menu->deskripsi }}</p>
                <ul class="ml-4 mb-0 fa-ul text-muted">
                  <li style="font-weight: bold" class="small"><span class="fa-li"><i class="fas fa-lg fa-money-bill-wave mr-3"></i></span>Rp {{ number_format($menu->harga, 0, ',', '.') }}</li>
                </ul>
              </div>
              <div class="col-5 text-center">
                @if ($menu->gmbr_menu)
                <img id="myImg"
                    src="{{ url('images') . '/' . $menu->gmbr_menu }}"
                    alt="{{ $menu->gmbr_menu }}" img class="rounded-circle" width="120px" height="120px">
                @endif
              </div>
            </div>
          </div>
          <div class="card-footer">
            <div class="text-right">
              <a href="menufe/{{ $menu->id }}" class="btn btn-warning mr-1">
                <div class="fa fa-solid fa-info-circle">
                  Detail
                </div>
              </a>
              <a href="{{ route('add_to_cart', $menu->id)}}" class="btn btn-primary">
                <div class="fa fa-shopping-cart">
                  Add to Keranjang
                </div>
              </a>
            </div>
          </div>
    </div>
      </div>
        @endforeach
    </div>
    </div>
    {{-- {{ $menus->links('pagination::bootstrap-5') }} --}}
  </div>

@endsection
