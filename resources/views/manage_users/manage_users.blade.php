<x-layout>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Manage Users</h1>
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
                                <h3 class="card-title">LIST OF USER(S)</h3>
                                <div class="float-right">
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#modal-add"><i
                                            class="fas fa-plus-circle"></i> Add
                                        User</button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="table" class="table table-bordered table-striped text-center">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Fullname</th>
                                            <th>Email</th>
                                            <th>Authorized Pages</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $counter = 1;
                                        @endphp
                                        @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $counter++ }}</td>
                                            <td>{{ $user->fullname }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @foreach ($user->authorized_page_names as $page)
                                                    @php
                                                        echo "| <b class='text-danger'>" . $page . "</b> |";
                                                    @endphp
                                                @endforeach
                                            </td>
                                            <td class="py-0 align-middle">
                                                <div class="btn-group btn-group-md">
                                                    <a href="#" class="btn btn-primary edit"
                                                        data-toggle="modal" data-target="#modal-edit"
                                                        data-id="{{ $user->id }}"
                                                        data-path="{{ route('users_edit') }}"><i
                                                            class="fas fa-edit"></i></a>
                                                    <a href="#" class="btn btn-danger edit"
                                                        data-toggle="modal" data-target="#modal-status"
                                                        data-id="{{ $user->id }}"
                                                        data-path="{{ route('users_edit') }}"><i
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

    <div class="modal fade" id="modal-add">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fa fa-user-secret"></i> Add User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="formPost" action="{{ route('users_store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="full_name">Fullname: </label>
                            <input type="text" class="form-control" id="full_name" name="full_name"
                                placeholder="Enter Fullname" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email: </label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Enter Email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password: </label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Enter Password" required>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group clearfix">
                                  <div class="icheck-primary d-inline">
                                    <input type="checkbox" id="dashboard" name="permission[]" value="1" required>
                                    <label for="dashboard">
                                      Dashboard
                                    </label>
                                  </div>
                                  <div class="icheck-primary d-inline">
                                    <input type="checkbox" id="dtr" name="permission[]" value="2">
                                    <label for="dtr">
                                      DTR Management
                                    </label>
                                  </div>
                                  <div class="icheck-primary d-inline">
                                    <input type="checkbox" id="teacher_management" name="permission[]" value="3">
                                    <label for="teacher_management">
                                      Teacher Management
                                    </label>
                                  </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group clearfix">
                                  <div class="icheck-primary d-inline">
                                    <input type="checkbox" id="pupil_management" name="permission[]" value="4">
                                    <label for="pupil_management">
                                      Pupil Management
                                    </label>
                                  </div>
                                  <div class="icheck-primary d-inline">
                                    <input type="checkbox" id="manage_users" name="permission[]" value="5">
                                    <label for="manage_users">
                                      Manage Users
                                    </label>
                                  </div>
                                  <div class="icheck-primary d-inline">
                                    <input type="checkbox" id="reports" name="permission[]" value="6">
                                    <label for="reports">
                                    Reports
                                    </label>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit <i class="fa fa-paper-plane"></i></button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <div class="modal fade modal-close" id="modal-edit">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fa fa-user-secret"></i> Edit User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="formPost" action="{{ route('users_update') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input class="form-control e_id" type="text" name="id" hidden readonly>
                        <input class="form-control" type="text" name="old_email" id="old_email" hidden readonly>
                        <div class="form-group">
                            <label for="e_full_name">Fullname: </label>
                            <input type="text" class="form-control" id="e_full_name" name="full_name"
                                placeholder="Enter Fullname" required>
                        </div>
                        <div class="form-group">
                            <label for="e_email">Email: </label>
                            <input type="email" class="form-control" id="e_email" name="email"
                                placeholder="Enter Email" required>
                        </div>
                        <div class="form-group">
                            <label for="e_password">Password: </label>
                            <input type="password" class="form-control" id="e_password" name="password"
                                placeholder="Enter Password">
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group clearfix">
                                  <div class="icheck-primary d-inline">
                                    <input type="checkbox" id="e_dashboard" name="permission[]" value="1" required>
                                    <label for="e_dashboard">
                                      Dashboard
                                    </label>
                                  </div>
                                  <div class="icheck-primary d-inline">
                                    <input type="checkbox" id="e_dtr" name="permission[]" value="2">
                                    <label for="e_dtr">
                                      DTR Management
                                    </label>
                                  </div>
                                  <div class="icheck-primary d-inline">
                                    <input type="checkbox" id="e_teacher_management" name="permission[]" value="3">
                                    <label for="e_teacher_management">
                                      Teacher Management
                                    </label>
                                  </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group clearfix">
                                  <div class="icheck-primary d-inline">
                                    <input type="checkbox" id="e_pupil_management" name="permission[]" value="4">
                                    <label for="e_pupil_management">
                                      Pupil Management
                                    </label>
                                  </div>
                                  <div class="icheck-primary d-inline">
                                    <input type="checkbox" id="e_manage_users" name="permission[]" value="5">
                                    <label for="e_manage_users">
                                      Manage Users
                                    </label>
                                  </div>
                                  <div class="icheck-primary d-inline">
                                    <input type="checkbox" id="e_reports" name="permission[]" value="6">
                                    <label for="e_reports">
                                    Reports
                                    </label>
                                  </div>
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
                    <h4 class="modal-title"><i class="fa fa-user-secret"></i> Delete User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="formPost" action="{{ route('users_destroy') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input class="form-control e_id" type="text" name="id" hidden readonly>
                        <p>Are you sure you want to delete this user?</p>
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
        $("#manage_users_link").addClass("active");

        let tableName = "User List";

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
                    $('#old_email').val(data.email);
                    $('#e_full_name').val(data.fullname);
                    $('#e_email').val(data.email);
                    $('#e_password').val(data.password);

                    const authorized_pages = data.authorized_page.split(",");

                    authorized_pages.forEach(element => {
                        switch (element.trim()) {
                            case "1":
                                $('#e_dashboard').prop('checked', true);
                                break;
                            case "2":
                                $('#e_dtr').prop('checked', true);
                                break;
                            case "3":
                                $('#e_teacher_management').prop('checked', true);
                                break;
                            case "4":
                                $('#e_pupil_management').prop('checked', true);
                                break;
                            case "5":
                                $('#e_manage_users').prop('checked', true);
                                break;
                            case "6":
                                $('#e_reports').prop('checked', true);
                                break;
                        }
                    });
                }
            });

        });
    </script>
</x-layout>