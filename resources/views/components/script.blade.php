
<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<!-- SweetAlert2 -->
<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- Toastr -->
<script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
<!-- bs-custom-file-input -->
<script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>


<script>
    $(function() {
        //Date picker
        $('#reservationdate').datetimepicker({
            format: 'L'
        });

        $('#e_reservationdate').datetimepicker({
            format: 'L'
        });
        
        //Date range picker
        $('#reservation').daterangepicker()
        
        //Initialize Select2 Elements
        $('.select2').select2()
        
        bsCustomFileInput.init();

        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        $('.formPost').on('submit', function(e) {
            e.preventDefault();

            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 1000
            });

            $.ajax({
                type: "POST",
                cache: false,
                url: $(this).attr('action'),
                data: $(this).serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {

                    switch (data['response']) {
                        case 1:
                            Toast.fire({
                                icon: 'success',
                                title: '<p class="text-center pt-2 text-bold text-black">' +
                                    data['message'] + '</p>'
                            });

                            setTimeout(function() {
                                window.location.href = data['path'];
                            }, 1000);

                            break;
                        default:
                            Toast.fire({
                                icon: 'error',
                                title: '<p class="text-center pt-2">' + data[
                                    'message'] + '</p>'
                            });
                            break;
                    }

                }
            });

        });

        $('.formPostWithFile').on('submit', function(e) {
            e.preventDefault();

            const form = $(this)[0];
            const formData = new FormData(form); 

            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 1000
            });

            $.ajax({
                type: "POST",
                cache: false,
                url: $(this).attr('action'),
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {

                    switch (data['response']) {
                        case 1:
                            Toast.fire({
                                icon: 'success',
                                title: '<p class="text-center pt-2 text-bold text-black">' +
                                    data['message'] + '</p>'
                            });

                            setTimeout(function() {
                                window.location.href = data['path'];
                            }, 1000);

                            break;
                        default:
                            Toast.fire({
                                icon: 'error',
                                title: '<p class="text-center pt-2">' + data[
                                    'message'] + '</p>'
                            });
                            break;
                    }

                }
            });

        });

    });

    $(document).ready(function() {
        $('.modal').on('hidden.bs.modal', function() {
            $(this).find('input, select, textarea').each(function() {
                const name = $(this).attr('name');
                if (name === '_token') return;

                if ($(this).is(':checkbox') || $(this).is(':radio')) {
                    $(this).prop('checked', false).trigger('change');
                } else {
                    $(this).val('').trigger('change');
                }
            });
        });
    });
</script>

<script>
    $(function () {
        $("#table").DataTable({
        "paging": true,
        "searching": true,
        "info": true,
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "ordering": false,
        "pageLength": 10,
        "buttons": [
            {
                extend: 'excel',
                title: tableName,
                exportOptions: {
                    columns: ':visible'
                },
                customize: function(xlsx) {
                    const sheet = xlsx.xl.worksheets['sheet1.xml'];
                    $('row c', sheet).each(function () {
                        $(this).attr('s', '51');
                    });
                }
            }
            , 
            {
                extend: 'pdf',
                title: tableName,
                exportOptions: {
                    columns: ':visible'
                },
                customize: function(doc) {
                    doc.defaultStyle = {
                        fontSize: 9,
                        alignment: 'center'
                    };
                    doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                }
            }
            ,
            {
                extend: 'print',
                title: tableName,
                exportOptions: {
                    stripHtml: false,
                    columns: ':visible',
                }
            }
            ,"colvis"]
        }).buttons().container().appendTo('#table_wrapper .col-md-6:eq(0)');
        
        $('#table2').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "responsive": true,
        });
    });
</script>