@extends('layouts.app')
@section('title', 'Testimonial - Marketing')
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
                    <h6 class="card-title">Testimonial List</h6>
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
                                            <th>User Title</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($testimonios as $testimonio)
                                        <tr>
                                            <td>{{$testimonio->id}}</td>
                                            <td>{{$testimonio->name}}</td>
                                            <td>{{$testimonio->title}}</td>
                                            <td> <div class="responsive"><img width="55px" src="{{ asset('storage/'.$testimonio->img) }}" alt=""></div> </td>
                                            <td>@if($testimonio->status==1)<span class="badge bg-blue">Active</span>@elseif($testimonio->status==0)<span class="badge bg-danger">Block</span>@elseif($testimonio->status==2)<span class="badge bg-grey-400">Suspended</span>@endif</td>
                                            <td>
                                                <a href="#" class="btn bg-success-400 rounded-round btn-icon btn-sm " onclick="edittestimonio({{$testimonio->id}})">
                                                    <i class="icon-pencil"></i>
                                                </a>
                                                <form method="POST" action="{{route('ModuleMarketing/Testimonio/destroy_testimonio')}}">
                                                    {{ csrf_field() }}
                                                    <div class="form-group">
                                                        <input type="text" name="delete_id" id="delete_id" value="{{$testimonio->id}}" hidden>
                                                        <button type="submit" class="btn bg-pink-400 rounded-round btn-icon btn-sm delete-testimonio" value="Delete Testimonio"><i class="icon-bin"></i></button>
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
                    <h6 class="card-title">Add New Testimonial</h6>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                            <a class="list-icons-item" data-action="reload"></a>
                            <a class="list-icons-item" data-action="remove"></a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                <form action="{{ route('ModuleMarketing/Testimonio/addnew') }}" id="add_testimonios" autocomplete="off" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label>Testimonial User Name</label>
                                        <input required type="text" class="form-control" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label>Testimonial User Title</label>
                                        <input required type="text" class="form-control" name="title">
                                    </div>
                                    <div class="form-group">
                                        <label>Testimonial</label>
                                        <input required type="text" class="form-control" name="testimonio">
                                    </div>
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input required type="file" class="form-control" name="image">
                                    </div>
                                    <button type="submit" class="btn btn-success btn-block add_testimonios">Add New Testimonio</button>
                                </form>
                </div>
            </div>

        </div>
    </div>



<div id="modal_large_edittestimonio" class="modal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Testimonial</h5>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>

            <div class="modal-body">
                <form method="POST" action="{{route('ModuleMarketing/Testimonio/edit_testimonio')}}" id="edit_etstimonio_form" autocomplete="off" enctype="multipart/form-data">

                    {{ csrf_field() }}
                                    <input type="text" id="edit_id" value="" hidden name="edit_id">
                                    <div class="form-group">
                                    <label>Testimonial User Name</label>
                                    <input required type="text" id="edit_name"  class="form-control" name="edit_name">
                                    </div>
                                    <div class="form-group">
                                        <label>Testimonial User Title</label>
                                        <input required type="text" id="edit_title" class="form-control" name="edit_title">
                                    </div>
                                    <div class="form-group">
                                        <label>Testimonial</label>
                                        <input required type="text" class="form-control" id="edit_testimonio" name="edit_testimonio">
                                    </div>
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input  type="file" class="form-control" id="edit_image" name="edit_image">
                                    </div>
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary">Edit Testimonial <i class="icon-paperplane ml-2"></i></button>
                                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

    <script>

        var Testimonios = <?php echo $testimonios; ?>;

        $('.PageLocation').empty().append('Marketing - Testimonial');
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

    $("#add_testimonios").validate({
        rules: {
            name: {
                minlength: 5,
                maxlength:100
            },
            title: {
                minlength: 5,
                maxlength:100
            },
            testimonio: {
                minlength: 5,
                maxlength:300
            },
            image: {
                accept: "jpg,png,jpeg"
            }
        },
        messages: {
            image: {
                accept: "Only image type jpg/png/jpeg/gif is allowed"
            }

        },
        submitHandler: function(form) {
            $.alert({
                title: 'Are you sure!',
                content: 'Do you really want to create this Testimonio?',
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


    $("#edit_etstimonio_form").validate({
        rules: {
            edit_name: {
                minlength: 5,
                maxlength:100
            },
            edit_title: {
                minlength: 5,
                maxlength:100
            },
            edit_testimonio: {
                minlength: 5,
                maxlength:300
            },
            edit_image: {
                accept: "jpg,png,jpeg"
            }
        },
        messages: {
            edit_image: {
                accept: "Only image type jpg/png/jpeg/gif is allowed"
            }

        },
        submitHandler: function(form) {
            $.alert({
                title: 'Are you sure!',
                content: 'Do you really want to update this Testimonio?',
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


    $('.delete-testimonio').click(function(e) {
        e.preventDefault() // Don't post the form, unless confirmed
        $.alert({
            title: 'Are you sure!',
            content: 'Do you really want delete this Testimonio?',
            buttons: {
                confirm: function() {
                    $(e.target).closest('form').submit();
                },
                cancel: function() {

                }
            }
        });
    });


    function edittestimonio(id_val) {
        let valueRequest = [];
        for (var x = 0; x < Testimonios.length; x++) {
            if (Testimonios[x].id == id_val) {
                valueRequest = Testimonios[x];
                break;
            }
        }
        $('#edit_id').empty().val(valueRequest.id);

        $('#edit_name').empty().val(valueRequest.name);

        $('#edit_title').empty().val(valueRequest.title);

        $('#edit_testimonio').empty().val(valueRequest.testimonio);
        
        $('#modal_large_edittestimonio').modal('show');
    }
    
    </script>
    <style>
        .PageLocation {
            display: contents;
        }
    </style>
    @endsection