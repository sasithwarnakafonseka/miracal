@extends('layouts.app')
@section('title', 'Teams - Marketing')
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

            <div class="header-elements d-none text-center text-md-left mb-3 mb-md-0">
                <div class="btn-group">
                    <!-- <button type="button" class="btn bg-indigo-400"><i class="icon-bubble-notification mr-2"></i> Create New Notification</button> -->
                </div>
            </div>
        </div>
    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div class="content pt-0">
        <div class="row">
            <div class="col-xl-7">

                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title">Team Members List</h6>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                                <a class="list-icons-item" data-action="remove"></a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="responsive">
                            <table class="table datatable-basic">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name & Title</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Links</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allTeams as $allTeamsitem)
                                        <tr>
                                            <td>{{ $allTeamsitem->id }}</td>
                                            <td>{{ $allTeamsitem->name }} | {{ $allTeamsitem->role }}</td>
                                            <td>
                                                <div class="responsive"><img width="55px"
                                                        src="{{ asset('storage/' . $allTeamsitem->img) }}" alt=""></div>
                                            </td>
                                            <td>@if ($allTeamsitem->status == 1)<span class="badge bg-blue">Active</span>@elseif($allTeamsitem->status==0)<span class="badge bg-danger">Block</span>@elseif($allTeamsitem->status==2)<span class="badge bg-grey-400">Suspended</span>@endif</td>
                                            <td>
                                                <ul style="padding-inline-start: 15px;">
                                                    <li>
                                                        <a href="{{ $allTeamsitem->name }}">Facebook</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ $allTeamsitem->name }}">Linkdin</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ $allTeamsitem->name }}">Instagrame</a>
                                                    </li>
                                                </ul>



                                            </td>
                                            <td>
                                                <form method="POST"
                                                    action="{{ route('ModuleMarketing/Teams/destroy_team_member') }}">
                                                    {{ csrf_field() }}
                                                    <div class="form-group">
                                                        <input type="text" name="delete_id" id="delete_id"
                                                            value="{{ $allTeamsitem->id }}" hidden>
                                                        <input type="submit"
                                                            class="btn bg-pink-400 rounded-round btn-icon btn-sm delete-partner"
                                                            value="Delete">
                                                    </div>
                                                </form>
                                                <a href="#" class="btn bg-success-400 rounded-round btn-icon btn-sm "
                                                    onclick="editTeam_edit({{ $allTeamsitem }})">
                                                    <i class="icon-pencil"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-5">

                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title">Add New Team Member </h6>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                                <a class="list-icons-item" data-action="remove"></a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('/ModuleMarketing/Teams/addnew') }}" id="add_partner" autocomplete="off"
                            enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Member Name</label>
                                <input required type="text" class="form-control" name="name">
                            </div>
                            <div class="form-group">
                                <label>Member Role</label>
                                <input required type="text" class="form-control" name="role">
                            </div>
                            <div class="form-group">
                                <label>Member Image</label>
                                <input required type="file" class="form-control" name="img">
                            </div>

                            <div class="form-group">
                                <label>Social Media Links</label>
                                <div class="form-group">
                                    <label>Facebook</label>
                                    <input  type="url" class="form-control" name="facebook">
                                </div>

                                <div class="form-group">
                                    <label>Linkdin</label>
                                    <input  type="url" class="form-control" name="linkdin">
                                </div>

                                <div class="form-group">
                                    <label>Instagram</label>
                                    <input  type="url" class="form-control" name="instagram">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success btn-block add_partner">Add New Partner</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <div id="modal_large_team" class="modal">
            <div class="modal-dialog modal-lg" style="max-width: 1200px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Team Member </h5>
                        <button type="button" class="close" data-dismiss="modal">×</button>
                    </div>

                    <div class="modal-body">
                        <form action="{{ route('/ModuleMarketing/Teams/edit') }}" id="edit_partner" autocomplete="off"
                            enctype="multipart/form-data" method="POST">
                            @csrf

                            <input type="hidden" name="id" id="id">
                            <div class="form-group">
                                <label>Member Name</label>
                                <input required type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="form-group">
                                <label>Member Role</label>
                                <input required type="text" class="form-control" id="role" name="role">
                            </div>
                            <div class="form-group">
                                <label>Member Image</label>
                                <input  type="file" class="form-control" id="img" name="img">
                            </div>

                            <div class="form-group">
                                <label>Social Media Links</label>
                                <div class="form-group">
                                    <label>Facebook</label>
                                    <input  type="url" class="form-control" id="facebook" name="facebook">
                                </div>

                                <div class="form-group">
                                    <label>Linkdin</label>
                                    <input  type="url" class="form-control" id="linkdin" name="linkdin">
                                </div>

                                <div class="form-group">
                                    <label>Instagram</label>
                                    <input  type="url" class="form-control" id="instagram" name="instagram">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success btn-block add_partner">Add New Partner</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $('.PageLocation').empty().append('Team Members');


            


            function editTeam_edit(data) {
                $('#modal_large_team').modal('show');
                console.log(data);
                $('#name').val(data.name);
                $('#role').val(data.role);
                $('#facebook').val(data.facebook);
                $('#linkdin').val(data.linkdin);
                $('#instagram').val(data.instagram);
                $('#id').val(data.id);
            }
        </script>
        <style>
            .PageLocation {
                display: contents;
            }

        </style>
    @endsection
