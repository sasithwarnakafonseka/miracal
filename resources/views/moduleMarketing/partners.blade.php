@extends('layouts.app')
@section('title', 'Partners - Marketing')
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
                    <h6 class="card-title">Partner List</h6>
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
                                            <th>Name</th>
                                            <th>Logo</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($partners as $partner)
                                    <tr>
                                            <td>{{$partner->id}}</td>
                                            <td>{{$partner->name}}</td>
                                            <td> <div class="responsive"><img width="55px" src="{{ asset('storage/'.$partner->logo) }}" alt=""></div> </td>
                                            <td>@if($partner->status==1)<span class="badge bg-blue">Active</span>@elseif($partner->status==0)<span class="badge bg-danger">Block</span>@elseif($partner->status==2)<span class="badge bg-grey-400">Suspended</span>@endif</td>
                                            <td>
                                                <form method="POST" action="{{route('ModuleMarketing/Partners/destroy_partners')}}">
                                                    {{ csrf_field() }}
                                                    <div class="form-group">
                                                        <input type="text" name="delete_id" id="delete_id" value="{{$partner->id}}" hidden>
                                                        <input type="submit" class="btn bg-pink-400 rounded-round btn-icon btn-sm delete-partner" value="Delete Partner">
                                                    </div>
                                                </form>
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
                    <h6 class="card-title">Add New Partner</h6>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                            <a class="list-icons-item" data-action="reload"></a>
                            <a class="list-icons-item" data-action="remove"></a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                <form action="{{ route('ModuleMarketing/Partners/addnew') }}" id="add_partner" autocomplete="off" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label>Partner Name</label>
                                        <input required type="text" class="form-control" name="title">
                                    </div>
                                    <div class="form-group">
                                        <label>Partner WebSite URL</label>
                                        <input required type="url" class="form-control" name="url">
                                    </div>

                                    <div class="form-group">
                                        <label>Offering</label>
                                       <select name="Offering[]" class="select2" id="Offering" multiple>
                                        <option  value="Wines">Wines</option>
                                        <option  value="Spirits">Spirits</option>
                                        <option  value="Bubbles">Bubbles</option>
                                        <option  value="Beer">Beer</option>
                                        <option  value="Sake">Sake</option>
                                        <option  value="Liqueurs">Liqueurs</option>
                                        <option  value="Non-Alcoholic">Non-Alcoholic</option>
                                        <option  value="miracle-Accessories">miracle Accessories</option>
                                       </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Logo</label>
                                        <input required type="file" class="form-control" name="logo">
                                    </div>
                                    <button type="submit" class="btn btn-success btn-block add_partner">Add New Partner</button>
                                </form>
                </div>
            </div>

        </div>
    </div>
    <script>
         $('.PageLocation').empty().append('Marketing - Partners');
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

    $("#add_partner").validate({
        rules: {
            title: {
                minlength: 5,
                maxlength:100
            },
            logo: {
                accept: "jpg,png,jpeg"
            }
        },
        messages: {
            logo: {
                accept: "Only image type jpg/png/jpeg/gif is allowed"
            }

        },
        submitHandler: function(form) {
            $.alert({
                title: 'Are you sure!',
                content: 'Do you really want to create this Partner?',
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


    $('.delete-partner').click(function(e) {
        e.preventDefault() // Don't post the form, unless confirmed
        $.alert({
            title: 'Are you sure!',
            content: 'Do you really want delete this Partner?',
            buttons: {
                confirm: function() {
                    $(e.target).closest('form').submit();
                },
                cancel: function() {

                }
            }
        });
    });
    
    </script>
    <style>
        .PageLocation {
            display: contents;
        }
    </style>
    @endsection