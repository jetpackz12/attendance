<x-layout>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Upload Attendance</h1>
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
                                <h3 class="card-title">LIST OF UPLOAD ATTENDANCE(S)</h3>
                                <div class="float-right">
                                    <form action="{{ route('upload_attendance_import') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="upload_file" name="file" required>
                                                    <label class="custom-file-label" for="upload_file">Choose file</label>
                                                </div>
                                                <button type="submit" class="btn btn-success ml-1"><i
                                                        class="fas fa-file-upload"></i> Upload</button>
                                                <button type="button" class="btn btn-primary ml-1" data-toggle="modal" data-target="#modal-save"><i
                                                        class="fas fa-share-square"></i> Save</button>
                                                <button type="button" class="btn btn-danger ml-1" data-toggle="modal" data-target="#modal-delete-all"><i
                                                        class="fas fa-trash"></i> Delete All</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @session('success')
                                    <div class="alert alert-success" role="alert"> 
                                        {{ $value }}
                                    </div>
                                @endsession
                    
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <table id="table2" class="table table-bordered table-striped text-center">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Name</th>
                                            <th>Date</th>
                                            <th>Time In</th>
                                            <th>Time Out</th>
                                            <th>Time In</th>
                                            <th>Time Out</th>
                                            <th>Late Time</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $counter = 1;
                                        @endphp
                                        @foreach ($attendances as $attendance)
                                            <tr>
                                                <td>{{ $counter++ }}</td>
                                                <td>{{ $attendance->name }}</td>
                                                <td>
                                                    @php
                                                        echo date('F d, Y', strtotime($attendance->date));
                                                    @endphp
                                                </td>
                                                <td>{{ $attendance->time_in_1 }}</td>
                                                <td>{{ $attendance->time_out_1 }}</td>
                                                <td>{{ $attendance->time_in_2 }}</td>
                                                <td>{{ $attendance->time_out_2 }}</td>
                                                <td>{{ $attendance->late_time }}</td>
                                                <td class="py-0 align-middle">
                                                    <div class="btn-group btn-group-md">
                                                        <a href="#" class="btn btn-warning edit"
                                                            data-toggle="modal" data-target="#modal-edit"
                                                            data-id="{{ $attendance->id }}"
                                                            data-path="{{ route('upload_attendance_edit') }}"><i
                                                                class="fas fa-edit"></i></a>
                                                        <a href="#" class="btn btn-danger edit"
                                                            data-toggle="modal" data-target="#modal-status"
                                                            data-id="{{ $attendance->id }}"
                                                            data-path="{{ route('upload_attendance_edit') }}"><i
                                                                class="fas fa-trash"></i></a>
                                                    </div>
                                                </td>
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

    <div class="modal fade modal-close" id="modal-edit">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fa fa-tachometer-alt"></i> Edit Attendance</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="formPost" action="{{ route('upload_attendance_update') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input class="form-control e_id" type="text" name="id" hidden readonly>
                        <div class="form-group">
                            <label for="time_in_1">Morning Time In: </label>
                            <input type="time" class="form-control" id="time_in_1" name="time_in_1"
                                placeholder="Enter Time Start">
                        </div>
                        <div class="form-group">
                            <label for="time_out_1">Morning Time Out: </label>
                            <input type="time" class="form-control" id="time_out_1" name="time_out_1"
                                placeholder="Enter Time End">
                        </div>
                        <div class="form-group">
                            <label for="time_in_2">Afternoon Time In: </label>
                            <input type="time" class="form-control" id="time_in_2" name="time_in_2"
                                placeholder="Enter Time Start">
                        </div>
                        <div class="form-group">
                            <label for="time_out_2">Afternoon Time Out: </label>
                            <input type="time" class="form-control" id="time_out_2" name="time_out_2"
                                placeholder="Enter Time End">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit <i
                                class="fa fa-paper-plane"></i></button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <div class="modal fade modal-close" id="modal-save">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fa fa-tachometer-alt"></i> Save Attendances</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="formPost" action="{{ route('upload_attendance_save') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <p>Are you sure you want to save this attendances?</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-primary">Yes <i
                                class="fa fa-paper-plane"></i></button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <div class="modal fade modal-close" id="modal-status">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fa fa-tachometer-alt"></i> Delete Attendance</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="formPost" action="{{ route('upload_attendance_destroy') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input class="form-control e_id" type="text" name="id" hidden readonly>
                        <p>Are you sure you want to delete this attendance?</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-primary">Yes <i
                                class="fa fa-paper-plane"></i></button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <div class="modal fade modal-close" id="modal-delete-all">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fa fa-tachometer-alt"></i> Delete All Attendance</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="formPost" action="{{ route('upload_attendance_destroy_all') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <p>Are you sure you want to delete all this attendance?</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-primary">Yes <i
                                class="fa fa-paper-plane"></i></button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <script>
        $("#upload_attendance_link").addClass("active");
        $("#dtr_management").addClass("menu-open");
        $("#dtr_management_link").addClass("active");

        let tableName = "Upload Attendance List";
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 1000
        });

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
                    $('#status').val(data.status);

                    function convertToTimeInputFormat(timeStr) {
                        const date = new Date('1970-01-01T' + timeStr);
                        if (!isNaN(date.getTime())) {
                            let hours = date.getHours().toString().padStart(2, '0');
                            let minutes = date.getMinutes().toString().padStart(2, '0');
                            return `${hours}:${minutes}`;
                        } else {
                            const match = timeStr.match(/^(\d{1,2}):(\d{2}):(\d{2})\s?(AM|PM)$/i);
                            if (match) {
                                let [_, h, m, s, period] = match;
                                h = parseInt(h);
                                if (period.toUpperCase() === 'PM' && h !== 12) h += 12;
                                if (period.toUpperCase() === 'AM' && h === 12) h = 0;
                                return `${h.toString().padStart(2, '0')}:${m}`;
                            }
                        }
                        return '';
                    }

                    $('#time_in_1').val(convertToTimeInputFormat(data.time_in_1));
                    $('#time_out_1').val(convertToTimeInputFormat(data.time_out_1));
                    $('#time_in_2').val(convertToTimeInputFormat(data.time_in_2));
                    $('#time_out_2').val(convertToTimeInputFormat(data.time_out_2));

                }
            });

        });

        $(document).ready(function () {
            setTimeout(function () {
                $(".alert").fadeTo(500, 0).slideUp(500, function () {
                    $(this).remove();
                });
            }, 2000);

            $('#upload_file').on('change', function () {
                let fileName = $(this).val().split('\\').pop();
                let fileExtension = fileName.split('.').pop().toLowerCase();

                $(this).next('.custom-file-label').html(fileName);

                if (fileExtension !== 'xls' && fileExtension !== 'xlsx') {
                    Toast.fire({
                        icon: 'error',
                        title: '<p class="text-center pt-2">Please select a valid Excel file (.xls or .xlsx)</p>'
                    });
                    $(this).val('');
                    $(this).next('.custom-file-label').html('Choose file');
                }
            });
        });
    </script>
</x-layout>