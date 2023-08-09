@extends('fe.menufe.layout')

@section('content')
    <table id="cart" class="table table-hover table-condensed">
        <thead>
            <tr>
                <th style="width:50%">Menu</th>
                <th style="width:10%">Harga</th>
                <th style="width:8%">Jumlah</th>
                <th style="width:22%" class="text-center">Subtotal</th>
                <th style="width:10%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0 @endphp
            @if (session('cart'))
                @foreach (session('cart') as $id => $details)
                    @php $total += $details['harga'] * $details['jumlah'] @endphp
                    <tr data-id="{{ $id }}">
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm-3 hidden-xs"><img
                                    src="{{ url('images') }}/{{ $details['gmbr_menu'] }}" width="100"
                                    height="100" class="img-responsive" /></div>
                                <div class="col-sm-9">
                                    <h4 class="nomargin">{{ $details['nama_menu'] }}</h4>
                                </div>
                            </div>
                        </td>
                        <td data-th="Price">Rp.{{ number_format ($details['harga'] )}}</td>
                        <td data-th="Quantity">
                            <input type="number" value="{{ $details['jumlah'] }}" class="form-control jumlah cart_update"
                                min="1" />
                        </td>
                        <td data-th="Subtotal" class="text-center">Rp. {{ number_format($details['harga'] * $details['jumlah'] )}}</td>
                        <td class="actions" data-th="">
                            <button class="btn btn-danger btn-sm cart_remove"><i class="fa fa-trash-o"></i></button>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5" class="text-right">
                    <h3><strong>Total Rp.{{ number_format ($total)}}</strong></h3>
                </td>
            </tr>
            <tr>
                <td colspan="5" class="text-right">
                    <a href="{{ url('/menufe') }}" class="btn btn-danger"> <i class="fa fa-arrow-left"></i> Continue
                        Shopping</a>
                    <a href="/pemesan" class="btn btn-success"> <i class="fa fa-money"></i> Pesan</a>
                </td>
            </tr>
        </tfoot>
    </table>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(".cart_update").change(function(e) {
            e.preventDefault();

            var ele = $(this);

            $.ajax({
                url: '{{ route('update_cart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id"),
                    jumlah: ele.parents("tr").find(".jumlah").val()
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        });

        $(".cart_remove").click(function(e) {
            e.preventDefault();

            var ele = $(this);

            if (confirm("Do you really want to remove?")) {
                $.ajax({
                    url: '{{ route('remove_from_cart') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("data-id")
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            }
        });
    </script>
@endsection


{{-- @extends('layoutspem.masterpem')
@section('contentpem-wrapper')
    <!-- Main content -->
    <section class="content">

        <table id="cart" class="table table-hover table-condensed">
            <thead>
                <tr>
                    <th style="width:50%">Gambar</th>
                    <th style="width:10%">Harga</th>
                    <th style="width:8%">Jumlah</th>
                    <th style="width:22%" class="text-center">Subtotal</th>
                    <th style="width:10%"></th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0 @endphp
                @if (session('cart'))
                    @foreach (session('cart') as $id => $details)
                        @php $total += $details['harga'] * $details['jumlah'] @endphp
                        <tr data-id="{{ $id }}">
                            <td data-th="Menu">
                                <div class="row">
                                    <div class="col-sm-3 hidden-xs"><img
                                            src="{{ url('images') }}/{{ $details['gmbr_menu'] }}" width="100"
                                            height="100" class="img-responsive" /></div>
                                    <div class="col-sm-9">
                                        <h4 class="namamenu">{{ $details['nama_menu'] }}</h4>
                                    </div>
                                </div>
                            </td>
                            <td data-th="Harga">Rp{{ number_format($details['harga'], 0, ',', '.') }}</td>
                            <td data-th="Jumlah">
                                <input type="number" value="{{ $details['jumlah'] }}"
                                    class="form-control jumlah update_cart" min="1" />
                            </td>
                            <td data-th="Subtotal" class="text-center">
                                Rp{{ number_format($details['harga'] * $details['jumlah'], 0, ',', '.') }}</td>
                            <td class="actions">
                                <a class="btn btn-outline-danger btn-sm remove-cart"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" class="text-right">
                        <h3><strong>Total Rp {{ number_format($total, 0, ',', '.') }}</strong></h3>
                    </td>
                </tr>
                <tr>
                    <td colspan="5" class="text-right">
                        <a href="{{ url('/menufe') }}" class="btn btn-danger"> <i class="fa fa-arrow-left"></i>
                            Continue Shopping</a>
                        <button class="btn btn-success"><i class="fa fa-money"></i> Checkout</button>
                    </td>
                </tr>
            </tfoot>
        </table>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    </section>
@endsection


@section('scripts')
    <script type="text/javascript">
        $(".update_cart").change(function(e) {
            e.preventDefault();

            var ele = $(this);

            $.ajax({
                url: '{{ route('update_cart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id"),
                    jumlah: ele.parents("tr").find(".jumlah").val()
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        });

        $(".remove-cart").click(function(e) {
            e.preventDefault();

            var ele = $(this);

            if (confirm("Do you really want to remove?")) {
                $.ajax({
                    url: '{{ route('remove_from_cart') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("data-id")
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            }
        });
    </script>
@endsection --}}
