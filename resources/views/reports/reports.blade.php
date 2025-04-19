<x-layout>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Reports</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">LOG ATTEMPTS(S)</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="table" class="table table-bordered table-striped text-center">
                                    <thead>
                                        <tr>
                                            {{-- <th>No.</th> --}}
                                            <th>User</th>
                                            <th>Date</th>
                                            <th>Attempts</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($logs as $log)
                                            <tr>
                                                <td>{{ $log->fullname }}</td>
                                                <td>
                                                    @php
                                                        $date = new DateTime($log->log_created_at);
                                                        $formattedDate = $date->format('F d, Y h:i:s');
                                                        echo $formattedDate;
                                                    @endphp 
                                                </td>
                                                <td>{{ $log->attempts }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

    <script>
        $("#reports_link").addClass("active");

        let tableName = "Attendance Tracker List";

        $('.edit').on('click', function(e) {
            const id = $(this).attr('data-id');
            const path = $(this).attr('data-path');

            $.ajax({
                type: "GET",
                cache: false,
                url: path,
                data: {
                    id: id
                },
                success: function(data) {
                    $(".e_id").val(data.id);
                    $('#e_course').val(data.course);
                    $('#status').val(data.status);
                }
            });

        });
    </script>
</x-layout>