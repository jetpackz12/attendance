<x-head />

<x-script />

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <x-navbar />

        <x-sidebar />

        {{ $slot }}

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

</body>

</html>
