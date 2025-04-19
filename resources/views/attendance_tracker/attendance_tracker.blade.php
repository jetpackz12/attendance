<x-layout>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Attendance Tracker</h1>
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
                                <h3 class="card-title">LIST OF ATTENDANCE(S)</h3>
                                <div class="float-right d-flex justify-content-center align-items-start">
                                    <form class="formFilter d-flex justify-content-center align-items-center" action="{{ route('attendance_tracker_show') }}" method="GET">
                                        @csrf
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-calendar-alt"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control float-right" id="reservation" name="date_range">
                                            </div>
                                        </div>
                                        <div class="form-group ml-1">
                                            <select class="form-control" id="name" name="name" required>
                                                <option value="" selected disabled>Select Name</option>
                                                @foreach ($attendance_names as $attendance_name)
                                                    <option value="{{ $attendance_name->name }}">{{ $attendance_name->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary ml-1 mb-3" data-toggle="modal"
                                            data-target="#modal-add"><i class="fas fa-filter"></i> Filter</button>
                                    </form>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="table" class="table table-bordered table-striped text-center">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Name</th>
                                            <th>Date</th>
                                            <th>Time In</th>
                                            <th>Time Out</th>
                                            <th>Time In</th>
                                            <th>Time Out</th>
                                            <th>Late time</th>
                                            <th>Total</th>
                                            <th>Remark</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table_display">
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
        $("#attendance_tracker_link").addClass("active");
        $("#dtr_management").addClass("menu-open");
        $("#dtr_management_link").addClass("active");

        let tableName = "Attendance Tracker List";

        $('.formFilter').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                type: "GET",
                cache: false,
                url: $(this).attr('action'),
                data: $(this).serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    let counter = 1, total_minutes = 0;

                    let table = $('#table').DataTable();
                    table.clear();

                    data.forEach(element => {
                        const date = new Date(element.date);
                        const formattedDate = date.toLocaleDateString("en-US", {
                        year: "numeric",
                        month: "long",
                        day: "2-digit"
                        });

                        table.row.add([
                            counter++,
                            element.name,
                            formattedDate,
                            element.time_in_1,
                            element.time_out_1,
                            element.time_in_2,
                            element.time_out_2,
                            element.late_time,
                            element.total,
                            element.remarks
                        ]);

                        total_minutes += parseInt(element.total);
                    });

                    if (total_minutes > 0) {
                        table.row.add([
                            "", "", "", "", "", "", "", "",
                            `<b>Total Minutes:</b>`, `<b>${total_minutes}</b>`
                        ]);
                    }

                    table.draw(false);

                }
            });

        });
    </script>
</x-layout>
