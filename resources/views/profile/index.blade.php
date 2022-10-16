@extends('layouts.app')
@section('title', 'Profile')
@section('content')
    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - <div
                        class="PageLocation"></div>
                </h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div class="content pt-0">
        <div class="row">
            <div class="col-xl-7">
                <!-- Traffic sources -->
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title">Edit My Account</h6>
                    </div>
                    <div class="card-body py-0">
                        <form method="POST" action="{{route('edit.user')}}" class="delete_product">
                            {{ csrf_field() }}
                            <div class="form-group row">

                                <div class="col-6">
                                    <div class="form-group">
                                        <label>User Name</label>
                                        <input type="text" class="form-control " name="uname" value="{{$user ?? ''->name}}">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label>User Email</label>
                                        <input type="text" class="form-control " name="email" value="{{$user ?? ''->email}}">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Contact Number</label>
                                        <input type="text" class="form-control " name="Contact_Number" value="{{$user ?? ''->phone}}">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group mt-3">

                                        <input type="submit"
                                            class="btn bg-pink-400 rounded-round btn-icon btn-sm  delete-user"
                                            value="Change Details">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /traffic sources -->

            </div>

            <div class="col-xl-5">

                <!-- Traffic sources -->
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title">Reset Passowrd</h6>
                    </div>

                    <div class="card-body py-0">
                        <form method="POST" action="{{route('edit.user.pasword')}}" class="delete_product">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <div class="form-group">
                                    <label>New Password</label>
                                    <input type="password" class="form-control " name="new_pass" value="">
                                </div>

                                <div class="form-group">
                                    <label>Confirm New Password</label>
                                    <input type="password" class="form-control " name="conf_new_pass" value="">
                                </div>

                                <div class="form-group">

                                    <input type="submit" class="btn bg-pink-400 rounded-round btn-icon btn-sm  delete-user"
                                        value="Change My Password">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /traffic sources -->

            </div>

        </div>

        <script>
            $('.PageLocation').empty().append('My Profile');
        </script>
        <style>
            .PageLocation {
                display: contents;
            }

        </style>
    @endsection
