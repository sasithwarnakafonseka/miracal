@extends('layouts.app')

@section('title', 'Banners - Marketing')

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
            <div class="col-xl-12">

                <div class="card">
                    <div class="card-header header-elements-inline">

                        <select filterPlaceholder="true" required id="BannerCategories"
                            class=" col-4 form-control select-search form-control-lg">
                            <option value="">--Select Banner Category--</option>

                            @php
                                $BannerCategories = \App\Models\BannerCategories::all();
                            @endphp
                            @foreach ($BannerCategories as $BannerCategory)
                                <option required value="{{ $BannerCategory->id }}">{{ $BannerCategory->name }}</option>
                            @endforeach
                        </select>


                        <div class="header-elements">
                            {{-- <button class="btn mr-3" data-toggle="modal" data-target="#modal_large_add_cat">Add New
                                Category</button> --}}
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                                <a class="list-icons-item" data-action="remove"></a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <ul class="nav nav-tabs nav-tabs-solid bg-slate border-0 nav-tabs-component rounded">
                            <li class="nav-item"><a href="#colored-rounded-tab3" class="nav-link rounded-left active"
                                    data-toggle="tab">Header Banners</a></li>
                            <li class="nav-item"><a href="#colored-rounded-tab4" class="nav-link "
                                    data-toggle="tab">"We Offer" Banner</a></li>
                            <li class="nav-item"><a href="#colored-rounded-tab5" class="nav-link"
                                    data-toggle="tab">Meta Data</a></li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="colored-rounded-tab3">

                                <div class="responsive">
                                    <table class="table table1 datatable-basic">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Banner</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>

                            </div>

                            <div class="tab-pane fade" id="colored-rounded-tab4">


                                <div class="responsive">
                                    <table class="table table2 datatable-basic">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Banner</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="colored-rounded-tab5">


                                <div class="responsive">
                                    <table class="table table3 datatable-basic">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Meta discription</th>
                                                <th>Meta tags</th>
                                                <th>Page tital</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="cardFooter card-footer">
                        <button data-toggle="modal" data-target="#modal_Add_Banner" class="addBanner type1 btn mr-3">Add
                            Header Banner</button>
                        <button data-toggle="modal" data-target="#modal_Add_Banner"
                            class="addBanner button2 type2 btn mr-3">Add
                            "We Offer" Banner</button>

                        <button data-toggle="modal" data-target="#modal_Add_meta"
                            class="addBanner addMetaData button3 type2 btn mr-3">Add Meta</button>
                    </div>
                </div>
            </div>



        </div>
        <div id="modal_edit_meta" class="modal" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Category</h5>
                        <button type="button" class="close" data-dismiss="modal">×</button>
                    </div>

                    <div class="modal-body">
                        <form method="POST" action="{{ route('ModuleMarketing/meta/edit') }}" id="edit_meta_form"
                            autocomplete="off" enctype="multipart/form-data">

                            {{ csrf_field() }}

                            <input required type="text" hidden id="page_id_edit" class="form-control"
                            name="id">
                                <input required type="text" hidden id="page_id_meta_edit" class="form-control"
                                    name="page_id_meta">
                                    

                            <div class="form-group">
                                <label>Page Title</label>
                                <input required type="text" id="page_title_meta_edit" class="form-control"
                                    name="page_title_meta">
                            </div>

                            <div class="form-group">
                                <label>Meta Discription</label>
                                <input required type="text" id="page_discription_meta_edit" class="form-control"
                                    name="page_discription_meta">
                            </div>

                            <div class="form-group">
                                <label>Meta Tag (Ex: #test #test1 #test2)</label>
                                <input required type="text" id="page_tag_meta_edit" class="form-control"
                                    name="page_tag_meta">
                            </div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Add Category<i
                                        class="icon-paperplane ml-2"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="modal_Add_meta" class="modal" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">New Category</h5>
                        <button type="button" class="close" data-dismiss="modal">×</button>
                    </div>

                    <div class="modal-body">
                        <form method="POST" action="{{ route('ModuleMarketing/meta/add') }}" id="Add_meta_form"
                            autocomplete="off" enctype="multipart/form-data">

                            {{ csrf_field() }}

                            
                                <input required type="text" hidden id="page_id_meta" class="form-control"
                                    name="page_id_meta">
                      

                            <div class="form-group">
                                <label>Page Title</label>
                                <input required type="text" id="page_title_meta" class="form-control"
                                    name="page_title_meta">
                            </div>

                            <div class="form-group">
                                <label>Meta Discription</label>
                                <input required type="text" id="page_discription_meta" class="form-control"
                                    name="page_discription_meta">
                            </div>

                            <div class="form-group">
                                <label>Meta Tag (Ex: #test #test1 #test2)</label>
                                <input required type="text" id="page_tag_meta" class="form-control"
                                    name="page_tag_meta">
                            </div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Add Category<i
                                        class="icon-paperplane ml-2"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div id="modal_large_add_cat" class="modal" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">New Category</h5>
                        <button type="button" class="close" data-dismiss="modal">×</button>
                    </div>

                    <div class="modal-body">
                        <form method="POST" action="{{ route('ModuleMarketing/Banners/add_cat') }}" id="Add_Category_form"
                            autocomplete="off" enctype="multipart/form-data">

                            {{ csrf_field() }}

                            <div class="form-group">
                                <label>Banner Category Name</label>
                                <input required type="text" id="banner_cat_name" class="form-control"
                                    name="banner_cat_name">
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Add Category<i
                                        class="icon-paperplane ml-2"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>



        <div id="modal_Add_Banner" class="modal" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">New Category</h5>
                        <button type="button" class="close" data-dismiss="modal">×</button>
                    </div>

                    <div class="modal-body">
                        <form method="POST" action="{{ route('ModuleMarketing/Banners/addNew') }}" id="add_banners"
                            autocomplete="off" enctype="multipart/form-data">

                            {{ csrf_field() }}

                            <div class="form-group">

                                <input required type="text" hidden id="Banner_Category_send" class="form-control"
                                    name="Banner_Category_send">
                                <input required type="text" hidden id="loction_type" class="form-control"
                                    name="loction_type">
                            </div>


                            <div class="row">
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <label>Banner Title</label>
                                        <input type="text" id="Banner_Title" class="form-control" name="Banner_Title">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group ">
                                        <label>Color Title Text</label>
                                        <input type="color" id="Banner_Title_color" class="form-control"
                                            name="Banner_Title_color">
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <label>Banner Text</label>
                                        <input type="text" id="Banner_Text" class="form-control" name="Banner_Text">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group ">
                                        <label>Color Text Text</label>
                                        <input type="color" id="Banner_Text_color" class="form-control"
                                            name="Banner_Text_color">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Button Link</label>
                                        <input type="url" id="button_url" class="form-control" name="button_url">
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label>Button Text</label>
                                        <input type="text" id="button_text" class="form-control" name="button_text">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group ">
                                        <label>Button Color Text</label>
                                        <input type="color" id="button_text_color" class="form-control"
                                            name="button_text_color">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group ">
                                        <label>Button Color</label>
                                        <input type="color" id="button_color" class="form-control" name="button_color">
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label>Banner Image</label>
                                <input required type="file" id="Banner_Image" class="form-control" name="Banner_Image">
                            </div>

                            {{-- <div class="form-group">
                            <label>Banner URL</label>
                            <input type="url" id="url" class="form-control" name="url">
                        </div> --}}

                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Add Category<i
                                        class="icon-paperplane ml-2"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div id="modal_edit_Banner" class="modal" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Category</h5>
                        <button type="button" class="close" data-dismiss="modal">×</button>
                    </div>

                    <div class="modal-body">
                        <form method="POST" action="{{ route('ModuleMarketing/Banners/editBanner') }}" id="edit_banners"
                            autocomplete="off" enctype="multipart/form-data">

                            {{ csrf_field() }}

                            <div class="form-group">

                                <input required type="text" hidden id="Banner_edit_Category_send" class="form-control"
                                    name="Banner_edit_Category_send">
                                <input required type="text" hidden id="bannerId_edit" class="form-control"
                                    name="bannerId_edit">
                                <input required type="text" hidden id="loction_type" class="form-control"
                                    name="loction_type">
                            </div>


                            <div class="row">
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <label>Banner Title</label>
                                        <input type="text" id="Banner_edit_Title" class="form-control"
                                            name="Banner_edit_Title">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group ">
                                        <label>Color Title Text</label>
                                        <input type="color" id="Banner_edit_Title_color" class="form-control"
                                            name="Banner_edit_Title_color">
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <label>Banner Text</label>
                                        <input type="text" id="Banner_edit_Text" class="form-control"
                                            name="Banner_edit_Text">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group ">
                                        <label>Color Text Text</label>
                                        <input type="color" id="Banner_Text_color" class="form-control"
                                            name="Banner_Text_color">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Button Link</label>
                                        <input type="url" id="Banner_edit_button_url" class="form-control"
                                            name="Banner_edit_button_url">
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label>Button Text</label>
                                        <input type="text" id="Banner_edit_button_text" class="form-control"
                                            name="Banner_edit_button_text">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group ">
                                        <label>Button Color Text</label>
                                        <input type="color" id="Banner_edit_button_text_color" class="form-control"
                                            name="Banner_edit_button_text_color">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group ">
                                        <label>Button Color</label>
                                        <input type="color" id="Banner_edit_button_color" class="form-control"
                                            name="Banner_edit_button_color">
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label>Banner Image</label>
                                <input type="file" id="Banner_edit_Image" class="form-control" name="Banner_edit_Image">
                            </div>

                            {{-- <div class="form-group">
                            <label>Banner URL</label>
                            <input type="url" id="Banner_edit_url" class="form-control" name="Banner_edit_url">
                        </div> --}}

                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Add Category<i
                                        class="icon-paperplane ml-2"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <script>
            var BannerListCach = [];

            $('.PageLocation').empty().append('Marketing - Web Pages');
            $('.addBanner').hide();
            var table1 = $('.table1').DataTable({
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

            var table2 = $('.table2').DataTable({
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

            var table3 = $('.table3').DataTable({
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

            $("#Add_Category_form").validate({
                rules: {
                    banner_cat_name: {
                        minlength: 5,
                        maxlength: 100
                    },
                },
                submitHandler: function(form) {
                    $.alert({
                        title: 'Are you sure!',
                        content: 'Do you really want to create this Category?',
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

            $("#add_banners").validate({
                rules: {
                    Banner_Category_send: {
                        maxlength: 100
                    },
                    Banner_Title: {
                        minlength: 5,
                        maxlength: 100
                    },
                    Banner_Text: {
                        minlength: 5,
                        maxlength: 400
                    },
                    Banner_Image: {
                        accept: "jpg,png,jpeg"
                    }
                },
                messages: {
                    Banner_Category_send: {
                        accept: "Something's Wrong"
                    },
                    Banner_Image: {
                        accept: "Only image type jpg/png/jpeg/gif is allowed"
                    }

                },
                submitHandler: function(form) {
                    $.alert({
                        title: 'Are you sure!',
                        content: 'Do you really want to create this banner?',
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


            $("#edit_banners").validate({
                rules: {
                    Banner_Category_send: {
                        maxlength: 100
                    },
                    Banner_Title: {
                        minlength: 5,
                        maxlength: 100
                    },
                    Banner_Text: {
                        minlength: 5,
                        maxlength: 400
                    },
                    Banner_Image: {
                        accept: "jpg,png,jpeg"
                    }
                },
                messages: {
                    Banner_Category_send: {
                        accept: "Something's Wrong"
                    },
                    Banner_Image: {
                        accept: "Only image type jpg/png/jpeg/gif is allowed"
                    }

                },
                submitHandler: function(form) {
                    $.alert({
                        title: 'Are you sure!',
                        content: 'Do you really want to update this banner?',
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

            $('.type1').click(function(e) {
                $('#loction_type').empty().val(1);
            });

            $('.type2').click(function(e) {
                $('#loction_type').empty().val(2);
            });

            $('#BannerCategories').change(function() {
                BannerListCach = [];
                $('.addBanner').hide();
                $cat_id = this.value;
                if ($cat_id == 4) {
                    $('.button2').empty().append('Add "Offer" Banners');
                } else {
                    $('.button2').empty().append('Add " We Offer" Banners');
                }

                $('#page_id_meta').empty().val($cat_id);

                $.ajax({
                    url: '/ModuleMarketing/Banners/get_list',
                    data: {
                        Category: $cat_id
                    },
                    error: function() {

                    },
                    type: "GET",
                    contentType: "application/json",
                    success: function(data) {
                        // console.log(data['banner']);
                        BannerListCach = data;
                        table1.clear().draw();
                        table2.clear().draw();
                        table3.clear().draw();
                        $('.addBanner').show();
                        $('#Banner_Category_send').empty().val($cat_id);
                        if (data != 'no-data') {
                            for (var i = 0; i < data['banner'].length; i++) {
                                var status = "";
                                if (data['banner'][i].status == 1) {
                                    status = '<span class="badge bg-blue">Active</span>';
                                } else if (data['banner'][i].status == 0) {
                                    status = '<span class="badge bg-danger">Block</span>';
                                } else if (data['banner'][i].status == 2) {
                                    status = '<span class="badge bg-grey-400">Suspended</span>';
                                }
                                var actionHtml = '';
                                actionHtml +='<button class="btn bg-pink-400 rounded-round btn-icon btn-sm delete-partner" onclick="deleteBanner(' +data['banner'][i].id +');">Delete</button><button class="btn bg-green-400 rounded-round btn-icon btn-sm delete-partner" onclick="editBanner(' +data['banner'][i].id + ')">Edit</button>';
                                if (data['banner'][i].loaction_type == 1) {
                                    table1.row.add([
                                        data['banner'][i].id,
                                        '<img src="/storage/' + data['banner'][i].img + '" width ="85px"/>',
                                        status,
                                        actionHtml,
                                    ]).draw(false);
                                } else {
                                    table2.row.add([
                                        data['banner'][i].id,
                                        '<img src="/storage/' + data['banner'][i].img + '" width ="85px"/>',
                                        status,
                                        actionHtml,
                                    ]).draw(false);
                                }

                            }

                            data['meta'].forEach(element => {
                                table3.row.add([
                                    element.id,
                                    element.discription,
                                    element.tags,
                                    element.title,
                                    '<button class="btn bg-green-400 rounded-round btn-icon btn-sm delete-partner" onclick="editMeta(' + element.id + ',\''+element.discription+'\',\''+element.tags+'\',\''+element.title+'\','+element.location_cat+')">Edit</button><button class="btn bg-pink-400 rounded-round btn-icon btn-sm delete-partner" onclick="deleteMeta(' + element.id + ')">Delete</button>',
                                    ]).draw(false);
                            });
                        }

                    },
                });
            });

            function editMeta(id,discription,tags,title,locationId){
                $('#page_id_meta_edit').empty().val(locationId);
                $('#page_title_meta_edit').empty().val(title);
                $('#page_tag_meta_edit').empty().val(tags);
                $('#page_discription_meta_edit').empty().val(discription);
                $('#page_id_edit').empty().val(id);
                $('#modal_edit_meta').modal('show');
            }page_tag_meta

            
            function deleteMeta(id){
                $.ajax({
                    url: '/ModuleMarketing/meta/delete',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    type: "POST",
                    error: function() {
                        alert('Error');
                    },
                    success: function(data) {
                        alert('Bannner Deleted');
                        location.reload();
                    }
                });
            }

            


            function editBanner(id) {
                $('#modal_edit_Banner').modal('show');
                var editBannerData = [];
                for (var x = 0; x < BannerListCach.length; x++) {
                    if (BannerListCach[x].id == id) {
                        editBannerData = BannerListCach[x];
                        break;
                    }
                }
                console.log(editBannerData);

                // $('#Banner_edit_Category_send').empty().val(editBannerData.banner_cat_id);
                $('#bannerId_edit').empty().val(editBannerData.id);
                $('#Banner_edit_Title').empty().val(editBannerData.title);
                $('#Banner_edit_Title_color').empty().val(editBannerData.title_color);
                $('#Banner_edit_Text').empty().val(editBannerData.text);
                $('#Banner_Text_color').empty().val(editBannerData.text_color);
                $('#Banner_edit_button_url').empty().val(editBannerData.button_url);
                $('#Banner_edit_button_text').empty().val(editBannerData.button_text);
                $('#Banner_edit_button_text_color').empty().val(editBannerData.button_text_color);
                $('#Banner_edit_button_color').empty().val(editBannerData.button_color);
                $('#Banner_edit_url').empty().val(editBannerData.title);
            }


            function deleteBanner(id) {
                $.ajax({
                    url: '/ModuleMarketing/Banners/deleteBanner',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    type: "POST",
                    error: function() {
                        alert('Error');
                    },
                    success: function(data) {
                        alert('Bannner Deleted');
                        location.reload();
                    }
                });
            }
        </script>
        <style>
            .PageLocation {
                display: contents;
            }

        </style>
    @endsection
