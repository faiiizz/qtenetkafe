<footer class="main-footer">
    <strong></strong>
    <div class="float-right d-none d-sm-inline-block">
        <a href="{{ url('/dashboard') }}" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
            <b>Qte-net kafe</b>
    </div>
</footer>
</div>

<script src="{{asset('AdminLTE')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="{{asset('AdminLTE')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="{{asset('AdminLTE')}}/dist/js/adminlte.js"></script>

<!--Sweetalert -->
@include('sweetalert::alert')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{asset('AdminLTE')}}/plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('AdminLTE')}}/dist/js/pages/dashboard3.js"></script>
</body>

</html>
