@extends('layouts.app')
@section('title', 'Posts')
@section('content')
    <script src="{{ asset('global_assets/js/plugins/editors/summernote/summernote.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
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
                    <button data-toggle="modal" data-target="#addblog" type="button" class="btn bg-indigo-400"><i
                            class="icon-upload7 mr-2"></i>New News & Events | Blog </button>
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
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title"></h6>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                                <a class="list-icons-item" data-action="remove"></a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <ul class="nav nav-tabs nav-tabs-solid bg-slate border-0 nav-tabs-component rounded">
                            <li class="nav-item"><a href="#colored-rounded-tab1" class="nav-link rounded-left"
                                    data-toggle="tab">News & Events Posts</a></li>
                            <li class="nav-item"><a href="#colored-rounded-tab3" class="nav-link"
                                    data-toggle="tab">Event Registered Users</a></li>
                            <li class="nav-item"><a href="#colored-rounded-tab2" class="nav-link active"
                                    data-toggle="tab">Blog Post</a></li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane fade" id="colored-rounded-tab1">
                                <div class="responsive">
                                    <table class="table datatable-basic">
                                        <thead>
                                            <tr>
                                                <th>Post ID</th>
                                                <th>Title</th>
                                                <th>Published By</th>
                                                <th>Event Time</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($News_Events as $News_Events_)
                                                <tr>
                                                    <td>{{ $News_Events_->id }}</td>
                                                    <td>{{ $News_Events_->title }}</td>
                                                    <td>{{ $News_Events_->created_at }} |
                                                        {{ $News_Events_->created_user }}
                                                    </td>
                                                    <td>
                                                        @if ($News_Events_->date)
                                                            {{ $News_Events_->date }} |@endif @if ($News_Events_->time){{ $News_Events_->time }}
                                                            @endif
                                                    </td>
                                                    <td>
                                                        @if ($News_Events_->status == 1)
                                                            <span
                                                            class="badge bg-blue">Active</span>@elseif($News_Events_->status==0)<span
                                                            class="badge bg-danger">Block</span>@elseif($News_Events_->status==2)<span
                                                                class="badge bg-grey-400">Suspended</span>
                                                        @endif
                                                    </td>
                                                    <td>

                                                        <div class="row">
                                                            <div class="col-4">
                                                                <a href="#"
                                                                    class="btn bg-success-400 rounded-round btn-icon btn-sm "
                                                                    onclick="editNewsEventsPost({{ $News_Events_->id }})">
                                                                    <i class="icon-pencil"></i>
                                                                </a>
                                                            </div>
                                                            <div class="col-4">
                                                                <form method="POST"
                                                                    action="{{ route('ModulePosts/destroy_post') }}">
                                                                    {{ csrf_field() }}
                                                                    <div class="form-group">
                                                                        <input type="text" name="delete_id"
                                                                            id="delete_id_News_Events"
                                                                            value="{{ $News_Events_->id }}" hidden>
                                                                        <input type="submit"
                                                                            class="btn bg-pink-400 rounded-round btn-icon btn-sm delete_post"
                                                                            value="Delete Event">
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>


                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="colored-rounded-tab3">
                                <div class="responsive">
                                    <table id="regi_event" class="table datatable-basic">
                                        <thead>
                                            <tr>
                                                <th>Registered ID</th>
                                                <th>Event ID</th>
                                                <th>Registered User Name</th>
                                                <th>Registered Email</th>
                                                <th>Mobile</th>
                                                <th>Company</th>
                                                <th>Designation</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($EventRegister as $EventRegister)
                                                <tr>
                                                    <td>{{ $EventRegister->id }}</td>
                                                    <td>{{ $EventRegister->post_id }}</td>
                                                    <td>{{ $EventRegister->fname }} {{ $EventRegister->lname }}
                                                        <td>{{ $EventRegister->email }}</td>
                                                        <td>{{ $EventRegister->mobile }}</td>
                                                        <td>{{ $EventRegister->company }}</td>
                                                        <td>{{ $EventRegister->role }}</td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane fade active show" id="colored-rounded-tab2">
                                <div class="responsive">
                                    <table class="table datatable-basic">
                                        <thead>
                                            <tr>
                                                <th>Post ID</th>
                                                <th>Title</th>
                                                <th>Published By</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($Blog as $Blog_)
                                                <tr>
                                                    <td>{{ $Blog_->id }}</td>
                                                    <td>{{ $Blog_->title }}</td>
                                                    <td>{{ $Blog_->created_at }} | {{ $Blog_->created_user }}</td>
                                                    <td>
                                                        @if ($Blog_->status == 1)<span
                                                            class="badge bg-blue">Active</span>@elseif($Blog_->status==0)<span
                                                            class="badge bg-danger">Block</span>@elseif($Blog_->status==2)<span
                                                                class="badge bg-grey-400">Suspended</span>@endif
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <a href="#"
                                                                    class="btn bg-success-400 rounded-round btn-icon btn-sm "
                                                                    onclick="editBlogPost({{ $Blog_->id }})">
                                                                    <i class="icon-pencil"></i>
                                                                </a>
                                                            </div>
                                                            <div class="col-4">
                                                                <form method="POST"
                                                                    action="{{ route('ModulePosts/destroy_post') }}">
                                                                    {{ csrf_field() }}
                                                                    <div class="form-group">
                                                                        <input type="text" name="delete_id"
                                                                            id="delete_id_Blog" value="{{ $Blog_->id }}"
                                                                            hidden>
                                                                        <input type="submit"
                                                                            class="btn bg-pink-400 rounded-round btn-icon btn-sm delete_post"
                                                                            value="Delete Post">
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>

                                                    </td>
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
    </div>



    <div id="addblog" class="modal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New News & Events | Blog </h5>
                    <button type="button" class="close" onclick="clearFil();" data-dismiss="modal">×</button>
                </div>

                <div class="modal-body">
                    <form method="POST" action="{{ route('ModulePosts/addNewPost') }}" id="add_new_post_form"
                        autocomplete="off" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="title" class="col-lg-3 col-form-label">Title:</label>
                            <div class="col-lg-9">
                                <input type="text" id="title" name="title" maxlength="30" minlength="10" required
                                    class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="short_d" class="col-lg-3 col-form-label">Short Description:</label>
                            <div class="col-lg-9">
                                <input type="text" id="short_d" name="short_d" maxlength="160" minlength="150" required
                                    class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="type_" class="col-lg-3 col-form-label">Type:</label>
                            <div class="col-lg-9">
                                <select required name="type_" id="type_" class="form-control form-control-lg">
                                    <option value="">----</option>
                                    <option value="1">Blog Post</option>
                                    <option value="2">News & Event Post</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row datetime d-none">
                            <label class="col-lg-3 col-form-label" for="date">Date Time:</label>
                            <div class="col-lg-6">
                                <input required type="date" id="date" name="date" class="form-control">
                            </div>
                            <div class="col-lg-3">
                                <input required type="time" id="Time" name="Time" class="form-control">
                            </div>
                        </div>


                        <div class="form-group row datetime d-none">
                            <label class="col-lg-3 col-form-label" for="date">Date End Time:</label>
                            <div class="col-lg-6">
                                <input required type="date" id="date_end" name="date_end" class="form-control">
                            </div>
                            <div class="col-lg-3">
                                <input required type="time" id="Time_end" name="Time_end" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label" for="image">Thumbnail Image:</label>
                            <div class="col-lg-9">
                                <input required type="file" id="image" name="image" class="form-control">
                            </div>
                        </div>

                        <textarea id="description" class="summernote" name="description"></textarea>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Submit form <i
                                    class="icon-paperplane ml-2"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div id="modal_large_editPost" class="modal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit News & Events | Blog </h5>
                    <button type="button" class="close" onclick="clearFil();" data-dismiss="modal">×</button>
                </div>

                <div class="modal-body">
                    <form method="POST" action="{{ route('ModulePosts/editPost') }}" id="edit_post_form"
                        autocomplete="off" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        <input type="text" hidden value="" name="id_edit" id="id_edit">
                        <div class="form-group row">
                            <label for="title_edit" class="col-lg-3 col-form-label">Title:</label>
                            <div class="col-lg-9">
                                <input type="text" id="title_edit" name="title_edit" maxlength="30" minlength="10"
                                    class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="short_d_edit" class="col-lg-3 col-form-label">Short Description:</label>
                            <div class="col-lg-9">
                                <input type="text" id="short_d_edit" name="short_d_edit" maxlength="160" minlength="150"
                                    class="form-control">
                            </div>
                        </div>

                        <div class="form-group row datetime_edit d-none">
                            <label class="col-lg-3 col-form-label" for="date">Date Time:</label>
                            <div class="col-lg-6">
                                <input required type="date" id="date_start_edit" name="date_edit" class="form-control">
                            </div>
                            <div class="col-lg-3">
                                <input required type="time" id="Time_start_edit" name="Time_edit" class="form-control">
                            </div>
                        </div>


                        <div class="form-group row datetime_edit d-none">
                            <label class="col-lg-3 col-form-label" for="date">Date End Time:</label>
                            <div class="col-lg-6">
                                <input required type="date" id="date_end_edit" name="date_end_edit" class="form-control">
                            </div>
                            <div class="col-lg-3">
                                <input required type="time" id="Time_end_edit" name="Time_end_edit" class="form-control">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label" for="image_edit">Thumbnail Image:</label>
                            <div class="col-lg-9">
                                <input type="file" id="image_edit" name="image_edit" class="form-control">
                            </div>
                        </div>

                        <div id="description_edit" class="summernote" name="description_edit"></div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Submit form <i
                                    class="icon-paperplane ml-2"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    </div>

    <script>
        //summernote texteditor setup
        var Blog = <?php echo $Blog; ?>;
        var News_Events = <?php echo $News_Events; ?>;
        $(document).ready(function() {
            $('.summernote').summernote();
        });

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
        

        $('#type_').change(function() {
            var value = $(this).val();
            if (value == 2) {
                $('.datetime').removeClass("d-none");
            } else {
                if (!$('.datetime').hasClass("d-none")) {
                    $('.datetime').addClass("d-none");
                }
            }
        });

        $("#add_new_post_form").validate({
            rules: {
                title: {
                    minlength: 10,
                    maxlength: 30
                },
                short_d: {
                    minlength: 150,
                    maxlength: 160
                }
            },
            submitHandler: function(form) {
                $.alert({
                    title: 'Are you sure!',
                    content: 'Do you really want to create this?',
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

        $("#edit_post_form").validate({
            rules: {
                title_edit: {
                    minlength: 10,
                    maxlength: 30
                },
                short_d_edit: {
                    minlength: 150,
                    maxlength: 160
                }
            },
            submitHandler: function(form) {
                $.alert({
                    title: 'Are you sure!',
                    content: 'Do you really want to create this?',
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

        $('.delete_post').click(function(e) {
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

        function editBlogPost(id_val) {
            let valueRequestBlog = [];
            for (var x = 0; x < Blog.length; x++) {
                if (Blog[x].id == id_val) {
                    valueRequestBlog = Blog[x];
                    break;
                }
            }
            $('#id_edit').empty().val(valueRequestBlog.id);
            $('#title_edit').empty().val(valueRequestBlog.title);
            $('#short_d_edit').empty().val(valueRequestBlog.short_des);

            $('.note-editable').empty().append(valueRequestBlog.desc);
            if (!$('.datetime_edit').hasClass("d-none")) {
                $('.datetime_edit').addClass("d-none");
            }
            $('#modal_large_editPost').modal('show');
        }

        function editNewsEventsPost(id_val) {
            let valueRequestNewsEvents = [];
            for (var x = 0; x < News_Events.length; x++) {
                if (News_Events[x].id == id_val) {
                    valueRequestNewsEvents = News_Events[x];
                    break;
                }
            }
            // console.log(valueRequestNewsEvents);
            if ($('.datetime_edit').hasClass("d-none")) {
                $('.datetime_edit').removeClass("d-none");
            }
            $('#id_edit').empty().val(valueRequestNewsEvents.id);
            $('#title_edit').empty().val(valueRequestNewsEvents.title);
            $('#short_d_edit').empty().val(valueRequestNewsEvents.short_des);
            $('#date_start_edit').empty().val(valueRequestNewsEvents.date);
            $('#Time_start_edit').empty().val(valueRequestNewsEvents.time);
            $('#date_end_edit').empty().val(valueRequestNewsEvents.date_end);
            $('#Time_end_edit').empty().val(valueRequestNewsEvents.Time_end);

            $('.note-editable').empty().append(valueRequestNewsEvents.desc);
            // console.log(valueRequestNewsEvents.desc);
            $('#description_edit .note-editable card-block').empty().append("valueRequestNewsEvents.desc");
            $('#modal_large_editPost').modal('show');
        }

        function clearFil() {
            location.reload();
        }

        $('.PageLocation').empty().append('Posts | Blog - NEWS - Events');
    </script>
    <style>
        .PageLocation {
            display: contents;
        }

    </style>
@endsection
