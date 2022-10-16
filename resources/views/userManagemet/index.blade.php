@extends('layouts.app')
@section('title', 'User Management')
@section('content')
<div class="page-header">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - <div class="PageLocation"></div>
            </h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

        <div class="header-elements d-none text-center text-md-left mb-3 mb-md-0">
            <div class="btn-group">
                <button type="button" data-toggle="modal" data-target="#modal_large" class="btn bg-indigo-400"><i class="icon-add mr-2"></i>Add New User</button>
            </div>
        </div>
    </div>
</div>
<!-- /page header -->

<!-- Content area -->
<div class="content pt-0">
    <div class="row">
        <div class="col-xl-12">

            <!-- Module List Table -->
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h6 class="card-title">All System Users</h6>
                </div>

                <div class="card-body py-0">
                    <!-- Add table -->
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> Please correct errors and try again!.
                        <br />
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="responsive">
                        <table class="table datatable-basic">
                            <thead>
                                <tr>
                                    <th>User ID</th>
                                    <th>User Name</th>
                                    <th>User Access Modules</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user_list as $user_admins)
                                
                                <tr>
                                    <td>{{$user_admins->id}}</td>
                                    <td>{{$user_admins->name}}</td>
                                    <td>
                                        @if($user_admins->mobile_notifications)<span class="badge bg-success-400">Notifications</span>@endif
                                        @if($user_admins->posts)<span class="badge bg-success-400">Posts</span>@endif
                                        @if($user_admins->marketing)<span class="badge bg-success-400">Marketing</span>@endif
                                        @if($user_admins->products)<span class="badge bg-success-400">Products</span>@endif
                                        @if($user_admins->user_managemet)<span class="badge bg-success-400">user Managemet</span>@endif
                                        @if($user_admins->ecommerce)<span class="badge bg-success-400">Ecommerce</span>@endif
                                    </td>
                                    <td>
                                        @if($user_admins->status==1)<span class="badge bg-blue">Active</span>@elseif($user->status==0)<span class="badge bg-danger">Block</span>@elseif($user->status==2)<span class="badge bg-grey-400">Suspended</span>@endif
                                        <!-- <div class="list-icons ml-3">
                                            <div class="dropdown">
                                                <a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="icon-menu7"></i></a>
                                                <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 19px, 0px);">
                                                    <a href="#" class="dropdown-item"><i class="icon-sync"></i> Update data</a>
                                                    <a href="#" class="dropdown-item"><i class="icon-list-unordered"></i> Detailed log</a>
                                                    <a href="#" class="dropdown-item"><i class="icon-pie5"></i> Statistics</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="#" class="dropdown-item"><i class="icon-cross3"></i> Clear list</a>
                                                </div>
                                            </div>
                                        </div> -->
                                    </td>
                                    <td>
                                        @if($user_admins->id!=1)
                                        <div class="row">
                                            <div class="col-4">
                                                <a href="#" class="btn bg-success-400 rounded-round btn-icon btn-sm " onclick="edituser({{$user_admins->id}})">
                                                    <i class="icon-pencil"></i>
                                                </a>
                                            </div>
                                            <div class="col-4">
                                                <form method="POST" action="{{route('UserManagemet/destroy_user')}}">
                                                    {{ csrf_field() }}
                                                    <div class="form-group">
                                                        <input type="text" name="delete_id" id="delete_id" value="{{$user_admins->id}}" hidden>
                                                        <input type="submit" class="btn bg-pink-400 rounded-round btn-icon btn-sm delete-user" value="Delete User">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="chart mb-2" id="app_sales"></div>
        <div class="chart" id="monthly-sales-stats"></div>
    </div>
    <!-- /Module List Table -->

</div>
</div>


