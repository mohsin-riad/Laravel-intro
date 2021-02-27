<!DOCTYPE html>
<html lang="en">
    <!-- head -->
    @include('admin.includes.head')
    <body class="sb-nav-fixed">
        <!-- topnav -->
        @include('admin.includes.topnav')
        <div id="layoutSidenav">
            <!-- sidenav -->
            @include('admin.includes.sidenav')
            <div id="layoutSidenav_content">
                @yield('content')
                <!-- footer -->
                @include('admin.includes.footer')
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('website/js/scripts.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('website/assets/demo/chart-area-demo.js') }}"></script>
        <script src="{{ asset('website/assets/demo/chart-bar-demo.js') }}"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('website/assets/demo/datatables-demo.js') }}"></script>
    </body>
</html>
