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
                                            {{-- <th>Form 10</th> --}}
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
                                                <td>{{ $pupil->first_name }} {{ $pupil->middle_name }}
                                                    {{ $pupil->last_name }}</td>
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
                                                {{-- <td>
                                                    @if (!empty($pupil->student_form_10))
                                                        <button class="btn btn-sm btn-info download_student_form" data-path="{{ $pupil->student_form_10 }}">
                                                            <i class="fas fa-download"></i></a>
                                                            Download
                                                        </button>
                                                    @else
                                                        <span class="text-danger">No Form 10</span>
                                                    @endif
                                                </td> --}}
                                                <td class="py-0 align-middle">
                                                    <div class="btn-group btn-group-md">
                                                        <a href="#" class="btn btn-success edit"
                                                            data-toggle="modal" data-target="#modal-view"
                                                            data-id="{{ $pupil->id }}"
                                                            data-path="{{ route('pupil_management_edit') }}"><i
                                                                class="fas fa-eye"></i></a>
                                                        <a href="#" class="btn btn-primary edit"
                                                            data-toggle="modal" data-target="#modal-edit"
                                                            data-id="{{ $pupil->id }}"
                                                            data-path="{{ route('pupil_management_edit') }}"><i
                                                                class="fas fa-edit"></i></a>
                                                        @if ($pupil->status == 1)
                                                            <a href="#" class="btn btn-warning edit"
                                                                data-toggle="modal" data-target="#modal-status"
                                                                data-id="{{ $pupil->id }}"
                                                                data-path="{{ route('pupil_management_edit') }}"><i
                                                                    class="fas fa-times-circle"></i></a>
                                                        @else
                                                            <a href="#" class="btn btn-warning edit"
                                                                data-toggle="modal" data-target="#modal-status"
                                                                data-id="{{ $pupil->id }}"
                                                                data-path="{{ route('pupil_management_edit') }}"><i
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
                <form class="formPostWithFile" action="{{ route('pupil_management_store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="d-flex justify-content-center align-items-center">
                                    <img src="{{ asset('dist/img/user.png') }}" id="pupil_image" alt="User Image"
                                        style="width: 250px; height: 225px; border-radius: 50%; object-fit: cover;">
                                </div>
                                <div class="input-group mt-1">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="input_pupil_image"
                                            name="pupil_image">
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
                                    <label for="middle_name">Middle name: <span
                                            class="text-danger">(Optional)</span></label>
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
                                    <label for="email_address">Email Address: <span
                                            class="text-danger">(Optional)</span></label>
                                    <input type="email" class="form-control" id="email_address"
                                        name="email_address" placeholder="Enter Email Address">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="address">Address: </label>
                                    <input type="text" class="form-control" id="address" name="address"
                                        placeholder="Enter Address" required>
                                </div>
                            </div>
                            {{-- <div class="col-6">
                                <div class="form-group">
                                    <label>Student Form 10: </label>
                                    <div class="input-group mt-1">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="student_form" name="student_form">
                                            <label class="custom-file-label" for="student_form">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="grade_level">Grade level: </label>
                                    <input type="number" class="form-control" id="grade_level" name="grade_level"
                                        placeholder="Enter Grade level" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="section">Section: </label>
                                    <input type="text" class="form-control" id="section" name="section"
                                        placeholder="Enter Section" required>
                                </div>
                            </div>
                        </div>
                        <div class="border border-dark p-2">
                            <h1 class="display-6 text-center">SF10-ES</h1>
                            <hr>
                            <div class="row mt-1">
                                <div class="col-md-6">
                                    <label class="form-label">School:</label>
                                    <input type="text" class="form-control" id="SF10_school" name="SF10_school">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">School ID:</label>
                                    <input type="text" class="form-control" id="SF10_school_id" name="SF10_school_id">
                                </div>
                            </div>

                            <div class="row mt-1">
                                <div class="col-md-3">
                                    <label class="form-label">District:</label>
                                    <input type="text" class="form-control" id="SF10_district" name="SF10_district">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Division:</label>
                                    <input type="text" class="form-control" id="SF10_division" name="SF10_division">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Region:</label>
                                    <input type="text" class="form-control" id="SF10_region" name="SF10_region">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">School Year:</label>
                                    <input type="text" class="form-control" id="SF10_school_year" name="SF10_school_year">
                                </div>
                            </div>

                            <div class="row mt-1">
                                <div class="col-md-4">
                                    <label class="form-label">Classified as Grade:</label>
                                    <input type="text" class="form-control" id="SF10_grade" name="SF10_grade" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Section:</label>
                                    <input type="text" class="form-control" id="SF10_section" name="SF10_section" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Name of Adviser/Teacher:</label>
                                    <select class="form-control" id="SF10_teacher" name="SF10_teacher">
                                        <option value="" selected disabled>Select Teacher</option>
                                        @foreach ($teachers as $teacher)
                                            <option value="{{ $teacher->id }}">{{ $teacher->first_name }} {{ $teacher->middle_name }} {{ $teacher->last_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <hr class="border border-dark">
                            <table class="table table-bordered text-center align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th rowspan="2">LEARNING AREAS</th>
                                        <th colspan="4">Quarterly Rating</th>
                                        <th rowspan="2">Final Rating</th>
                                        <th rowspan="2">Remarks</th>
                                    </tr>
                                    <tr>
                                        <th>1</th>
                                        <th>2</th>
                                        <th>3</th>
                                        <th>4</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <!-- Hardcoded version for each subject -->
                                    <tr>
                                        <td><strong>Mother Tongue</strong></td>
                                        <td><input class="form-control text-center" id="SF10_1_mother_tongue" name="SF10_1_mother_tongue" ></td>
                                        <td><input class="form-control text-center" id="SF10_2_mother_tongue" name="SF10_2_mother_tongue" ></td>
                                        <td><input class="form-control text-center" id="SF10_3_mother_tongue" name="SF10_3_mother_tongue" ></td>
                                        <td><input class="form-control text-center" id="SF10_4_mother_tongue" name="SF10_4_mother_tongue" ></td>
                                        <td><input class="form-control text-center" id="SF10_final_mother_tongue" name="SF10_final_mother_tongue" ></td>
                                        <td><input class="form-control text-center" id="SF10_remarks_mother_tongue" name="SF10_remarks_mother_tongue" ></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Filipino</strong></td>
                                        <td><input class="form-control text-center" id="SF10_1_filipino" name="SF10_1_filipino" ></td>
                                        <td><input class="form-control text-center" id="SF10_2_filipino" name="SF10_2_filipino" ></td>
                                        <td><input class="form-control text-center" id="SF10_3_filipino" name="SF10_3_filipino" ></td>
                                        <td><input class="form-control text-center" id="SF10_4_filipino" name="SF10_4_filipino" ></td>
                                        <td><input class="form-control text-center" id="SF10_final_filipino" name="SF10_final_filipino" ></td>
                                        <td><input class="form-control text-center" id="SF10_remarks_filipino" name="SF10_remarks_filipino" ></td>
                                    </tr>
                                    <tr>
                                        <td><strong>English</strong></td>
                                        <td><input class="form-control text-center" id="SF10_1_english" name="SF10_1_english" ></td>
                                        <td><input class="form-control text-center" id="SF10_2_english" name="SF10_2_english" ></td>
                                        <td><input class="form-control text-center" id="SF10_3_english" name="SF10_3_english" ></td>
                                        <td><input class="form-control text-center" id="SF10_4_english" name="SF10_4_english" ></td>
                                        <td><input class="form-control text-center" id="SF10_final_english" name="SF10_final_english" ></td>
                                        <td><input class="form-control text-center" id="SF10_remarks_english" name="SF10_remarks_english" ></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Mathematics</strong></td>
                                        <td><input class="form-control text-center" id="SF10_1_mathematics" name="SF10_1_mathematics" ></td>
                                        <td><input class="form-control text-center" id="SF10_2_mathematics" name="SF10_2_mathematics" ></td>
                                        <td><input class="form-control text-center" id="SF10_3_mathematics" name="SF10_3_mathematics" ></td>
                                        <td><input class="form-control text-center" id="SF10_4_mathematics" name="SF10_4_mathematics" ></td>
                                        <td><input class="form-control text-center" id="SF10_final_mathematics" name="SF10_final_mathematics" ></td>
                                        <td><input class="form-control text-center" id="SF10_remarks_mathematics" name="SF10_remarks_mathematics" ></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Science</strong></td>
                                        <td><input class="form-control text-center" id="SF10_1_science" name="SF10_1_science" ></td>
                                        <td><input class="form-control text-center" id="SF10_2_science" name="SF10_2_science" ></td>
                                        <td><input class="form-control text-center" id="SF10_3_science" name="SF10_3_science" ></td>
                                        <td><input class="form-control text-center" id="SF10_4_science" name="SF10_4_science" ></td>
                                        <td><input class="form-control text-center" id="SF10_final_science" name="SF10_final_science" ></td>
                                        <td><input class="form-control text-center" id="SF10_remarks_science" name="SF10_remarks_science" ></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Araling Panlipunan</strong></td>
                                        <td><input class="form-control text-center" id="SF10_1_araling_panlipunan" name="SF10_1_araling_panlipunan" ></td>
                                        <td><input class="form-control text-center" id="SF10_2_araling_panlipunan" name="SF10_2_araling_panlipunan" ></td>
                                        <td><input class="form-control text-center" id="SF10_3_araling_panlipunan" name="SF10_3_araling_panlipunan" ></td>
                                        <td><input class="form-control text-center" id="SF10_4_araling_panlipunan" name="SF10_4_araling_panlipunan" ></td>
                                        <td><input class="form-control text-center" id="SF10_final_araling_panlipunan" name="SF10_final_araling_panlipunan" ></td>
                                        <td><input class="form-control text-center" id="SF10_remarks_araling_panlipunan" name="SF10_remarks_araling_panlipunan" ></td>
                                    </tr>
                                    <tr>
                                        <td><strong>EPP / TLE</strong></td>
                                        <td><input class="form-control text-center" id="SF10_1_epp_tle" name="SF10_1_epp_tle" ></td>
                                        <td><input class="form-control text-center" id="SF10_2_epp_tle" name="SF10_2_epp_tle" ></td>
                                        <td><input class="form-control text-center" id="SF10_3_epp_tle" name="SF10_3_epp_tle" ></td>
                                        <td><input class="form-control text-center" id="SF10_4_epp_tle" name="SF10_4_epp_tle" ></td>
                                        <td><input class="form-control text-center" id="SF10_final_epp_tle" name="SF10_final_epp_tle" ></td>
                                        <td><input class="form-control text-center" id="SF10_remarks_epp_tle" name="SF10_remarks_epp_tle" ></td>
                                    </tr>
                                    <tr>
                                        <td><strong>MAPEH</strong></td>
                                        <td colspan="6"></td>
                                    </tr>
                                    <tr>
                                        <td>Music</td>
                                        <td><input class="form-control text-center" id="SF10_1_music" name="SF10_1_music" ></td>
                                        <td><input class="form-control text-center" id="SF10_2_music" name="SF10_2_music" ></td>
                                        <td><input class="form-control text-center" id="SF10_3_music" name="SF10_3_music" ></td>
                                        <td><input class="form-control text-center" id="SF10_4_music" name="SF10_4_music" ></td>
                                        <td><input class="form-control text-center" id="SF10_final_music" name="SF10_final_music" ></td>
                                        <td><input class="form-control text-center" id="SF10_remarks_music" name="SF10_remarks_music" ></td>
                                    </tr>
                                    <tr>
                                        <td>Arts</td>
                                        <td><input class="form-control text-center" id="SF10_1_arts" name="SF10_1_arts" ></td>
                                        <td><input class="form-control text-center" id="SF10_2_arts" name="SF10_2_arts" ></td>
                                        <td><input class="form-control text-center" id="SF10_3_arts" name="SF10_3_arts" ></td>
                                        <td><input class="form-control text-center" id="SF10_4_arts" name="SF10_4_arts" ></td>
                                        <td><input class="form-control text-center" id="SF10_final_arts" name="SF10_final_arts" ></td>
                                        <td><input class="form-control text-center" id="SF10_remarks_arts" name="SF10_remarks_arts" ></td>
                                    </tr>
                                    <tr>
                                        <td>Physical Education</td>
                                        <td><input class="form-control text-center" id="SF10_1_physical_education" name="SF10_1_physical_education" ></td>
                                        <td><input class="form-control text-center" id="SF10_2_physical_education" name="SF10_2_physical_education" ></td>
                                        <td><input class="form-control text-center" id="SF10_3_physical_education" name="SF10_3_physical_education" ></td>
                                        <td><input class="form-control text-center" id="SF10_4_physical_education" name="SF10_4_physical_education" ></td>
                                        <td><input class="form-control text-center" id="SF10_final_physical_education" name="SF10_final_physical_education" ></td>
                                        <td><input class="form-control text-center" id="SF10_remarks_physical_education" name="SF10_remarks_physical_education" ></td>
                                    </tr>
                                    <tr>
                                        <td>Health</td>
                                        <td><input class="form-control text-center" id="SF10_1_health" name="SF10_1_health" ></td>
                                        <td><input class="form-control text-center" id="SF10_2_health" name="SF10_2_health" ></td>
                                        <td><input class="form-control text-center" id="SF10_3_health" name="SF10_3_health" ></td>
                                        <td><input class="form-control text-center" id="SF10_4_health" name="SF10_4_health" ></td>
                                        <td><input class="form-control text-center" id="SF10_final_health" name="SF10_final_health" ></td>
                                        <td><input class="form-control text-center" id="SF10_remarks_health" name="SF10_remarks_health" ></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Eduk. sa Pagpapakatao</strong></td>
                                        <td colspan="6"></td>
                                    </tr>
                                    <tr>
                                        <td>*Arabic Language</td>
                                        <td><input class="form-control text-center" id="SF10_1_arabic_language" name="SF10_1_arabic_language" ></td>
                                        <td><input class="form-control text-center" id="SF10_2_arabic_language" name="SF10_2_arabic_language" ></td>
                                        <td><input class="form-control text-center" id="SF10_3_arabic_language" name="SF10_3_arabic_language" ></td>
                                        <td><input class="form-control text-center" id="SF10_4_arabic_language" name="SF10_4_arabic_language" ></td>
                                        <td><input class="form-control text-center" id="SF10_final_arabic_language" name="SF10_final_arabic_language" ></td>
                                        <td><input class="form-control text-center" id="SF10_remarks_arabic_language" name="SF10_remarks_arabic_language" ></td>
                                    </tr>
                                    <tr>
                                        <td>*Islamic Values Education</td>
                                        <td><input class="form-control text-center" id="SF10_1_islamic_values_education" name="SF10_1_islamic_values_education" ></td>
                                        <td><input class="form-control text-center" id="SF10_2_islamic_values_education" name="SF10_2_islamic_values_education" ></td>
                                        <td><input class="form-control text-center" id="SF10_3_islamic_values_education" name="SF10_3_islamic_values_education" ></td>
                                        <td><input class="form-control text-center" id="SF10_4_islamic_values_education" name="SF10_4_islamic_values_education" ></td>
                                        <td><input class="form-control text-center" id="SF10_final_islamic_values_education" name="SF10_final_islamic_values_education" ></td>
                                        <td><input class="form-control text-center" id="SF10_remarks_islamic_values_education" name="SF10_remarks_islamic_values_education" ></td>
                                    </tr>
                                    <tr>
                                        <td><strong>General Average</strong></td>
                                        <td colspan="4"></td>
                                        <td><input class="form-control text-center" id="SF10_final_general_average" name="SF10_final_general_average" ></td>
                                        <td><input class="form-control text-center" id="SF10_remarks_general_average" name="SF10_remarks_general_average" ></td>
                                    </tr>
                                </tbody>
                            </table>
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
                                    <img src="{{ asset('dist/img/user.png') }}" id="v_pupil_image" alt="User Image"
                                        style="width: 250px; height: 225px; border-radius: 50%; object-fit: cover;">
                                </div>
                            </div>
                            <div class="col-6 mt-4">
                                <div class="form-group">
                                    <label for="v_first_name">First name: </label>
                                    <input type="text" class="form-control" id="v_first_name" name="first_name"
                                        placeholder="Enter First name" readonly required>
                                </div>
                                <div class="form-group">
                                    <label for="v_middle_name">Middle name: <span
                                            class="text-danger">(Optional)</span></label>
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
                                            id="v_birth_date" name="birth_date" data-target="#reservationdate"
                                            disabled />
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
                                    <label for="v_email_address">Email Address: <span
                                            class="text-danger">(Optional)</span></label>
                                    <input type="email" class="form-control" id="v_email_address"
                                        name="email_address" placeholder="Enter Email Address" readonly required>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="v_address">Address: </label>
                                    <input type="text" class="form-control" id="v_address" name="address"
                                        placeholder="Enter Address" readonly required>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="v_grade_level">Grade level: </label>
                                    <input type="number" class="form-control" id="v_grade_level" name="grade_level"
                                        placeholder="Enter Grade level" readonly required>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="v_section">Section: </label>
                                    <input type="text" class="form-control" id="v_section" name="section"
                                        placeholder="Enter Section" readonly required>
                                </div>
                            </div>
                            {{-- <div class="col-6">
                                <div class="form-group">
                                    <label>Student Form 10: </label>
                                    <button class="btn btn-primary w-100 download_student_form"
                                        id="download_student_form" data-path="">Download Student Form</button>
                                </div>
                            </div> --}}
                        </div>
                        
                        <div class="border border-dark p-2">
                            <h1 class="display-6 text-center">SF10-ES</h1>
                            <hr>
                            <div class="row mt-1">
                                <div class="col-md-6">
                                    <label class="form-label">School:</label>
                                    <input type="text" class="form-control" id="v_SF10_school" name="SF10_school" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">School ID:</label>
                                    <input type="text" class="form-control" id="v_SF10_school_id" name="SF10_school_id" readonly>
                                </div>
                            </div>

                            <div class="row mt-1">
                                <div class="col-md-3">
                                    <label class="form-label">District:</label>
                                    <input type="text" class="form-control" id="v_SF10_district" name="SF10_district" readonly>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Division:</label>
                                    <input type="text" class="form-control" id="v_SF10_division" name="SF10_division" readonly>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Region:</label>
                                    <input type="text" class="form-control" id="v_SF10_region" name="SF10_region" readonly>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">School Year:</label>
                                    <input type="text" class="form-control" id="v_SF10_school_year" name="SF10_school_year" readonly>
                                </div>
                            </div>

                            <div class="row mt-1">
                                <div class="col-md-4">
                                    <label class="form-label">Classified as Grade:</label>
                                    <input type="text" class="form-control" id="v_SF10_grade" name="SF10_grade" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Section:</label>
                                    <input type="text" class="form-control" id="v_SF10_section" name="SF10_section" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Name of Adviser/Teacher:</label>
                                    <select class="form-control" id="v_SF10_teacher" name="SF10_teacher" disabled>
                                        @foreach ($teachers as $teacher)
                                            <option value="{{ $teacher->id }}">{{ $teacher->first_name }} {{ $teacher->middle_name }} {{ $teacher->last_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <hr class="border border-dark">
                            <table class="table table-bordered text-center align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th rowspan="2">LEARNING AREAS</th>
                                        <th colspan="4">Quarterly Rating</th>
                                        <th rowspan="2">Final Rating</th>
                                        <th rowspan="2">Remarks</th>
                                    </tr>
                                    <tr>
                                        <th>1</th>
                                        <th>2</th>
                                        <th>3</th>
                                        <th>4</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <!-- Hardcoded version for each subject -->
                                    <tr>
                                        <td><strong>Mother Tongue</strong></td>
                                        <td><input class="form-control text-center" id="v_SF10_1_mother_tongue" name="SF10_1_mother_tongue"  readonly></td>
                                        <td><input class="form-control text-center" id="v_SF10_2_mother_tongue" name="SF10_2_mother_tongue"  readonly></td>
                                        <td><input class="form-control text-center" id="v_SF10_3_mother_tongue" name="SF10_3_mother_tongue"  readonly></td>
                                        <td><input class="form-control text-center" id="v_SF10_4_mother_tongue" name="SF10_4_mother_tongue"  readonly></td>
                                        <td><input class="form-control text-center" id="v_SF10_final_mother_tongue" name="SF10_final_mother_tongue"  readonly></td>
                                        <td><input class="form-control text-center" id="v_SF10_remarks_mother_tongue" name="SF10_remarks_mother_tongue"  readonly></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Filipino</strong></td>
                                        <td><input class="form-control text-center" id="v_SF10_1_filipino" name="SF10_1_filipino"  readonly></td>
                                        <td><input class="form-control text-center" id="v_SF10_2_filipino" name="SF10_2_filipino"  readonly></td>
                                        <td><input class="form-control text-center" id="v_SF10_3_filipino" name="SF10_3_filipino"  readonly></td>
                                        <td><input class="form-control text-center" id="v_SF10_4_filipino" name="SF10_4_filipino"  readonly></td>
                                        <td><input class="form-control text-center" id="v_SF10_final_filipino" name="SF10_final_filipino"  readonly></td>
                                        <td><input class="form-control text-center" id="v_SF10_remarks_filipino" name="SF10_remarks_filipino"  readonly></td>
                                    </tr>
                                    <tr>
                                        <td><strong>English</strong></td>
                                        <td><input class="form-control text-center" id="v_SF10_1_english" name="SF10_1_english"  readonly></td>
                                        <td><input class="form-control text-center" id="v_SF10_2_english" name="SF10_2_english"  readonly></td>
                                        <td><input class="form-control text-center" id="v_SF10_3_english" name="SF10_3_english"  readonly></td>
                                        <td><input class="form-control text-center" id="v_SF10_4_english" name="SF10_4_english"  readonly></td>
                                        <td><input class="form-control text-center" id="v_SF10_final_english" name="SF10_final_english"  readonly></td>
                                        <td><input class="form-control text-center" id="v_SF10_remarks_english" name="SF10_remarks_english"  readonly></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Mathematics</strong></td>
                                        <td><input class="form-control text-center" id="v_SF10_1_mathematics" name="SF10_1_mathematics"  readonly></td>
                                        <td><input class="form-control text-center" id="v_SF10_2_mathematics" name="SF10_2_mathematics"  readonly></td>
                                        <td><input class="form-control text-center" id="v_SF10_3_mathematics" name="SF10_3_mathematics"  readonly></td>
                                        <td><input class="form-control text-center" id="v_SF10_4_mathematics" name="SF10_4_mathematics"  readonly></td>
                                        <td><input class="form-control text-center" id="v_SF10_final_mathematics" name="SF10_final_mathematics"  readonly></td>
                                        <td><input class="form-control text-center" id="v_SF10_remarks_mathematics" name="SF10_remarks_mathematics"  readonly></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Science</strong></td>
                                        <td><input class="form-control text-center" id="v_SF10_1_science" name="SF10_1_science"  readonly></td>
                                        <td><input class="form-control text-center" id="v_SF10_2_science" name="SF10_2_science"  readonly></td>
                                        <td><input class="form-control text-center" id="v_SF10_3_science" name="SF10_3_science"  readonly></td>
                                        <td><input class="form-control text-center" id="v_SF10_4_science" name="SF10_4_science"  readonly></td>
                                        <td><input class="form-control text-center" id="v_SF10_final_science" name="SF10_final_science"  readonly></td>
                                        <td><input class="form-control text-center" id="v_SF10_remarks_science" name="SF10_remarks_science"  readonly></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Araling Panlipunan</strong></td>
                                        <td><input class="form-control text-center" id="v_SF10_1_araling_panlipunan" name="SF10_1_araling_panlipunan"  readonly></td>
                                        <td><input class="form-control text-center" id="v_SF10_2_araling_panlipunan" name="SF10_2_araling_panlipunan"  readonly></td>
                                        <td><input class="form-control text-center" id="v_SF10_3_araling_panlipunan" name="SF10_3_araling_panlipunan"  readonly></td>
                                        <td><input class="form-control text-center" id="v_SF10_4_araling_panlipunan" name="SF10_4_araling_panlipunan"  readonly></td>
                                        <td><input class="form-control text-center" id="v_SF10_final_araling_panlipunan" name="SF10_final_araling_panlipunan"  readonly></td>
                                        <td><input class="form-control text-center" id="v_SF10_remarks_araling_panlipunan" name="SF10_remarks_araling_panlipunan"  readonly></td>
                                    </tr>
                                    <tr>
                                        <td><strong>EPP / TLE</strong></td>
                                        <td><input class="form-control text-center" id="v_SF10_1_epp_tle" name="SF10_1_epp_tle"  readonly></td>
                                        <td><input class="form-control text-center" id="v_SF10_2_epp_tle" name="SF10_2_epp_tle"  readonly></td>
                                        <td><input class="form-control text-center" id="v_SF10_3_epp_tle" name="SF10_3_epp_tle"  readonly></td>
                                        <td><input class="form-control text-center" id="v_SF10_4_epp_tle" name="SF10_4_epp_tle"  readonly></td>
                                        <td><input class="form-control text-center" id="v_SF10_final_epp_tle" name="SF10_final_epp_tle"  readonly></td>
                                        <td><input class="form-control text-center" id="v_SF10_remarks_epp_tle" name="SF10_remarks_epp_tle"  readonly></td>
                                    </tr>
                                    <tr>
                                        <td><strong>MAPEH</strong></td>
                                        <td colspan="6"></td>
                                    </tr>
                                    <tr>
                                        <td>Music</td>
                                        <td><input class="form-control text-center" id="v_SF10_1_music" name="SF10_1_music"  readonly></td>
                                        <td><input class="form-control text-center" id="v_SF10_2_music" name="SF10_2_music"  readonly></td>
                                        <td><input class="form-control text-center" id="v_SF10_3_music" name="SF10_3_music"  readonly></td>
                                        <td><input class="form-control text-center" id="v_SF10_4_music" name="SF10_4_music"  readonly></td>
                                        <td><input class="form-control text-center" id="v_SF10_final_music" name="SF10_final_music"  readonly></td>
                                        <td><input class="form-control text-center" id="v_SF10_remarks_music" name="SF10_remarks_music"  readonly></td>
                                    </tr>
                                    <tr>
                                        <td>Arts</td>
                                        <td><input class="form-control text-center" id="v_SF10_1_arts" name="SF10_1_arts"  readonly></td>
                                        <td><input class="form-control text-center" id="v_SF10_2_arts" name="SF10_2_arts"  readonly></td>
                                        <td><input class="form-control text-center" id="v_SF10_3_arts" name="SF10_3_arts"  readonly></td>
                                        <td><input class="form-control text-center" id="v_SF10_4_arts" name="SF10_4_arts"  readonly></td>
                                        <td><input class="form-control text-center" id="v_SF10_final_arts" name="SF10_final_arts"  readonly></td>
                                        <td><input class="form-control text-center" id="v_SF10_remarks_arts" name="SF10_remarks_arts"  readonly></td>
                                    </tr>
                                    <tr>
                                        <td>Physical Education</td>
                                        <td><input class="form-control text-center" id="v_SF10_1_physical_education" name="SF10_1_physical_education"  readonly></td>
                                        <td><input class="form-control text-center" id="v_SF10_2_physical_education" name="SF10_2_physical_education"  readonly></td>
                                        <td><input class="form-control text-center" id="v_SF10_3_physical_education" name="SF10_3_physical_education"  readonly></td>
                                        <td><input class="form-control text-center" id="v_SF10_4_physical_education" name="SF10_4_physical_education"  readonly></td>
                                        <td><input class="form-control text-center" id="v_SF10_final_physical_education" name="SF10_final_physical_education"  readonly></td>
                                        <td><input class="form-control text-center" id="v_SF10_remarks_physical_education" name="SF10_remarks_physical_education"  readonly></td>
                                    </tr>
                                    <tr>
                                        <td>Health</td>
                                        <td><input class="form-control text-center" id="v_SF10_1_health" name="SF10_1_health"  readonly></td>
                                        <td><input class="form-control text-center" id="v_SF10_2_health" name="SF10_2_health"  readonly></td>
                                        <td><input class="form-control text-center" id="v_SF10_3_health" name="SF10_3_health"  readonly></td>
                                        <td><input class="form-control text-center" id="v_SF10_4_health" name="SF10_4_health"  readonly></td>
                                        <td><input class="form-control text-center" id="v_SF10_final_health" name="SF10_final_health"  readonly></td>
                                        <td><input class="form-control text-center" id="v_SF10_remarks_health" name="SF10_remarks_health"  readonly></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Eduk. sa Pagpapakatao</strong></td>
                                        <td colspan="6"></td>
                                    </tr>
                                    <tr>
                                        <td>*Arabic Language</td>
                                        <td><input class="form-control text-center" id="v_SF10_1_arabic_language" name="SF10_1_arabic_language"  readonly></td>
                                        <td><input class="form-control text-center" id="v_SF10_2_arabic_language" name="SF10_2_arabic_language"  readonly></td>
                                        <td><input class="form-control text-center" id="v_SF10_3_arabic_language" name="SF10_3_arabic_language"  readonly></td>
                                        <td><input class="form-control text-center" id="v_SF10_4_arabic_language" name="SF10_4_arabic_language"  readonly></td>
                                        <td><input class="form-control text-center" id="v_SF10_final_arabic_language" name="SF10_final_arabic_language"  readonly></td>
                                        <td><input class="form-control text-center" id="v_SF10_remarks_arabic_language" name="SF10_remarks_arabic_language"  readonly></td>
                                    </tr>
                                    <tr>
                                        <td>*Islamic Values Education</td>
                                        <td><input class="form-control text-center" id="v_SF10_1_islamic_values_education" name="SF10_1_islamic_values_education"  readonly></td>
                                        <td><input class="form-control text-center" id="v_SF10_2_islamic_values_education" name="SF10_2_islamic_values_education"  readonly></td>
                                        <td><input class="form-control text-center" id="v_SF10_3_islamic_values_education" name="SF10_3_islamic_values_education"  readonly></td>
                                        <td><input class="form-control text-center" id="v_SF10_4_islamic_values_education" name="SF10_4_islamic_values_education"  readonly></td>
                                        <td><input class="form-control text-center" id="v_SF10_final_islamic_values_education" name="SF10_final_islamic_values_education"  readonly></td>
                                        <td><input class="form-control text-center" id="v_SF10_remarks_islamic_values_education" name="SF10_remarks_islamic_values_education"  readonly></td>
                                    </tr>
                                    <tr>
                                        <td><strong>General Average</strong></td>
                                        <td colspan="4"></td>
                                        <td><input class="form-control text-center" id="v_SF10_final_general_average" name="SF10_final_general_average"  readonly></td>
                                        <td><input class="form-control text-center" id="v_SF10_remarks_general_average" name="SF10_remarks_general_average"  readonly></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <a href="#" rel="noopener" data-id="" target="_blank" class="btn btn-primary"  id="pupil_print"><i class="fas fa-print"></i> Print</a>
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
                <form class="formPostWithFile" action="{{ route('pupil_management_update') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input class="form-control e_id" type="text" name="id" hidden readonly>
                        <div class="row">
                            <div class="col-6">
                                <div class="d-flex justify-content-center align-items-center">
                                    <img src="{{ asset('dist/img/user.png') }}" id="e_pupil_image" alt="User Image"
                                        style="width: 250px; height: 225px; border-radius: 50%; object-fit: cover;">
                                </div>
                                <div class="input-group mt-1">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="e_input_pupil_image"
                                            name="pupil_image">
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
                                    <label for="e_middle_name">Middle name: <span
                                            class="text-danger">(Optional)</span></label>
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
                                    <label for="e_email_address">Email Address: <span
                                            class="text-danger">(Optional)</span></label>
                                    <input type="email" class="form-control" id="e_email_address"
                                        name="email_address" placeholder="Enter Email Address">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="e_address">Address: </label>
                                    <input type="text" class="form-control" id="e_address" name="address"
                                        placeholder="Enter Address" required>
                                </div>
                            </div>
                            {{-- <div class="col-4">
                                <div class="form-group">
                                    <label>Student Form 10: </label>
                                    <div class="input-group mt-1">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="e_student_form"
                                                name="student_form">
                                            <label class="custom-file-label" for="student_form">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-primary download_student_form"
                                                id="e_download_student_form" data-path="">Download Student
                                                Form</button>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="e_grade_level">Grade level: </label>
                                    <input type="number" class="form-control" id="e_grade_level" name="grade_level"
                                        placeholder="Enter Grade level" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="e_section">Section: </label>
                                    <input type="text" class="form-control" id="e_section" name="section"
                                        placeholder="Enter Section" required>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-1">
                        </div>
                        
                        <div class="border border-dark p-2">
                            <h1 class="display-6 text-center">SF10-ES</h1>
                            <hr>
                            <div class="row mt-1">
                                <div class="col-md-6">
                                    <label class="form-label">School:</label>
                                    <input type="text" class="form-control" id="e_SF10_school" name="SF10_school">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">School ID:</label>
                                    <input type="text" class="form-control" id="e_SF10_school_id" name="SF10_school_id">
                                </div>
                            </div>

                            <div class="row mt-1">
                                <div class="col-md-3">
                                    <label class="form-label">District:</label>
                                    <input type="text" class="form-control" id="e_SF10_district" name="SF10_district">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Division:</label>
                                    <input type="text" class="form-control" id="e_SF10_division" name="SF10_division">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Region:</label>
                                    <input type="text" class="form-control" id="e_SF10_region" name="SF10_region">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">School Year:</label>
                                    <input type="text" class="form-control" id="e_SF10_school_year" name="SF10_school_year">
                                </div>
                            </div>

                            <div class="row mt-1">
                                <div class="col-md-4">
                                    <label class="form-label">Classified as Grade:</label>
                                    <input type="text" class="form-control" id="e_SF10_grade" name="SF10_grade" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Section:</label>
                                    <input type="text" class="form-control" id="e_SF10_section" name="SF10_section" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Name of Adviser/Teacher:</label>
                                    <select class="form-control" id="e_SF10_teacher" name="SF10_teacher">
                                        @foreach ($teachers as $teacher)
                                            <option value="{{ $teacher->id }}">{{ $teacher->first_name }} {{ $teacher->middle_name }} {{ $teacher->last_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <hr class="border border-dark">
                            <table class="table table-bordered text-center align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th rowspan="2">LEARNING AREAS</th>
                                        <th colspan="4">Quarterly Rating</th>
                                        <th rowspan="2">Final Rating</th>
                                        <th rowspan="2">Remarks</th>
                                    </tr>
                                    <tr>
                                        <th>1</th>
                                        <th>2</th>
                                        <th>3</th>
                                        <th>4</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <!-- Hardcoded version for each subject -->
                                    <tr>
                                        <td><strong>Mother Tongue</strong></td>
                                        <td><input class="form-control text-center" id="e_SF10_1_mother_tongue" name="SF10_1_mother_tongue" ></td>
                                        <td><input class="form-control text-center" id="e_SF10_2_mother_tongue" name="SF10_2_mother_tongue" ></td>
                                        <td><input class="form-control text-center" id="e_SF10_3_mother_tongue" name="SF10_3_mother_tongue" ></td>
                                        <td><input class="form-control text-center" id="e_SF10_4_mother_tongue" name="SF10_4_mother_tongue" ></td>
                                        <td><input class="form-control text-center" id="e_SF10_final_mother_tongue" name="SF10_final_mother_tongue" ></td>
                                        <td><input class="form-control text-center" id="e_SF10_remarks_mother_tongue" name="SF10_remarks_mother_tongue" ></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Filipino</strong></td>
                                        <td><input class="form-control text-center" id="e_SF10_1_filipino" name="SF10_1_filipino" ></td>
                                        <td><input class="form-control text-center" id="e_SF10_2_filipino" name="SF10_2_filipino" ></td>
                                        <td><input class="form-control text-center" id="e_SF10_3_filipino" name="SF10_3_filipino" ></td>
                                        <td><input class="form-control text-center" id="e_SF10_4_filipino" name="SF10_4_filipino" ></td>
                                        <td><input class="form-control text-center" id="e_SF10_final_filipino" name="SF10_final_filipino" ></td>
                                        <td><input class="form-control text-center" id="e_SF10_remarks_filipino" name="SF10_remarks_filipino" ></td>
                                    </tr>
                                    <tr>
                                        <td><strong>English</strong></td>
                                        <td><input class="form-control text-center" id="e_SF10_1_english" name="SF10_1_english" ></td>
                                        <td><input class="form-control text-center" id="e_SF10_2_english" name="SF10_2_english" ></td>
                                        <td><input class="form-control text-center" id="e_SF10_3_english" name="SF10_3_english" ></td>
                                        <td><input class="form-control text-center" id="e_SF10_4_english" name="SF10_4_english" ></td>
                                        <td><input class="form-control text-center" id="e_SF10_final_english" name="SF10_final_english" ></td>
                                        <td><input class="form-control text-center" id="e_SF10_remarks_english" name="SF10_remarks_english" ></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Mathematics</strong></td>
                                        <td><input class="form-control text-center" id="e_SF10_1_mathematics" name="SF10_1_mathematics" ></td>
                                        <td><input class="form-control text-center" id="e_SF10_2_mathematics" name="SF10_2_mathematics" ></td>
                                        <td><input class="form-control text-center" id="e_SF10_3_mathematics" name="SF10_3_mathematics" ></td>
                                        <td><input class="form-control text-center" id="e_SF10_4_mathematics" name="SF10_4_mathematics" ></td>
                                        <td><input class="form-control text-center" id="e_SF10_final_mathematics" name="SF10_final_mathematics" ></td>
                                        <td><input class="form-control text-center" id="e_SF10_remarks_mathematics" name="SF10_remarks_mathematics" ></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Science</strong></td>
                                        <td><input class="form-control text-center" id="e_SF10_1_science" name="SF10_1_science" ></td>
                                        <td><input class="form-control text-center" id="e_SF10_2_science" name="SF10_2_science" ></td>
                                        <td><input class="form-control text-center" id="e_SF10_3_science" name="SF10_3_science" ></td>
                                        <td><input class="form-control text-center" id="e_SF10_4_science" name="SF10_4_science" ></td>
                                        <td><input class="form-control text-center" id="e_SF10_final_science" name="SF10_final_science" ></td>
                                        <td><input class="form-control text-center" id="e_SF10_remarks_science" name="SF10_remarks_science" ></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Araling Panlipunan</strong></td>
                                        <td><input class="form-control text-center" id="e_SF10_1_araling_panlipunan" name="SF10_1_araling_panlipunan" ></td>
                                        <td><input class="form-control text-center" id="e_SF10_2_araling_panlipunan" name="SF10_2_araling_panlipunan" ></td>
                                        <td><input class="form-control text-center" id="e_SF10_3_araling_panlipunan" name="SF10_3_araling_panlipunan" ></td>
                                        <td><input class="form-control text-center" id="e_SF10_4_araling_panlipunan" name="SF10_4_araling_panlipunan" ></td>
                                        <td><input class="form-control text-center" id="e_SF10_final_araling_panlipunan" name="SF10_final_araling_panlipunan" ></td>
                                        <td><input class="form-control text-center" id="e_SF10_remarks_araling_panlipunan" name="SF10_remarks_araling_panlipunan" ></td>
                                    </tr>
                                    <tr>
                                        <td><strong>EPP / TLE</strong></td>
                                        <td><input class="form-control text-center" id="e_SF10_1_epp_tle" name="SF10_1_epp_tle" ></td>
                                        <td><input class="form-control text-center" id="e_SF10_2_epp_tle" name="SF10_2_epp_tle" ></td>
                                        <td><input class="form-control text-center" id="e_SF10_3_epp_tle" name="SF10_3_epp_tle" ></td>
                                        <td><input class="form-control text-center" id="e_SF10_4_epp_tle" name="SF10_4_epp_tle" ></td>
                                        <td><input class="form-control text-center" id="e_SF10_final_epp_tle" name="SF10_final_epp_tle" ></td>
                                        <td><input class="form-control text-center" id="e_SF10_remarks_epp_tle" name="SF10_remarks_epp_tle" ></td>
                                    </tr>
                                    <tr>
                                        <td><strong>MAPEH</strong></td>
                                        <td colspan="6"></td>
                                    </tr>
                                    <tr>
                                        <td>Music</td>
                                        <td><input class="form-control text-center" id="e_SF10_1_music" name="SF10_1_music" ></td>
                                        <td><input class="form-control text-center" id="e_SF10_2_music" name="SF10_2_music" ></td>
                                        <td><input class="form-control text-center" id="e_SF10_3_music" name="SF10_3_music" ></td>
                                        <td><input class="form-control text-center" id="e_SF10_4_music" name="SF10_4_music" ></td>
                                        <td><input class="form-control text-center" id="e_SF10_final_music" name="SF10_final_music" ></td>
                                        <td><input class="form-control text-center" id="e_SF10_remarks_music" name="SF10_remarks_music" ></td>
                                    </tr>
                                    <tr>
                                        <td>Arts</td>
                                        <td><input class="form-control text-center" id="e_SF10_1_arts" name="SF10_1_arts" ></td>
                                        <td><input class="form-control text-center" id="e_SF10_2_arts" name="SF10_2_arts" ></td>
                                        <td><input class="form-control text-center" id="e_SF10_3_arts" name="SF10_3_arts" ></td>
                                        <td><input class="form-control text-center" id="e_SF10_4_arts" name="SF10_4_arts" ></td>
                                        <td><input class="form-control text-center" id="e_SF10_final_arts" name="SF10_final_arts" ></td>
                                        <td><input class="form-control text-center" id="e_SF10_remarks_arts" name="SF10_remarks_arts" ></td>
                                    </tr>
                                    <tr>
                                        <td>Physical Education</td>
                                        <td><input class="form-control text-center" id="e_SF10_1_physical_education" name="SF10_1_physical_education" ></td>
                                        <td><input class="form-control text-center" id="e_SF10_2_physical_education" name="SF10_2_physical_education" ></td>
                                        <td><input class="form-control text-center" id="e_SF10_3_physical_education" name="SF10_3_physical_education" ></td>
                                        <td><input class="form-control text-center" id="e_SF10_4_physical_education" name="SF10_4_physical_education" ></td>
                                        <td><input class="form-control text-center" id="e_SF10_final_physical_education" name="SF10_final_physical_education" ></td>
                                        <td><input class="form-control text-center" id="e_SF10_remarks_physical_education" name="SF10_remarks_physical_education" ></td>
                                    </tr>
                                    <tr>
                                        <td>Health</td>
                                        <td><input class="form-control text-center" id="e_SF10_1_health" name="SF10_1_health" ></td>
                                        <td><input class="form-control text-center" id="e_SF10_2_health" name="SF10_2_health" ></td>
                                        <td><input class="form-control text-center" id="e_SF10_3_health" name="SF10_3_health" ></td>
                                        <td><input class="form-control text-center" id="e_SF10_4_health" name="SF10_4_health" ></td>
                                        <td><input class="form-control text-center" id="e_SF10_final_health" name="SF10_final_health" ></td>
                                        <td><input class="form-control text-center" id="e_SF10_remarks_health" name="SF10_remarks_health" ></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Eduk. sa Pagpapakatao</strong></td>
                                        <td colspan="6"></td>
                                    </tr>
                                    <tr>
                                        <td>*Arabic Language</td>
                                        <td><input class="form-control text-center" id="e_SF10_1_arabic_language" name="SF10_1_arabic_language" ></td>
                                        <td><input class="form-control text-center" id="e_SF10_2_arabic_language" name="SF10_2_arabic_language" ></td>
                                        <td><input class="form-control text-center" id="e_SF10_3_arabic_language" name="SF10_3_arabic_language" ></td>
                                        <td><input class="form-control text-center" id="e_SF10_4_arabic_language" name="SF10_4_arabic_language" ></td>
                                        <td><input class="form-control text-center" id="e_SF10_final_arabic_language" name="SF10_final_arabic_language" ></td>
                                        <td><input class="form-control text-center" id="e_SF10_remarks_arabic_language" name="SF10_remarks_arabic_language" ></td>
                                    </tr>
                                    <tr>
                                        <td>*Islamic Values Education</td>
                                        <td><input class="form-control text-center" id="e_SF10_1_islamic_values_education" name="SF10_1_islamic_values_education" ></td>
                                        <td><input class="form-control text-center" id="e_SF10_2_islamic_values_education" name="SF10_2_islamic_values_education" ></td>
                                        <td><input class="form-control text-center" id="e_SF10_3_islamic_values_education" name="SF10_3_islamic_values_education" ></td>
                                        <td><input class="form-control text-center" id="e_SF10_4_islamic_values_education" name="SF10_4_islamic_values_education" ></td>
                                        <td><input class="form-control text-center" id="e_SF10_final_islamic_values_education" name="SF10_final_islamic_values_education" ></td>
                                        <td><input class="form-control text-center" id="e_SF10_remarks_islamic_values_education" name="SF10_remarks_islamic_values_education" ></td>
                                    </tr>
                                    <tr>
                                        <td><strong>General Average</strong></td>
                                        <td colspan="4"></td>
                                        <td><input class="form-control text-center" id="e_SF10_final_general_average" name="SF10_final_general_average" ></td>
                                        <td><input class="form-control text-center" id="e_SF10_remarks_general_average" name="SF10_remarks_general_average" ></td>
                                    </tr>
                                </tbody>
                            </table>
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

        $(document).ready(function() {
            $('#input_pupil_image').on('change', function(e) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#pupil_image').attr('src', e.target.result);
                };
                reader.readAsDataURL(this.files[0]);
            });
            $('#e_input_pupil_image').on('change', function(e) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#e_pupil_image').attr('src', e.target.result);
                };
                reader.readAsDataURL(this.files[0]);
            });
        });

        // $('.download_student_form').click(function() {

        //     const path = $(this).attr('data-path')?.trim();
        //     const Toast = Swal.mixin({
        //         toast: true,
        //         position: 'top-end',
        //         showConfirmButton: false,
        //         timer: 1000
        //     });

        //     if (!path) {
        //         Toast.fire({
        //             icon: 'error',
        //             title: '<p class="text-center pt-2">This student has no Form 10</p>'
        //         });
        //         return;
        //     }

        //     const link = document.createElement('a');
        //     link.href = path;
        //     link.download = 'student_form10.xlsx';
        //     document.body.appendChild(link);
        //     link.click();
        //     document.body.removeChild(link);

        // });

        // $('#grade_level').on('change', function() {
        //     $('#SF10_grade').val($(this).val());
        // })

        $('#grade_level').on('keyup', function() {
            $('#SF10_grade').val($(this).val());
        });

        $('#section').on('keyup', function() {
            $('#SF10_section').val($(this).val());
        });

        $('#e_grade_level').on('keyup', function() {
            $('#e_SF10_grade').val($(this).val());
        });

        $('#e_section').on('keyup', function() {
            $('#e_SF10_section').val($(this).val());
        });

        $('#pupil_print').on('click', function (e) {
            e.preventDefault();

            const id = $(this).data('id');

            const url = "{{ route('pupil_print', ':id') }}".replace(':id', id);

            window.open(url, '_blank');
        });

        $('.edit').on('click', function() {
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

                    console.log(data);
                    

                    $(".e_id").val(data.pupil_id);
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
                    // $("#download_student_form").attr("data-path", data.student_form_10);

                    $("#v_SF10_school").val(data.school);
                    $("#v_SF10_school_id").val(data.school_id);
                    $("#v_SF10_district").val(data.district);
                    $("#v_SF10_division").val(data.division);
                    $("#v_SF10_region").val(data.region);
                    $("#v_SF10_school_year").val(data.school_year);
                    $("#v_SF10_teacher").val(data.teacher_id);
                    $("#v_SF10_grade").val(data.grade_level);
                    $("#v_SF10_section").val(data.section);

                    $("#v_SF10_1_mother_tongue").val(data.mother_tongue_1);
                    $("#v_SF10_2_mother_tongue").val(data.mother_tongue_2);
                    $("#v_SF10_3_mother_tongue").val(data.mother_tongue_3);
                    $("#v_SF10_4_mother_tongue").val(data.mother_tongue_4);
                    $("#v_SF10_final_mother_tongue").val(data.final_mother_tongue);
                    $("#v_SF10_remarks_mother_tongue").val(data.remarks_mother_tongue);

                    $("#v_SF10_1_filipino").val(data.filipino_1);
                    $("#v_SF10_2_filipino").val(data.filipino_2);
                    $("#v_SF10_3_filipino").val(data.filipino_3);
                    $("#v_SF10_4_filipino").val(data.filipino_4);
                    $("#v_SF10_final_filipino").val(data.final_filipino);
                    $("#v_SF10_remarks_filipino").val(data.remarks_filipino);

                    $("#v_SF10_1_english").val(data.english_1);
                    $("#v_SF10_2_english").val(data.english_2);
                    $("#v_SF10_3_english").val(data.english_3);
                    $("#v_SF10_4_english").val(data.english_4);
                    $("#v_SF10_final_english").val(data.final_english);
                    $("#v_SF10_remarks_english").val(data.remarks_english);

                    $("#v_SF10_1_mathematics").val(data.mathematics_1);
                    $("#v_SF10_2_mathematics").val(data.mathematics_2);
                    $("#v_SF10_3_mathematics").val(data.mathematics_3);
                    $("#v_SF10_4_mathematics").val(data.mathematics_4);
                    $("#v_SF10_final_mathematics").val(data.final_mathematics);
                    $("#v_SF10_remarks_mathematics").val(data.remarks_mathematics);

                    $("#v_SF10_1_science").val(data.science_1);
                    $("#v_SF10_2_science").val(data.science_2);
                    $("#v_SF10_3_science").val(data.science_3);
                    $("#v_SF10_4_science").val(data.science_4);
                    $("#v_SF10_final_science").val(data.final_science);
                    $("#v_SF10_remarks_science").val(data.remarks_science);

                    $("#v_SF10_1_araling_panlipunan").val(data.araling_panlipunan_1);
                    $("#v_SF10_2_araling_panlipunan").val(data.araling_panlipunan_2);
                    $("#v_SF10_3_araling_panlipunan").val(data.araling_panlipunan_3);
                    $("#v_SF10_4_araling_panlipunan").val(data.araling_panlipunan_4);
                    $("#v_SF10_final_araling_panlipunan").val(data.final_araling_panlipunan);
                    $("#v_SF10_remarks_araling_panlipunan").val(data.remarks_araling_panlipunan);

                    $("#v_SF10_1_epp_tle").val(data.epp_tle_1);
                    $("#v_SF10_2_epp_tle").val(data.epp_tle_2);
                    $("#v_SF10_3_epp_tle").val(data.epp_tle_3);
                    $("#v_SF10_4_epp_tle").val(data.epp_tle_4);
                    $("#v_SF10_final_epp_tle").val(data.final_epp_tle);
                    $("#v_SF10_remarks_epp_tle").val(data.remarks_epp_tle);

                    $("#v_SF10_1_music").val(data.music_1);
                    $("#v_SF10_2_music").val(data.music_2);
                    $("#v_SF10_3_music").val(data.music_3);
                    $("#v_SF10_4_music").val(data.music_4);
                    $("#v_SF10_final_music").val(data.final_music);
                    $("#v_SF10_remarks_music").val(data.remarks_music);

                    $("#v_SF10_1_arts").val(data.arts_1);
                    $("#v_SF10_2_arts").val(data.arts_2);
                    $("#v_SF10_3_arts").val(data.arts_3);
                    $("#v_SF10_4_arts").val(data.arts_4);
                    $("#v_SF10_final_arts").val(data.final_arts);
                    $("#v_SF10_remarks_arts").val(data.remarks_arts);

                    $("#v_SF10_1_physical_education").val(data.physical_education_1);
                    $("#v_SF10_2_physical_education").val(data.physical_education_2);
                    $("#v_SF10_3_physical_education").val(data.physical_education_3);
                    $("#v_SF10_4_physical_education").val(data.physical_education_4);
                    $("#v_SF10_final_physical_education").val(data.final_physical_education);
                    $("#v_SF10_remarks_physical_education").val(data.remarks_physical_education);

                    $("#v_SF10_1_health").val(data.health_1);
                    $("#v_SF10_2_health").val(data.health_2);
                    $("#v_SF10_3_health").val(data.health_3);
                    $("#v_SF10_4_health").val(data.health_4);
                    $("#v_SF10_final_health").val(data.final_health);
                    $("#v_SF10_remarks_health").val(data.remarks_health);

                    $("#v_SF10_1_arabic_language").val(data.arabic_language_1);
                    $("#v_SF10_2_arabic_language").val(data.arabic_language_2);
                    $("#v_SF10_3_arabic_language").val(data.arabic_language_3);
                    $("#v_SF10_4_arabic_language").val(data.arabic_language_4);
                    $("#v_SF10_final_arabic_language").val(data.final_arabic_language);
                    $("#v_SF10_remarks_arabic_language").val(data.remarks_arabic_language);

                    $("#v_SF10_1_islamic_values_education").val(data.islamic_values_education_1);
                    $("#v_SF10_2_islamic_values_education").val(data.islamic_values_education_2);
                    $("#v_SF10_3_islamic_values_education").val(data.islamic_values_education_3);
                    $("#v_SF10_4_islamic_values_education").val(data.islamic_values_education_4);
                    $("#v_SF10_final_islamic_values_education").val(data.final_islamic_values_education);
                    $("#v_SF10_remarks_islamic_values_education").val(data.remarks_islamic_values_education);

                    $('#pupil_print').attr('data-id', data.pupil_id);

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
                    // $("#e_download_student_form").attr("data-path", data.student_form_10);

                    $("#e_SF10_school").val(data.school);
                    $("#e_SF10_school_id").val(data.school_id);
                    $("#e_SF10_district").val(data.district);
                    $("#e_SF10_division").val(data.division);
                    $("#e_SF10_region").val(data.region);
                    $("#e_SF10_school_year").val(data.school_year);
                    $("#e_SF10_teacher").val(data.teacher_id);
                    $("#e_SF10_grade").val(data.grade_level);
                    $("#e_SF10_section").val(data.section);

                    $("#e_SF10_1_mother_tongue").val(data.mother_tongue_1);
                    $("#e_SF10_2_mother_tongue").val(data.mother_tongue_2);
                    $("#e_SF10_3_mother_tongue").val(data.mother_tongue_3);
                    $("#e_SF10_4_mother_tongue").val(data.mother_tongue_4);
                    $("#e_SF10_final_mother_tongue").val(data.final_mother_tongue);
                    $("#e_SF10_remarks_mother_tongue").val(data.remarks_mother_tongue);

                    $("#e_SF10_1_filipino").val(data.filipino_1);
                    $("#e_SF10_2_filipino").val(data.filipino_2);
                    $("#e_SF10_3_filipino").val(data.filipino_3);
                    $("#e_SF10_4_filipino").val(data.filipino_4);
                    $("#e_SF10_final_filipino").val(data.final_filipino);
                    $("#e_SF10_remarks_filipino").val(data.remarks_filipino);

                    $("#e_SF10_1_english").val(data.english_1);
                    $("#e_SF10_2_english").val(data.english_2);
                    $("#e_SF10_3_english").val(data.english_3);
                    $("#e_SF10_4_english").val(data.english_4);
                    $("#e_SF10_final_english").val(data.final_english);
                    $("#e_SF10_remarks_english").val(data.remarks_english);

                    $("#e_SF10_1_mathematics").val(data.mathematics_1);
                    $("#e_SF10_2_mathematics").val(data.mathematics_2);
                    $("#e_SF10_3_mathematics").val(data.mathematics_3);
                    $("#e_SF10_4_mathematics").val(data.mathematics_4);
                    $("#e_SF10_final_mathematics").val(data.final_mathematics);
                    $("#e_SF10_remarks_mathematics").val(data.remarks_mathematics);

                    $("#e_SF10_1_science").val(data.science_1);
                    $("#e_SF10_2_science").val(data.science_2);
                    $("#e_SF10_3_science").val(data.science_3);
                    $("#e_SF10_4_science").val(data.science_4);
                    $("#e_SF10_final_science").val(data.final_science);
                    $("#e_SF10_remarks_science").val(data.remarks_science);

                    $("#e_SF10_1_araling_panlipunan").val(data.araling_panlipunan_1);
                    $("#e_SF10_2_araling_panlipunan").val(data.araling_panlipunan_2);
                    $("#e_SF10_3_araling_panlipunan").val(data.araling_panlipunan_3);
                    $("#e_SF10_4_araling_panlipunan").val(data.araling_panlipunan_4);
                    $("#e_SF10_final_araling_panlipunan").val(data.final_araling_panlipunan);
                    $("#e_SF10_remarks_araling_panlipunan").val(data.remarks_araling_panlipunan);

                    $("#e_SF10_1_epp_tle").val(data.epp_tle_1);
                    $("#e_SF10_2_epp_tle").val(data.epp_tle_2);
                    $("#e_SF10_3_epp_tle").val(data.epp_tle_3);
                    $("#e_SF10_4_epp_tle").val(data.epp_tle_4);
                    $("#e_SF10_final_epp_tle").val(data.final_epp_tle);
                    $("#e_SF10_remarks_epp_tle").val(data.remarks_epp_tle);

                    $("#e_SF10_1_music").val(data.music_1);
                    $("#e_SF10_2_music").val(data.music_2);
                    $("#e_SF10_3_music").val(data.music_3);
                    $("#e_SF10_4_music").val(data.music_4);
                    $("#e_SF10_final_music").val(data.final_music);
                    $("#e_SF10_remarks_music").val(data.remarks_music);

                    $("#e_SF10_1_arts").val(data.arts_1);
                    $("#e_SF10_2_arts").val(data.arts_2);
                    $("#e_SF10_3_arts").val(data.arts_3);
                    $("#e_SF10_4_arts").val(data.arts_4);
                    $("#e_SF10_final_arts").val(data.final_arts);
                    $("#e_SF10_remarks_arts").val(data.remarks_arts);

                    $("#e_SF10_1_physical_education").val(data.physical_education_1);
                    $("#e_SF10_2_physical_education").val(data.physical_education_2);
                    $("#e_SF10_3_physical_education").val(data.physical_education_3);
                    $("#e_SF10_4_physical_education").val(data.physical_education_4);
                    $("#e_SF10_final_physical_education").val(data.final_physical_education);
                    $("#e_SF10_remarks_physical_education").val(data.remarks_physical_education);

                    $("#e_SF10_1_health").val(data.health_1);
                    $("#e_SF10_2_health").val(data.health_2);
                    $("#e_SF10_3_health").val(data.health_3);
                    $("#e_SF10_4_health").val(data.health_4);
                    $("#e_SF10_final_health").val(data.final_health);
                    $("#e_SF10_remarks_health").val(data.remarks_health);

                    $("#e_SF10_1_arabic_language").val(data.arabic_language_1);
                    $("#e_SF10_2_arabic_language").val(data.arabic_language_2);
                    $("#e_SF10_3_arabic_language").val(data.arabic_language_3);
                    $("#e_SF10_4_arabic_language").val(data.arabic_language_4);
                    $("#e_SF10_final_arabic_language").val(data.final_arabic_language);
                    $("#e_SF10_remarks_arabic_language").val(data.remarks_arabic_language);

                    $("#e_SF10_1_islamic_values_education").val(data.islamic_values_education_1);
                    $("#e_SF10_2_islamic_values_education").val(data.islamic_values_education_2);
                    $("#e_SF10_3_islamic_values_education").val(data.islamic_values_education_3);
                    $("#e_SF10_4_islamic_values_education").val(data.islamic_values_education_4);
                    $("#e_SF10_final_islamic_values_education").val(data.final_islamic_values_education);
                    $("#e_SF10_remarks_islamic_values_education").val(data.remarks_islamic_values_education);

                }
            });

        });
    </script>
</x-layout>
