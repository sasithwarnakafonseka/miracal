@extends('layouts.app')

@section('title', 'Mobile Notifiction')

@section('content')

<!-- Page header -->
<div class="page-header">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - <div class="PageLocation"></div>
            </h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

        <div class="header-elements d-none text-center text-md-left mb-3 mb-md-0">
            <div class="btn-group">
                <button type="button" onclick="startFCM()" class="btn bg-indigo-400"><i class="icon-bubble-notification mr-2"></i> Allow Notifications</button>
            </div>
        </div>
    </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content pt-0">
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
    <div class="row">
        <div class="col-xl-12">
            <div class="card card-collapsed">
                <div class="card-header header-elements-inline">
                    <h6 class="card-title">Send Notifications</h6>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item rotate-180" data-action="collapse"></a>
                            <a class="list-icons-item" data-action="reload"></a>
                            <a class="list-icons-item" data-action="remove"></a>
                        </div>
                    </div>
                </div>

                              
                <div class="card-body">
                    <ul class="nav nav-tabs nav-tabs-solid bg-slate border-0 nav-tabs-component rounded">
                        <li class="nav-item"><a href="#colored-rounded-tab1" class="nav-link rounded-left" data-toggle="tab">All Users</a></li>
                        <li class="nav-item"><a href="#colored-rounded-tab2" class="nav-link active" data-toggle="tab">Selected User</a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade" id="colored-rounded-tab1">
                       

                                <form action="{{ route('send.web-notification') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label>Message Title</label>
                                        <input required type="text" class="form-control" name="title">
                                    </div>
                                    <div class="form-group">
                                        <label>Message Body</label>
                                        <textarea required class="form-control" name="body"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-success btn-block">Send Notification</button>
                                </form>
                        </div>

                        <div class="tab-pane fade active show" id="colored-rounded-tab2">
                              

                                <form action="{{ route('send.web-notification-user') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label>Select User</label>
                                        <select filterPlaceholder="true" required name="userId" id="userId" class="form-control select-search form-control-lg">
                                            <option value="">--Select User--</option>
                                            @php
                                                $users = \App\Models\User::all();
                                            @endphp
                                            @foreach($users as $user)
                                            <option required value="{{$user->id}}">{{$user->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Message Title</label>
                                        <input required type="text" class="form-control" name="title">
                                    </div>
                                    <div class="form-group">
                                        <label>Message Body</label>
                                        <textarea required class="form-control" name="body"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-success btn-block">Send Notification</button>
                                </form>

                            
                        </div>

                    </div>
                </div>
            </div>



            <div class="card card-collapsed">
                <div class="card-header header-elements-inline">
                    <h6 class="card-title">Notifications History</h6>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item rotate-180" data-action="collapse"></a>
                            <a class="list-icons-item" data-action="reload"></a>
                            <a class="list-icons-item" data-action="remove"></a>
                        </div>
                    </div>
                </div>

                    

                <div class="card-body">
                    <ul class="nav nav-tabs nav-tabs-solid bg-slate border-0 nav-tabs-component rounded">
                        <li class="nav-item"><a href="#colored-rounded-tab3" class="nav-link rounded-left" data-toggle="tab">All Users</a></li>
                        <li class="nav-item"><a href="#colored-rounded-tab4" class="nav-link active" data-toggle="tab">Selected User</a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade" id="colored-rounded-tab3">
                       
                        <div class="responsive">
                                <table class="table datatable-basic">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Body</th>
                                            <th>Status</th>
                                            <th>Date-Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($all_user as $all_user)
                                        <tr>
                                            <td>{{$all_user->id}}</td>
                                            <td>{{$all_user->title}}</td>
                                            <td>{{$all_user->body}}</td>
                                            <td>{{$all_user->status}}</td>
                                            <td>{{$all_user->updated_at}}</td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            
                        </div>

                        <div class="tab-pane fade active show" id="colored-rounded-tab4">
                              

                        <div class="responsive">
                                <table class="table datatable-basic">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Body</th>
                                            <th>Status</th>
                                            <th>User</th>
                                            <th>Date-Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($single_user as $single_user)
                                        <tr>
                                            <td>{{$single_user->id}}</td>
                                            <td>{{$single_user->title}}</td>
                                            <td>{{$single_user->body}}</td>
                                            <td>{{$single_user->status}}</td>
                                            <td>{{$single_user->name}}</td>
                                            <td>{{$single_user->updated_at}}</td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>

                            
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Module List Table -->

    <script>
        $('.PageLocation').empty().append('Notifications');
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
    </script>
    <style>
        .PageLocation {
            display: contents;
        }
    </style>
    @endsection