<div id="modal_large" class="modal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New User</h5>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>

            <div class="modal-body">
                <form method="POST" action="{{route('UserManagemet/addNewUser')}}" id="add_new_user_form" autocomplete="off" enctype="multipart/form-data">

                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label for="uname" class="col-lg-3 col-form-label">User Name:</label>
                        <div class="col-lg-9">
                            <input type="text" id="uname" name="uname" maxlength="25" minlength="5" required class="form-control" placeholder="Eugene Kopyov">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-lg-3 col-form-label">Email:</label>
                        <div class="col-lg-9">
                            <input type="email" id="uemail" name="email" maxlength="50" minlength="5" required class="form-control" placeholder="test@test.com">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-lg-3 col-form-label">Password:</label>
                        <div class="col-lg-9">
                            <input type="password" id="password" name="password" maxlength="20" minlength="5" required class="form-control" placeholder="Strong password">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password_confirm" class="col-lg-3 col-form-label">Confirm Passowrd:</label>
                        <div class="col-lg-9">
                            <input type="password" id="password_confirm" name="password_confirm" maxlength="20" minlength="5" required class="form-control" placeholder="Re-enter strong password">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label" for="uimage">Upload avatar:</label>
                        <div class="col-lg-9">
                            <input type="file" id="uimage" name="uimage" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">User Type:</label>
                        <div class="col-lg-3">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="Mobile_Notifications_Check" id="Mobile_Notifications_Check">
                                <label class="custom-control-label" for="Mobile_Notifications_Check">Notifications</label>
                            </div>

                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="Posts_Check" id="Posts_Check">
                                <label class="custom-control-label" for="Posts_Check">Posts</label>
                            </div>

                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="Marketing_Check" id="Marketing_Check">
                                <label class="custom-control-label" for="Marketing_Check">Marketing</label>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="Products_Check" id="Products_Check">
                                <label class="custom-control-label" for="Products_Check">Products</label>
                            </div>

                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="User_Manemet_Check" id="User_Manemet_Check">
                                <label class="custom-control-label" for="User_Manemet_Check">User Managemet</label>
                            </div>

                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="Ecommerce_Check" id="Ecommerce_Check">
                                <label class="custom-control-label" for="Ecommerce_Check">Ecommerce</label>
                            </div>

                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="Report_Check" id="Report_Check">
                                <label class="custom-control-label" for="Report_Check">Report</label>
                            </div>
                        </div>
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Submit form <i class="icon-paperplane ml-2"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div id="modal_large_editUser" class="modal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>

            <div class="modal-body">
                <form method="POST" action="{{route('UserManagemet/editUser')}}" id="edit_user_form" autocomplete="off" enctype="multipart/form-data">

                    {{ csrf_field() }}
                    <input type="text" id="edit_id" value="" hidden name="edit_id">
                    <div class="form-group row">
                        <label for="edit_uname" class="col-lg-3 col-form-label">User Name:</label>
                        <div class="col-lg-9">
                            <input type="text" id="edit_uname" name="edit_uname" maxlength="25" minlength="5" class="form-control" placeholder="Eugene Kopyov">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="edit_email" class="col-lg-3 col-form-label">Email:</label>
                        <div class="col-lg-9">
                            <input type="email" id="edit_email" name="edit_email" maxlength="50" minlength="5" class="form-control" placeholder="test@test.com">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="edit_password" class="col-lg-3 col-form-label">Password:</label>
                        <div class="col-lg-9">
                            <input type="password" id="edit_password" name="edit_password" maxlength="20" minlength="5" class="form-control" placeholder="Strong password">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="edit_password_confirm" class="col-lg-3 col-form-label">Confirm Passowrd:</label>
                        <div class="col-lg-9">
                            <input type="password" id="edit_password_confirm" name="edit_password_confirm" maxlength="20" minlength="5" class="form-control" placeholder="Re-enter strong password">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label" for="edit_uimage">Upload avatar:</label>
                        <div class="col-lg-9">
                            <input type="file" id="edit_uimage" name="edit_uimage" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">User Type:</label>
                        <div class="col-lg-3">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="edit_Mobile_Notifications_Check" id="edit_Mobile_Notifications_Check">
                                <label class="custom-control-label" for="edit_Mobile_Notifications_Check">Notifications</label>
                            </div>

                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="edit_Posts_Check" id="edit_Posts_Check">
                                <label class="custom-control-label" for="edit_Posts_Check">Posts</label>
                            </div>

                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="edit_Marketing_Check" id="edit_Marketing_Check">
                                <label class="custom-control-label" for="edit_Marketing_Check">Marketing</label>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="edit_Products_Check" id="edit_Products_Check">
                                <label class="custom-control-label" for="edit_Products_Check">Products</label>
                            </div>

                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="edit_User_Manemet_Check" id="edit_User_Manemet_Check">
                                <label class="custom-control-label" for="edit_User_Manemet_Check">User Managemet</label>
                            </div>

                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="edit_Ecommerce_Check" id="edit_Ecommerce_Check">
                                <label class="custom-control-label" for="edit_Ecommerce_Check">Ecommerce</label>
                            </div>

                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="edit_Report_Check" id="edit_Report_Check">
                                <label class="custom-control-label" for="edit_Report_Check">Report</label>
                            </div>
                        </div>
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Submit form <i class="icon-paperplane ml-2"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    var Users = <?php echo $user_list; ?>;

    // Basic initialization
    $('.datatable-basic').DataTable({
        autoWidth: false,
        dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
        language: {
            search: '<span>Filter:</span> _INPUT_',
            lengthMenu: '<span>Show:</span> _MENU_',
            paginate: {
                'first': 'First',
                'last': 'Last',
                'next': '→',
                'previous': '←'
            }
        }
    });

    $('.PageLocation').empty().append('User Managemet');
    $('.userRoll').select2();


    $("#add_new_user_form").validate({
        rules: {
            password: {
                minlength: 5
            },
            password_confirm: {
                minlength: 5,
                equalTo: "#password"
            },
            uimage: {
                accept: "jpg,png,jpeg"
            }
        },
        messages: {
            uimage: {
                accept: "Only image type jpg/png/jpeg/gif is allowed"
            }

        },
        submitHandler: function(form) {
            $.alert({
                title: 'Are you sure!',
                content: 'Do you really want to create this user?',
                buttons: {
                    confirm: function() {
                        form.submit();
                    },
                    cancel: function() {

                    }
                }
            });
        }
    });

    $("#edit_user_form").validate({
        rules: {
            edit_password: {
                minlength: 5
            },
            edit_password_confirm: {
                minlength: 5,
                equalTo: "#edit_password"
            },
            uimage: {
                accept: "jpg,png,jpeg"
            }
        },
        messages: {
            uimage: {
                accept: "Only image type jpg/png/jpeg/gif is allowed"
            }

        },
        submitHandler: function(form) {
            $.alert({
                title: 'Are you sure!',
                content: 'Do you really want to edit this user?',
                buttons: {
                    confirm: function() {
                        form.submit();
                    },
                    cancel: function() {

                    }
                }
            });

        }
    });


    $('.delete-user').click(function(e) {
        e.preventDefault() // Don't post the form, unless confirmed
        $.alert({
            title: 'Are you sure!',
            content: 'Do you really want delete this user?',
            buttons: {
                confirm: function() {
                    $(e.target).closest('form').submit();
                },
                cancel: function() {

                }
            }
        });
    });

    function edituser(id_val) {
        let valueRequest = [];
        for (var x = 0; x < Users.length; x++) {
            if (Users[x].id == id_val) {
                valueRequest = Users[x];
                break;
            }
        }
        $('.custom-control-input').prop('checked', false);
        $('#edit_id').empty().val(valueRequest.id);
        $('#edit_uname').empty().val(valueRequest.name);
        $('#edit_email').empty().val(valueRequest.email);
        if (valueRequest.mobile_notifications == 1) {
            $("#edit_Mobile_Notifications_Check").prop('checked', true);
        }

        if (valueRequest.posts == 1) {
            $("#edit_Posts_Check").prop('checked', true);
        }

        if (valueRequest.marketing == 1) {
            $("#edit_Marketing_Check").prop('checked', true);
        }

        if (valueRequest.products == 1) {
            $("#edit_Products_Check").prop('checked', true);
        }

        if (valueRequest.user_managemet == 1) {
            $("#edit_User_Manemet_Check").prop('checked', true);
        }

        if (valueRequest.ecommerce == 1) {
            $("#edit_Ecommerce_Check").prop('checked', true);
        }

        if (valueRequest.report == 1) {
            $("#edit_Report_Check").prop('checked', true);
        }
        $('#modal_large_editUser').modal('show');
    }
</script>

<style>
    .PageLocation {
        display: contents;
    }
</style>
@endsection