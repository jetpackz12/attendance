<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trinidad 1 Central Elementary School</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
</head>

<body>
    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">
            <div class="row">
                <div class="col-6">
                    <div class="d-flex justify-content-center align-items-center">
                        <img src="{{ asset($pupil->image) }}" id="v_pupil_image" alt="User Image"
                            style="width: 250px; height: 225px; border-radius: 50%; object-fit: cover;">
                    </div>
                </div>
                <div class="col-6 mt-4">
                    <div class="form-group">
                        <label for="v_first_name">First name: </label>
                        <input type="text" class="form-control" id="v_first_name" name="first_name"
                            placeholder="Enter First name" value="{{ $pupil->first_name }}" readonly required>
                    </div>
                    <div class="form-group">
                        <label for="v_middle_name">Middle name: <span class="text-danger">(Optional)</span></label>
                        <input type="text" class="form-control" id="v_middle_name" name="middle_name"
                            placeholder="Enter Middle name"  value="{{ $pupil->middle_name }}" readonly required>
                    </div>
                    <div class="form-group">
                        <label for="v_last_name">Last name: </label>
                        <input type="text" class="form-control" id="v_last_name" name="last_name"
                            placeholder="Enter Last name"  value="{{ $pupil->last_name }}" readonly required>
                    </div>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-4">
                    <div class="form-group">
                        <label for="v_birth_date">Birth Date:</label>
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" id="v_birth_date"
                                name="birth_date" data-target="#reservationdate"  value="{{ $pupil->birth_date }}" disabled />
                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="v_gender">Gender</label>
                        <input type="text" class="form-control" id="v_gender" name="gender"
                            placeholder="Select Gender"  value="{{ $pupil->gender }}" readonly required>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="v_email_address">Email Address: <span class="text-danger">(Optional)</span></label>
                        <input type="email" class="form-control" id="v_email_address" name="email_address"
                            placeholder="Enter Email Address"  value="{{ $pupil->email_address }}" readonly required>
                    </div>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-4">
                    <div class="form-group">
                        <label for="v_address">Address: </label>
                        <input type="text" class="form-control" id="v_address" name="address"
                            placeholder="Enter Address"  value="{{ $pupil->address }}" readonly required>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="v_grade_level">Grade level: </label>
                        <input type="number" class="form-control" id="v_grade_level" name="grade_level"
                            placeholder="Enter Grade level"  value="{{ $pupil->grade_level }}" readonly required>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="v_section">Section: </label>
                        <input type="text" class="form-control" id="v_section" name="section"
                            placeholder="Enter Section"  value="{{ $pupil->section }}" readonly required>
                    </div>
                </div>
            </div>

            <div class="border border-dark p-2">
                <h1 class="display-6 text-center">SF10-ES</h1>
                <hr>
                <div class="row mt-1">
                    <div class="col-md-6">
                        <label class="form-label">School:</label>
                        <input type="text" class="form-control" id="v_SF10_school" name="SF10_school"  value="{{ $pupil->school }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">School ID:</label>
                        <input type="text" class="form-control" id="v_SF10_school_id" name="SF10_school_id"
                             value="{{ $pupil->school_id }}" readonly>
                    </div>
                </div>

                <div class="row mt-1">
                    <div class="col-md-3">
                        <label class="form-label">District:</label>
                        <input type="text" class="form-control" id="v_SF10_district" name="SF10_district"
                             value="{{ $pupil->district }}" readonly>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Division:</label>
                        <input type="text" class="form-control" id="v_SF10_division" name="SF10_division"
                             value="{{ $pupil->division }}" readonly>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Region:</label>
                        <input type="text" class="form-control" id="v_SF10_region" name="SF10_region"  value="{{ $pupil->region }}" readonly>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">School Year:</label>
                        <input type="text" class="form-control" id="v_SF10_school_year" name="SF10_school_year"
                             value="{{ $pupil->school_year }}" readonly>
                    </div>
                </div>

                <div class="row mt-1">
                    <div class="col-md-4">
                        <label class="form-label">Classified as Grade:</label>
                        <input type="text" class="form-control" id="v_SF10_grade" name="SF10_grade"  value="{{ $pupil->grade_level }}" readonly>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Section:</label>
                        <input type="text" class="form-control" id="v_SF10_section" name="SF10_section"  value="{{ $pupil->section }}" readonly>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Name of Adviser/Teacher:</label>
                        <input type="text" class="form-control" id="v_SF10_teacher" name="SF10_teacher"  value="{{ $pupil->teacher_id }}" readonly>
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
                            <td><input class="form-control text-center" id="v_SF10_1_mother_tongue"
                                    name="SF10_1_mother_tongue"  value="{{ $pupil->mother_tongue_1 }}" readonly></td>
                            <td><input class="form-control text-center" id="v_SF10_2_mother_tongue"
                                    name="SF10_2_mother_tongue"  value="{{ $pupil->mother_tongue_2 }}" readonly></td>
                            <td><input class="form-control text-center" id="v_SF10_3_mother_tongue"
                                    name="SF10_3_mother_tongue"  value="{{ $pupil->mother_tongue_3 }}" readonly></td>
                            <td><input class="form-control text-center" id="v_SF10_4_mother_tongue"
                                    name="SF10_4_mother_tongue"  value="{{ $pupil->mother_tongue_4 }}" readonly></td>
                            <td><input class="form-control text-center" id="v_SF10_final_mother_tongue"
                                    name="SF10_final_mother_tongue"  value="{{ $pupil->final_mother_tongue }}" readonly></td>
                            <td><input class="form-control text-center" id="v_SF10_remarks_mother_tongue"
                                    name="SF10_remarks_mother_tongue"  value="{{ $pupil->remarks_mother_tongue }}" readonly></td>
                        </tr>
                        <tr>
                            <td><strong>Filipino</strong></td>
                            <td><input class="form-control text-center" id="v_SF10_1_filipino" name="SF10_1_filipino"
                                     value="{{ $pupil->filipino_1 }}" readonly></td>
                            <td><input class="form-control text-center" id="v_SF10_2_filipino" name="SF10_2_filipino"
                                     value="{{ $pupil->filipino_2 }}" readonly></td>
                            <td><input class="form-control text-center" id="v_SF10_3_filipino" name="SF10_3_filipino"
                                     value="{{ $pupil->filipino_3 }}" readonly></td>
                            <td><input class="form-control text-center" id="v_SF10_4_filipino" name="SF10_4_filipino"
                                     value="{{ $pupil->filipino_4 }}" readonly></td>
                            <td><input class="form-control text-center" id="v_SF10_final_filipino"
                                    name="SF10_final_filipino"  value="{{ $pupil->final_filipino }}" readonly></td>
                            <td><input class="form-control text-center" id="v_SF10_remarks_filipino"
                                    name="SF10_remarks_filipino"  value="{{ $pupil->remarks_filipino }}" readonly></td>
                        </tr>
                        <tr>
                            <td><strong>English</strong></td>
                            <td><input class="form-control text-center" id="v_SF10_1_english" name="SF10_1_english"
                                     value="{{ $pupil->english_1 }}" readonly></td>
                            <td><input class="form-control text-center" id="v_SF10_2_english" name="SF10_2_english"
                                     value="{{ $pupil->english_2 }}" readonly></td>
                            <td><input class="form-control text-center" id="v_SF10_3_english" name="SF10_3_english"
                                     value="{{ $pupil->english_3 }}" readonly></td>
                            <td><input class="form-control text-center" id="v_SF10_4_english" name="SF10_4_english"
                                     value="{{ $pupil->english_4 }}" readonly></td>
                            <td><input class="form-control text-center" id="v_SF10_final_english"
                                    name="SF10_final_english"  value="{{ $pupil->final_english }}" readonly></td>
                            <td><input class="form-control text-center" id="v_SF10_remarks_english"
                                    name="SF10_remarks_english"  value="{{ $pupil->remarks_english }}" readonly></td>
                        </tr>
                        <tr>
                            <td><strong>Mathematics</strong></td>
                            <td><input class="form-control text-center" id="v_SF10_1_mathematics"
                                    name="SF10_1_mathematics"  value="{{ $pupil->mathematics_1 }}" readonly></td>
                            <td><input class="form-control text-center" id="v_SF10_2_mathematics"
                                    name="SF10_2_mathematics"  value="{{ $pupil->mathematics_2 }}" readonly></td>
                            <td><input class="form-control text-center" id="v_SF10_3_mathematics"
                                    name="SF10_3_mathematics"  value="{{ $pupil->mathematics_3 }}" readonly></td>
                            <td><input class="form-control text-center" id="v_SF10_4_mathematics"
                                    name="SF10_4_mathematics"  value="{{ $pupil->mathematics_4 }}" readonly></td>
                            <td><input class="form-control text-center" id="v_SF10_final_mathematics"
                                    name="SF10_final_mathematics"  value="{{ $pupil->final_mathematics }}" readonly></td>
                            <td><input class="form-control text-center" id="v_SF10_remarks_mathematics"
                                    name="SF10_remarks_mathematics"  value="{{ $pupil->remarks_mathematics }}" readonly></td>
                        </tr>
                        <tr>
                            <td><strong>Science</strong></td>
                            <td><input class="form-control text-center" id="v_SF10_1_science" name="SF10_1_science"
                                     value="{{ $pupil->science_1 }}" readonly></td>
                            <td><input class="form-control text-center" id="v_SF10_2_science" name="SF10_2_science"
                                     value="{{ $pupil->science_2 }}" readonly></td>
                            <td><input class="form-control text-center" id="v_SF10_3_science" name="SF10_3_science"
                                     value="{{ $pupil->science_3 }}" readonly></td>
                            <td><input class="form-control text-center" id="v_SF10_4_science" name="SF10_4_science"
                                     value="{{ $pupil->science_4 }}" readonly></td>
                            <td><input class="form-control text-center" id="v_SF10_final_science"
                                    name="SF10_final_science"  value="{{ $pupil->final_science }}" readonly></td>
                            <td><input class="form-control text-center" id="v_SF10_remarks_science"
                                    name="SF10_remarks_science"  value="{{ $pupil->remarks_science }}" readonly></td>
                        </tr>
                        <tr>
                            <td><strong>Araling Panlipunan</strong></td>
                            <td><input class="form-control text-center" id="v_SF10_1_araling_panlipunan"
                                    name="SF10_1_araling_panlipunan"  value="{{ $pupil->araling_panlipunan_1 }}" readonly></td>
                            <td><input class="form-control text-center" id="v_SF10_2_araling_panlipunan"
                                    name="SF10_2_araling_panlipunan"  value="{{ $pupil->araling_panlipunan_2 }}" readonly></td>
                            <td><input class="form-control text-center" id="v_SF10_3_araling_panlipunan"
                                    name="SF10_3_araling_panlipunan"  value="{{ $pupil->araling_panlipunan_3 }}" readonly></td>
                            <td><input class="form-control text-center" id="v_SF10_4_araling_panlipunan"
                                    name="SF10_4_araling_panlipunan"  value="{{ $pupil->araling_panlipunan_4 }}" readonly></td>
                            <td><input class="form-control text-center" id="v_SF10_final_araling_panlipunan"
                                    name="SF10_final_araling_panlipunan"  value="{{ $pupil->final_araling_panlipunan }}" readonly></td>
                            <td><input class="form-control text-center" id="v_SF10_remarks_araling_panlipunan"
                                    name="SF10_remarks_araling_panlipunan"  value="{{ $pupil->remarks_araling_panlipunan }}" readonly></td>
                        </tr>
                        <tr>
                            <td><strong>EPP / TLE</strong></td>
                            <td><input class="form-control text-center" id="v_SF10_1_epp_tle" name="SF10_1_epp_tle"
                                     value="{{ $pupil->EPP_TLE_1 }}" readonly></td>
                            <td><input class="form-control text-center" id="v_SF10_2_epp_tle" name="SF10_2_epp_tle"
                                     value="{{ $pupil->EPP_TLE_2 }}" readonly></td>
                            <td><input class="form-control text-center" id="v_SF10_3_epp_tle" name="SF10_3_epp_tle"
                                     value="{{ $pupil->EPP_TLE_3 }}" readonly></td>
                            <td><input class="form-control text-center" id="v_SF10_4_epp_tle" name="SF10_4_epp_tle"
                                     value="{{ $pupil->EPP_TLE_4 }}" readonly></td>
                            <td><input class="form-control text-center" id="v_SF10_final_epp_tle"
                                    name="SF10_final_epp_tle"  value="{{ $pupil->final_EPP_TLE }}" readonly></td>
                            <td><input class="form-control text-center" id="v_SF10_remarks_epp_tle"
                                    name="SF10_remarks_epp_tle"  value="{{ $pupil->remarks_EPP_TLE }}" readonly></td>
                        </tr>
                        <tr>
                            <td><strong>MAPEH</strong></td>
                            <td colspan="6"></td>
                        </tr>
                        <tr>
                            <td>Music</td>
                            <td><input class="form-control text-center" id="v_SF10_1_music" name="SF10_1_music"
                                     value="{{ $pupil->music_1 }}" readonly></td>
                            <td><input class="form-control text-center" id="v_SF10_2_music" name="SF10_2_music"
                                     value="{{ $pupil->music_2 }}" readonly></td>
                            <td><input class="form-control text-center" id="v_SF10_3_music" name="SF10_3_music"
                                     value="{{ $pupil->music_3 }}" readonly></td>
                            <td><input class="form-control text-center" id="v_SF10_4_music" name="SF10_4_music"
                                     value="{{ $pupil->music_4 }}" readonly></td>
                            <td><input class="form-control text-center" id="v_SF10_final_music"
                                    name="SF10_final_music"  value="{{ $pupil->final_music }}" readonly></td>
                            <td><input class="form-control text-center" id="v_SF10_remarks_music"
                                    name="SF10_remarks_music"  value="{{ $pupil->remarks_music }}" readonly></td>
                        </tr>
                        <tr>
                            <td>Arts</td>
                            <td><input class="form-control text-center" id="v_SF10_1_arts" name="SF10_1_arts"
                                     value="{{ $pupil->arts_1 }}" readonly></td>
                            <td><input class="form-control text-center" id="v_SF10_2_arts" name="SF10_2_arts"
                                     value="{{ $pupil->arts_2 }}" readonly></td>
                            <td><input class="form-control text-center" id="v_SF10_3_arts" name="SF10_3_arts"
                                     value="{{ $pupil->arts_3 }}" readonly></td>
                            <td><input class="form-control text-center" id="v_SF10_4_arts" name="SF10_4_arts"
                                     value="{{ $pupil->arts_4 }}" readonly></td>
                            <td><input class="form-control text-center" id="v_SF10_final_arts" name="SF10_final_arts"
                                     value="{{ $pupil->final_arts }}" readonly></td>
                            <td><input class="form-control text-center" id="v_SF10_remarks_arts"
                                    name="SF10_remarks_arts"  value="{{ $pupil->remarks_arts }}" readonly></td>
                        </tr>
                        <tr>
                            <td>Physical Education</td>
                            <td><input class="form-control text-center" id="v_SF10_1_physical_education"
                                    name="SF10_1_physical_education"  value="{{ $pupil->physical_education_1 }}" readonly></td>
                            <td><input class="form-control text-center" id="v_SF10_2_physical_education"
                                    name="SF10_2_physical_education"  value="{{ $pupil->physical_education_2 }}" readonly></td>
                            <td><input class="form-control text-center" id="v_SF10_3_physical_education"
                                    name="SF10_3_physical_education"  value="{{ $pupil->physical_education_3 }}" readonly></td>
                            <td><input class="form-control text-center" id="v_SF10_4_physical_education"
                                    name="SF10_4_physical_education"  value="{{ $pupil->physical_education_4 }}" readonly></td>
                            <td><input class="form-control text-center" id="v_SF10_final_physical_education"
                                    name="SF10_final_physical_education"  value="{{ $pupil->final_physical_education }}" readonly></td>
                            <td><input class="form-control text-center" id="v_SF10_remarks_physical_education"
                                    name="SF10_remarks_physical_education"  value="{{ $pupil->remarks_physical_education }}" readonly></td>
                        </tr>
                        <tr>
                            <td>Health</td>
                            <td><input class="form-control text-center" id="v_SF10_1_health" name="SF10_1_health"
                                     value="{{ $pupil->health_1 }}" readonly></td>
                            <td><input class="form-control text-center" id="v_SF10_2_health" name="SF10_2_health"
                                     value="{{ $pupil->health_2 }}" readonly></td>
                            <td><input class="form-control text-center" id="v_SF10_3_health" name="SF10_3_health"
                                     value="{{ $pupil->health_3 }}" readonly></td>
                            <td><input class="form-control text-center" id="v_SF10_4_health" name="SF10_4_health"
                                     value="{{ $pupil->health_4 }}" readonly></td>
                            <td><input class="form-control text-center" id="v_SF10_final_health"
                                    name="SF10_final_health"  value="{{ $pupil->final_health }}" readonly></td>
                            <td><input class="form-control text-center" id="v_SF10_remarks_health"
                                    name="SF10_remarks_health"  value="{{ $pupil->remarks_health }}" readonly></td>
                        </tr>
                        <tr>
                            <td><strong>Eduk. sa Pagpapakatao</strong></td>
                            <td colspan="6"></td>
                        </tr>
                        <tr>
                            <td>*Arabic Language</td>
                            <td><input class="form-control text-center" id="v_SF10_1_arabic_language"
                                    name="SF10_1_arabic_language"  value="{{ $pupil->arabic_language_1 }}" readonly></td>
                            <td><input class="form-control text-center" id="v_SF10_2_arabic_language"
                                    name="SF10_2_arabic_language"  value="{{ $pupil->arabic_language_2 }}" readonly></td>
                            <td><input class="form-control text-center" id="v_SF10_3_arabic_language"
                                    name="SF10_3_arabic_language"  value="{{ $pupil->arabic_language_3 }}" readonly></td>
                            <td><input class="form-control text-center" id="v_SF10_4_arabic_language"
                                    name="SF10_4_arabic_language"  value="{{ $pupil->arabic_language_4 }}" readonly></td>
                            <td><input class="form-control text-center" id="v_SF10_final_arabic_language"
                                    name="SF10_final_arabic_language"  value="{{ $pupil->final_arabic_language }}" readonly></td>
                            <td><input class="form-control text-center" id="v_SF10_remarks_arabic_language"
                                    name="SF10_remarks_arabic_language"  value="{{ $pupil->remarks_arabic_language }}" readonly></td>
                        </tr>
                        <tr>
                            <td>*Islamic Values Education</td>
                            <td><input class="form-control text-center" id="v_SF10_1_islamic_values_education"
                                    name="SF10_1_islamic_values_education"  value="{{ $pupil->islamic_values_education_1 }}" readonly></td>
                            <td><input class="form-control text-center" id="v_SF10_2_islamic_values_education"
                                    name="SF10_2_islamic_values_education"  value="{{ $pupil->islamic_values_education_2 }}" readonly></td>
                            <td><input class="form-control text-center" id="v_SF10_3_islamic_values_education"
                                    name="SF10_3_islamic_values_education"  value="{{ $pupil->islamic_values_education_3 }}" readonly></td>
                            <td><input class="form-control text-center" id="v_SF10_4_islamic_values_education"
                                    name="SF10_4_islamic_values_education"  value="{{ $pupil->islamic_values_education_4 }}" readonly></td>
                            <td><input class="form-control text-center" id="v_SF10_final_islamic_values_education"
                                    name="SF10_final_islamic_values_education"  value="{{ $pupil->final_islamic_values_education }}" readonly></td>
                            <td><input class="form-control text-center" id="v_SF10_remarks_islamic_values_education"
                                    name="SF10_remarks_islamic_values_education"  value="{{ $pupil->remarks_islamic_values_education }}" readonly></td>
                        </tr>
                        <tr>
                            <td><strong>General Average</strong></td>
                            <td colspan="4"></td>
                            <td><input class="form-control text-center" id="v_SF10_final_general_average"
                                    name="SF10_final_general_average"  value="{{ $pupil->final_general_average }}" readonly></td>
                            <td><input class="form-control text-center" id="v_SF10_remarks_general_average"
                                    name="SF10_remarks_general_average"  value="{{ $pupil->remarks_general_average }}" readonly></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- ./wrapper -->
    <!-- Page specific script -->
    <script>
        window.addEventListener("load", window.print());
    </script>
</body>

</html>
