<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Qte-net Cafe | Menu </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminLTE/dist/css/adminlte.min.css') }}">
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
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">
                    <a href="/cart">
                      <i class="fas fa-shopping-cart"></i>
                      Cart (0)
              <li class="breadcrumb-item"><a href="/login">Login</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
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
                    <h2 class="lead"><b>{{ $menu->nama_menu }}</b></h2>
                    <p class="text-muted text-sm">{{ $menu->deskripsi }}</p>
                    <ul class="ml-4 mb-0 fa-ul text-muted">
                      <li class="small"><span class="fa-li"><i class="fas fa-lg fa-money-bill-wave mr-3"></i></span>Rp {{ number_format($menu->harga, 0, ',', '.') }}</li>
                    </ul>
                  </div>
                  <div class="col-5 text-center">
                    @if ($menu->gmbr_menu)
                    <img id="myImg"
                        src="{{ url('images') . '/' . $menu->gmbr_menu }}"
                        alt="{{ $menu->gmbr_menu }}" style="max-width:120px">
                    @endif
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <div class="text-right">
                  <a href="menufe/{{ $menu->id }}" class="btn btn-warning">
                    <div class="fas fa-solid fa-info-circle">
                      Detail
                    </div>
                  </a>
                  <a href="#" class="btn btn-primary">
                    <div class="fas fa-shopping-cart">
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
        {{ $menus->links('pagination::bootstrap-5') }}
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
