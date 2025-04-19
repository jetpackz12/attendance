<x-layout>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Pupil Management</h1>
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
                                <h3 class="card-title">LIST OF PUPIL(S)</h3>
                                <div class="float-right">
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#modal-add"><i
                                            class="fas fa-plus-circle"></i> Add
                                        Pupil</button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="table" class="table table-bordered table-striped text-center">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Fullname</th>
                                            <th>Gender</th>
                                            <th>Email</th>
                                            <th>Address</th>
                                            <th>Grade</th>
                                            <th>Status</th>
                                            <th>Form 10</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $counter = 1;
                                        @endphp
                                        @foreach ($pupils as $pupil)
                                            <tr>
                                                <td>{{ $counter++ }}</td>
                                                <td>{{ $pupil->first_name }} {{ $pupil->middle_name }} {{ $pupil->last_name }}</td>
                                                <td>{{ $pupil->gender }}</td>
                                                <td>
                                                    {!! empty($pupil->email_address) ? '<span class="text-danger">No Email</span>' : $pupil->email_address !!}
                                                </td>
                                                <td>{{ $pupil->address }}</td>
                                                <td>Grade {{ $pupil->grade_level }} {{ $pupil->section }}</td>
                                                <td>
                                                    @if ($pupil->status == 1)
                                                        <span>Active</span>
                                                    @else
                                                        <span>Inactive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if (!empty($pupil->student_form_10))
                                                        <button class="btn btn-sm btn-info download_student_form" data-path="{{ $pupil->student_form_10 }}">
                                                            <i class="fas fa-download"></i></a>
                                                            Download
                                                        </button>
                                                    @else
                                                        <span class="text-danger">No Form 10</span>
                                                    @endif
                                                </td>
                                                <td class="py-0 align-middle">
                                                    <div class="btn-group btn-group-md">
                                                        <a href="#" class="btn btn-success edit" data-toggle="modal"
                                                            data-target="#modal-view" data-id="{{ $pupil->id }}" data-path="{{ route('pupil_management_edit') }}"><i
                                                                class="fas fa-eye"></i></a>
                                                        <a href="#" class="btn btn-primary edit" data-toggle="modal"
                                                            data-target="#modal-edit" data-id="{{ $pupil->id }}" data-path="{{ route('pupil_management_edit') }}"><i
                                                                class="fas fa-edit"></i></a>
                                                        @if ($pupil->status == 1)
                                                            <a href="#" class="btn btn-warning edit" data-toggle="modal"
                                                                data-target="#modal-status" data-id="{{ $pupil->id }}" data-path="{{ route('pupil_management_edit') }}"><i
                                                                    class="fas fa-times-circle"></i></a>
                                                        @else
                                                            <a href="#" class="btn btn-warning edit" data-toggle="modal"
                                                                data-target="#modal-status" data-id="{{ $pupil->id }}" data-path="{{ route('pupil_management_edit') }}"><i
                                                                    class="fas fa-check-circle"></i></a>
                                                        @endif
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

    <div class="modal fade" id="modal-add">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fa fa-users"></i> Add Pupil</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="formPostWithFile" action="{{ route('pupil_management_store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="d-flex justify-content-center align-items-center">
                                    <img src="{{ asset('dist/img/user.png') }}" id="pupil_image" alt="User Image" style="width: 250px; height: 225px; border-radius: 50%; object-fit: cover;">
                                </div>
                                <div class="input-group mt-1">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="input_pupil_image" name="pupil_image">
                                        <label class="custom-file-label" for="input_pupil_image">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 mt-4">
                                <div class="form-group">
                                    <label for="first_name">First name: </label>
                                    <input type="text" class="form-control" id="first_name" name="first_name"
                                        placeholder="Enter First name" required>
                                </div>
                                <div class="form-group">
                                    <label for="middle_name">Middle name: <span class="text-danger">(Optional)</span></label>
                                    <input type="text" class="form-control" id="middle_name" name="middle_name"
                                        placeholder="Enter Middle name">
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Last name: </label>
                                    <input type="text" class="form-control" id="last_name" name="last_name"
                                        placeholder="Enter Last name" required>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="birth_date">Birth Date:</label>
                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input"
                                            id="birth_date" name="birth_date" data-target="#reservationdate" />
                                        <div class="input-group-append" data-target="#reservationdate"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Gender</label>
                                    <select class="form-control" id="gender" name="gender" required>
                                        <option value="" selected disabled>Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="email_address">Email Address: <span class="text-danger">(Optional)</span></label>
                                    <input type="email" class="form-control" id="email_address"
                                        name="email_address" placeholder="Enter Email Address">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="address">Address: </label>
                                    <input type="text" class="form-control" id="address" name="address"
                                        placeholder="Enter Address" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Student Form 10: </label>
                                    <div class="input-group mt-1">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="student_form" name="student_form">
                                            <label class="custom-file-label" for="student_form">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="grade_level">Grade level: </label>
                                    <input type="number" class="form-control" id="grade_level" name="grade_level"
                                        placeholder="Enter Grade level" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="section">Section: </label>
                                    <input type="text" class="form-control" id="section" name="section"
                                        placeholder="Enter Section" required>
                                </div>
                            </div>
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

    <div class="modal fade" id="modal-view">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fa fa-users"></i> View Pupil</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="formPost" action="" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="d-flex justify-content-center align-items-center">
                                    <img src="{{ asset('dist/img/user.png') }}" id="v_pupil_image" alt="User Image" style="width: 250px; height: 225px; border-radius: 50%; object-fit: cover;">
                                </div>
                            </div>
                            <div class="col-6 mt-4">
                                <div class="form-group">
                                    <label for="v_first_name">First name: </label>
                                    <input type="text" class="form-control" id="v_first_name" name="first_name"
                                        placeholder="Enter First name" readonly required>
                                </div>
                                <div class="form-group">
                                    <label for="v_middle_name">Middle name: <span class="text-danger">(Optional)</span></label>
                                    <input type="text" class="form-control" id="v_middle_name" name="middle_name"
                                        placeholder="Enter Middle name" readonly required>
                                </div>
                                <div class="form-group">
                                    <label for="v_last_name">Last name: </label>
                                    <input type="text" class="form-control" id="v_last_name" name="last_name"
                                        placeholder="Enter Last name" readonly required>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="v_birth_date">Birth Date:</label>
                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input"
                                            id="v_birth_date" name="birth_date" data-target="#reservationdate" disabled/>
                                        <div class="input-group-append" data-target="#reservationdate"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="v_gender">Gender</label>
                                    <input type="text" class="form-control" id="v_gender" name="gender"
                                        placeholder="Select Gender" readonly required>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="v_email_address">Email Address: <span class="text-danger">(Optional)</span></label>
                                    <input type="email" class="form-control" id="v_email_address"
                                        name="email_address" placeholder="Enter Email Address" readonly required>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="v_address">Address: </label>
                                    <input type="text" class="form-control" id="v_address" name="address"
                                        placeholder="Enter Address" readonly required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Student Form 10: </label>
                                    <button class="btn btn-primary w-100 download_student_form" id="download_student_form" data-path="">Download Student Form</button>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="v_grade_level">Grade level: </label>
                                    <input type="number" class="form-control" id="v_grade_level" name="grade_level"
                                        placeholder="Enter Grade level" readonly required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="v_section">Section: </label>
                                    <input type="text" class="form-control" id="v_section" name="section"
                                        placeholder="Enter Section" readonly required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <div class="modal fade modal-close" id="modal-edit">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fa fa-users"></i> Edit Pupil</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="formPostWithFile" action="{{ route('pupil_management_update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input class="form-control e_id" type="text" name="id" hidden readonly>
                        <div class="row">
                            <div class="col-6">
                                <div class="d-flex justify-content-center align-items-center">
                                    <img src="{{ asset('dist/img/user.png') }}" id="e_pupil_image" alt="User Image" style="width: 250px; height: 225px; border-radius: 50%; object-fit: cover;">
                                </div>
                                <div class="input-group mt-1">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="e_input_pupil_image" name="pupil_image">
                                        <label class="custom-file-label" for="e_input_pupil_image">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 mt-4">
                                <div class="form-group">
                                    <label for="e_first_name">First name: </label>
                                    <input type="text" class="form-control" id="e_first_name" name="first_name"
                                        placeholder="Enter First name" required>
                                </div>
                                <div class="form-group">
                                    <label for="e_middle_name">Middle name: <span class="text-danger">(Optional)</span></label>
                                    <input type="text" class="form-control" id="e_middle_name" name="middle_name"
                                        placeholder="Enter Middle name">
                                </div>
                                <div class="form-group">
                                    <label for="e_last_name">Last name: </label>
                                    <input type="text" class="form-control" id="e_last_name" name="last_name"
                                        placeholder="Enter Last name" required>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="e_birth_date">Birth Date:</label>
                                    <div class="input-group date" id="e_reservationdate" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input"
                                            id="e_birth_date" name="birth_date" data-target="#e_reservationdate" />
                                        <div class="input-group-append" data-target="#e_reservationdate"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="e_gender">Gender</label>
                                    <select class="form-control" id="e_gender" name="gender" required>
                                        <option value="" selected disabled>Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="e_email_address">Email Address: <span class="text-danger">(Optional)</span></label>
                                    <input type="email" class="form-control" id="e_email_address"
                                        name="email_address" placeholder="Enter Email Address">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="e_address">Address: </label>
                                    <input type="text" class="form-control" id="e_address" name="address"
                                        placeholder="Enter Address" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Student Form 10: </label>
                                    <div class="input-group mt-1">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="e_student_form" name="student_form">
                                            <label class="custom-file-label" for="student_form">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-primary download_student_form" id="e_download_student_form" data-path="">Download Student Form</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="e_grade_level">Grade level: </label>
                                    <input type="number" class="form-control" id="e_grade_level" name="grade_level"
                                        placeholder="Enter Grade level" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="e_section">Section: </label>
                                    <input type="text" class="form-control" id="e_section" name="section"
                                        placeholder="Enter Section" required>
                                </div>
                            </div>
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

    <div class="modal fade modal-close" id="modal-status">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fa fa-users"></i> Status Pupil</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="formPost" action="{{ route('pupil_management_destroy') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input class="form-control e_id" type="text" name="id" hidden readonly>
                        <input class="form-control" type="text" name="status" id="status" hidden readonly>
                        <p>Are you sure you want to update the status of this pupil?</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-primary">Yes <i class="fa fa-paper-plane"></i></button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <script>
        $("#pupil_management_link").addClass("active");

        let tableName = "List of Pupil";

        $(document).ready(function () {
            $('#input_pupil_image').on('change', function (e) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    $('#pupil_image').attr('src', e.target.result);
                };
                reader.readAsDataURL(this.files[0]);
            });
            $('#e_input_pupil_image').on('change', function (e) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    $('#e_pupil_image').attr('src', e.target.result);
                };
                reader.readAsDataURL(this.files[0]);
            });
        });

        $('.download_student_form').click(function () {

            const path = $(this).attr('data-path')?.trim();
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 1000
            });

            if (!path) {
                Toast.fire({
                    icon: 'error',
                    title: '<p class="text-center pt-2">This student has no Form 10</p>'
                });
                return;
            }

            const link = document.createElement('a');
            link.href = path;
            link.download = 'student_form10.xlsx';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);

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
                    $("#status").val(data.status);

                    if (data.image != null) {
                        $('#v_pupil_image').attr('src', data.image);
                        $('#e_pupil_image').attr('src', data.image);
                    } else {
                        $('#v_pupil_image').attr('src', "{{ asset('dist/img/user.png') }}");
                        $('#e_pupil_image').attr('src', "{{ asset('dist/img/user.png') }}");
                    }

                    $("#v_pupil_image").val(data.image);
                    $("#v_first_name").val(data.first_name);
                    $("#v_middle_name").val(data.middle_name);
                    $("#v_last_name").val(data.last_name);
                    $("#v_birth_date").val(data.birth_date);
                    $("#v_gender").val(data.gender);
                    $("#v_email_address").val(data.email_address);
                    $("#v_address").val(data.address);
                    $("#v_grade_level").val(data.grade_level);
                    $("#v_section").val(data.section);
                    $("#download_student_form").attr("data-path", data.student_form_10);

                    $("#e_pupil_image").val(data.image);
                    $("#e_first_name").val(data.first_name);
                    $("#e_middle_name").val(data.middle_name);
                    $("#e_last_name").val(data.last_name);
                    $("#e_birth_date").val(data.birth_date);
                    $("#e_gender").val(data.gender);
                    $("#e_email_address").val(data.email_address);
                    $("#e_address").val(data.address);
                    $("#e_grade_level").val(data.grade_level);
                    $("#e_section").val(data.section);
                    $("#e_download_student_form").attr("data-path", data.student_form_10);

                }
            });

        });
    </script>
</x-layout>
