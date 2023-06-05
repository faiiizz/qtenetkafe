<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Menu | Detail</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminLTE/dist/css/adminlte.min.css') }}">

    <style>

        body {
            font-family: 'Source Sans Pro', sans-serif;
        }
        .btn-circle {
            border-radius: 50%;
            width: 50px;
            height: 50px;
            padding: 10px;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .product-image-container {
            margin-bottom: 20px;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper-center">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2 align-items-center">
                        <div class="product-image-container">
                            <a href="{{ url('/menufe') }}" class="btn btn-primary btn-circle btn-md elevation-2" style="width: 40px; height: 40px;">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                        </div>
                        <div class="col-sm-6 col-ml-2">
                            <h3 style="font-weight: bold">Qte~net kafe</h3>
                        </div>
                    </div>

                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="card card-solid">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="col-12">
                                    <img src="{{ url('images') . '/' . $menu->gmbr_menu }}" class="product-image"
                                        alt="Product Image" height="60px" width="40px">
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
                                <div class="mt-4 ml-1col-5">
                                    <div class="btn btn-primary btn-lg btn-block">
                                        <i class="fas fa-cart-plus fa-lg mr-2"></i>
                                        Masukkan Ke keranjang
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <a href="{{ url('/menufe') }}" class="nav-link {{ Request::is('menufe') ? 'active' : '' }}">
                    <b>Qte-net kafe</b>
                </a>
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('adminLTE/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('adminLTE/dist/js/adminlte.min.js') }}"></script>
</body>

</html>
