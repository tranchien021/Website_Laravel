<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>

<head>
    <title>Trang Admin </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Trang quản lí tất cả các thông tin" />
    <meta name="csrf-token" content="{{csrf_token()}}">
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- bootstrap-css -->

    <link rel="stylesheet" href="{{url('admin')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{url('admin')}}/css/bootstrap-tagsinput.css">
    <!-- //bootstrap-css -->
    <!-- Custom CSS -->
    <link href="{{url('admin')}}/css/style.css" rel='stylesheet' type='text/css' />
    <link href="{{url('admin')}}/css/style-responsive.css" rel="stylesheet" />
    <!-- font CSS -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="{{url('admin')}}/css/font.css" type="text/css" />
    <link href="{{url('admin')}}/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="{{url('admin')}}/css/morris.css" type="text/css" />
    <!-- calendar -->
    <link rel="stylesheet" href="{{url('admin')}}/css/monthly.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.2/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <link rel="icon" type="image/gif" href="{{asset('uploads/icon/laravel.png')}}" sizes="50x50" />

    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

   


    <script src="{{url('admin')}}/js/jquery2.0.3.min.js"></script>
    <script src="{{url('admin')}}/js/raphael-min.js"></script>
    <script src="{{url('admin')}}/js/morris.js"></script>

    <script src="//cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>

    <script src="{{url('admin')}}/js/bootstrap-tagsinput.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

    <script src="{{url('admin')}}/js/bootstrap.js"></script>
    <script src="{{url('admin')}}/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="{{url('admin')}}/js/scripts.js"></script>
    <script src="{{url('admin')}}/js/jquery.slimscroll.js"></script>
    <script src="{{url('admin')}}/js/jquery.nicescroll.js"></script>

    <script src="{{url('admin')}}/js/jquery.scrollTo.js"></script>
    <script src="{{url('ckeditor')}}/ckeditor.js"></script>

    <!-- Format auto_number -->
    <script src="{{url('admin')}}/js/simple.money.format.js"></script>

   

    @yield('js')
   

</head>
<style>
    html,
    body {

        background: none;


    }

    .header {
        background-color: #def;
        background-image: radial-gradient(closest-side, transparent 98%, rgba(0, 0, 0, .3) 99%), radial-gradient(closest-side, transparent 98%, rgba(0, 0, 0, .3) 99%);
        background-size: 80px 80px;
        background-position: 0 0, 40px 40px;
    }

    .brand {
        background: linear-gradient(135deg, #ECEDDC 25%, transparent 25%) -50px 0, linear-gradient(225deg, #ECEDDC 25%, transparent 25%) -50px 0, linear-gradient(315deg, #ECEDDC 25%, transparent 25%), linear-gradient(45deg, #ECEDDC 25%, transparent 25%);
        background-size: 100px 100px;
        background-color: #EC173A;

    }

    .footer {
        background: linear-gradient(135deg, #708090 22px, #d9ecff 22px, #d9ecff 24px, transparent 24px, transparent 67px, #d9ecff 67px, #d9ecff 69px, transparent 69px), linear-gradient(225deg, #708090 22px, #d9ecff 22px, #d9ecff 24px, transparent 24px, transparent 67px, #d9ecff 67px, #d9ecff 69px, transparent 69px)0 64px;
        background-color: #708090;
        background-size: 64px 128px
    }
</style>


<body>
    <section id="container">
        <!--header start-->
        <header class="header fixed-top clearfix">
            <!--logo start-->
            <div class="brand">
                <a href="{{url('/admin/index')}}" class="logo">
                    Admin
                </a>
                <div class="sidebar-toggle-box">
                    <div class="fa fa-bars"></div>
                </div>
            </div>
            <!--logo end-->

            <div class="top-nav clearfix">
                <!--search & user info start-->
                <ul class="nav pull-right top-menu">

                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <img alt="" src="{{url('admin')}}/images/chien.jpg">
                            <span class="username">
                                <?php
                                if (Session::get('login_normal')) {
                                    $name = Session::get('Account_Name');
                                } else {
                                    $name = Auth::user()->name;
                                }
                                if ($name) {
                                    echo $name;
                                } 


                                ?>
                            </span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <li><a href="#"><i class=" fa fa-suitcase"></i>Tài khoản</a></li>
                            <li><a href="#"><i class="fa fa-cog"></i> Cài đặt</a></li>
                            <li><a href="{{url('/admin/logout_auth')}}"><i class="fa fa-key"></i>Đăng Xuất </a></li>
                            @impersonate
                            <li><a href="{{url('/admin/change_login_destroy')}}"><i class="fa fa-stop-circle"></i>Dừng chuyển quyền </a></li>
                            @endimpersonate
                        </ul>
                    </li>
                    <!-- user login dropdown end -->

                </ul>
                <!--search & user info end-->
            </div>
        </header>
        <!--header end-->
        <!--sidebar start-->
        <aside>
            <div id="sidebar" class="nav-collapse">
                <!-- sidebar menu start-->
                <div class="leftside-navigation">
                    <ul class="sidebar-menu" id="nav-accordion">
                        <li>
                            <a class="active" href="{{url('/admin/index')}}">
                                <i class="fa fa-dashboard"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sub-menu">
                            <a href="{{url('/admin/manage_order')}}">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Đơn hàng</span>
                            </a>

                        </li>

                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-gift"></i>
                                <span>Mã giảm giá </span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{url('/admin/list_coupon')}}">Danh sách mã </a></li>
                                <li><a href="{{url('/admin/insert_coupon')}}">Thêm mã giảm giá</a></li>

                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="{{url('/admin/delivery')}}">
                                <i class="fa fa-truck"></i>
                                <span>Phí vận chuyển </span>
                            </a>

                        </li>


                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-th"></i>
                                <span>Bảng dữ liệu</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{url('admin/list_customer')}}">Bảng khách hàng</a></li>
                                <li>
                                    <a href="{{url('admin/list_product')}}"> Bảng sản phẩm </a>
                                </li>
                                <li><a href="{{url('admin/list_category')}}">Bảng thể loại</a></li>
                                <li><a href="{{url('admin/list_brand')}}">Bảng danh mục </a></li>
                                <li><a href="{{url('admin/list_blog')}}">Bảng bài viết </a></li>

                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="{{url('/admin/comment')}}">
                                <i class="fa fa-tasks"></i>
                                <span> Bình luận </span>
                            </a>

                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>Quản lí bài viết </span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{url('/admin/list_category_blog')}}">Thể loại bài viết </a></li>
                                <li><a href="{{url('/admin/list_blog')}}">Danh sách bài viết </a></li>

                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="{{url('/admin/edit_contact')}}">
                                <i class="fa fa-globe"></i>
                                <span>Thông tin website </span>
                            </a>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-sliders"></i>
                                <span>Quản lí Slider </span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{url('/admin/manage_slider')}}">Danh sách slider</a></li>
                                <li><a href="{{url('/admin/add_slider')}}">Thêm slider </a></li>

                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="{{url('/admin/video')}}">
                                <i class="fa fa-video-camera"></i>
                                <span>Quản lí Video </span>
                            </a>

                        </li>

                        @hasrole(['admin','author'])
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-key"></i>
                                <span>Phân quyền </span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{url('/admin/user_auth')}}"> Danh sách tài khoản admin </a></li>
                                <li><a href="{{url('/admin/create_user_auth')}}"> Tạo tài khoản admin </a></li>

                            </ul>

                        </li>
                        @endhasrole

                        @impersonate


                        <li class="sub-menu">
                            <a href="{{url('/admin/change_login_destroy')}}">
                                <i class="fa fa-stop-circle"></i>
                                <span> Dừng chuyển quyền</span>
                            </a>


                        </li>
                        @endimpersonate

                       
                    </ul>
                </div>
                <!-- sidebar menu end-->
            </div>
        </aside>

        <section id="main-content">
            <section class="wrapper">

                @yield('content')

                </div>
            </section>


            <!-- footer -->
            <div class="footer">
                <div class="wthree-copyright">
                    <p>© Thiết kế bởi <a href="">Minh Chiến </a></p>
                </div>
            </div>
            <!-- / footer -->
        </section>
        <!--sidebar end-->
        <!--main content start-->


        <!-- footer -->

        <!--main content end-->
    </section>

    <script>
        $('.btn_delete_document').click(function() {
            var product_id = $(this).data('document_id');
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{url('admin/delete_document')}}",
                method: 'POST',

                data: {
                    product_id: product_id,
                    _token: _token
                },
                success: function(data) {
                    alert(data);
                    location.reload();
                }
            })



        });
    </script>


    <script>
        $('.money').simpleMoneyFormat();
    </script>
    <script>
        $(function() {
            $('#datepicker').datepicker({
                prevText: "Tháng trước",
                nextText: "Tháng sau",
                dateFormat: "yy-mm-dd",
                dayNamesMin: ['Thứ 2', 'Thứ 3', 'Thứ 4', 'Thứ 5', 'Thứ 6', 'Thứ 7', 'Chủ Nhật'],
                duration: "slow"
            });
            $('#datepicker2').datepicker({
                prevText: "Tháng trước",
                nextText: "Tháng sau",
                dateFormat: "yy-mm-dd",
                dayNamesMin: ['Thứ 2', 'Thứ 3', 'Thứ 4', 'Thứ 5', 'Thứ 6', 'Thứ 7', 'Chủ Nhật'],
                duration: "slow"
            });
            $('#date_start').datepicker({
                prevText: "Tháng trước",
                nextText: "Tháng sau",
                dateFormat: "dd/mm/yy",
                dayNamesMin: ['Thứ 2', 'Thứ 3', 'Thứ 4', 'Thứ 5', 'Thứ 6', 'Thứ 7', 'Chủ Nhật'],
                duration: "slow"
            });
            $('#date_end').datepicker({
                prevText: "Tháng trước",
                nextText: "Tháng sau",
                dateFormat: "dd/mm/yy",
                dayNamesMin: ['Thứ 2', 'Thứ 3', 'Thứ 4', 'Thứ 5', 'Thứ 6', 'Thứ 7', 'Chủ Nhật'],
                duration: "slow"
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#brand_order').sortable({
                placeholder: 'ui-state-highlight',
                update: function(event, ui) {
                    var page_id_array = new Array();

                    $('#brand_order tr').each(function() {
                        page_id_array.push($(this).attr('id'));
                    });
                    $.ajax({
                        url: "{{url('/arrange_brand')}}",
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            page_id_array: page_id_array
                        },
                        success: function(data) {
                            alert(data);
                        }
                    })

                }
            });
        });
    </script>

    <script>
        $('.comment_access_btn').click(function() {
            var comment_status = $(this).data('comment_status');
            var comment_id = $(this).data('comment_id');
            var comment_product_id = $(this).attr('id');
            if (comment_status == 0) {
                var alert = 'Duyệt thành công';
            } else {
                var alert = 'Bỏ duyệt bình luận';
            }
            $.ajax({
                url: "{{url('/admin/allow_comment')}}",
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    comment_status: comment_status,
                    comment_id: comment_id,
                    comment_product_id: comment_product_id
                },
                success: function(data) {
                    location.reload();
                    $('#notify_comment').html('<span class="text text-alert">' + alert + '</span>');

                }
            });


        });
        $('.btn-reply-comment').click(function() {
            var comment_id = $(this).data('comment_id');

            var comment = $('.reply_comment_' + comment_id).val();

            var comment_product_id = $(this).data('product_id');


            $.ajax({
                url: "{{url('/admin/reply_comment')}}",
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    comment: comment,
                    comment_id: comment_id,
                    comment_product_id: comment_product_id
                },
                success: function(data) {
                    location.reload();
                    $('.reply_comment_' + comment_id).val('');
                    $('#notify_comment').html('<span class="text text-alert">Trả lời bình luận thành công </span>');


                }
            });


        });
    </script>

    <script>
        function ChangeToSlug() {
            var slug;

            //Lấy text từ thẻ input title 
            slug = document.getElementById("slug").value;
            slug = slug.toLowerCase();
            //Đổi ký tự có dấu thành không dấu
            slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
            slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
            slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
            slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
            slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
            slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
            slug = slug.replace(/đ/gi, 'd');
            //Xóa các ký tự đặt biệt
            slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
            //Đổi khoảng trắng thành ký tự gạch ngang
            slug = slug.replace(/ /gi, "-");
            //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
            //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
            slug = slug.replace(/\-\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-/gi, '-');
            slug = slug.replace(/\-\-/gi, '-');
            //Xóa các ký tự gạch ngang ở đầu và cuối
            slug = '@' + slug + '@';
            slug = slug.replace(/\@\-|\-\@|\@/gi, '');
            //In slug ra textbox có id “slug”
            document.getElementById('convert_slug').value = slug;
        }
    </script>
    <script>
        $('.update_quantity_order').click(function() {

            var order_product_id = $(this).data('product_id');
            var order_qty = $('.order_qty_' + order_product_id).val();
            var order_code = $('.order_code').val();
            var _token = $('input[name="_token"]').val();

            $.ajax({
                url: "{{url('/admin/update_quantity')}}",
                method: 'POST',
                data: {
                    _token: _token,
                    order_product_id: order_product_id,
                    order_qty: order_qty,
                    order_code: order_code
                },
                success: function(data) {
                    alert('Thay đổi tình trạng thành công ');
                    location.reload();
                }
            });

        });
    </script>
    <script>
        $('.order_details').change(function() {
            var order_status = $(this).val();
            var order_id = $(this).children(":selected").attr('id');
            var _token = $('input[name="_token"]').val();

            quantity = [];
            $("input[name='product_sale_quantity']").each(function() {
                quantity.push($(this).val());

            });


            order_product_id = [];
            $("input[name='order_product_id']").each(function() {
                order_product_id.push($(this).val());

            });
            j = 0;
            for (i = 0; i < order_product_id.length; i++) {
                var order_qty = $('.order_qty_' + order_product_id[i]).val();
                var order_qty_storage = $('.order_qty_storage_' + order_product_id[i]).val();
                if (parseInt(order_qty) > parseInt(order_qty_storage)) {
                    j = j + 1;
                    if (j == 1) {
                        alert('Số lượng trong kho hàng không đủ');
                    }
                    $('.color_qty_' + order_product_id[i]).css('background', '#000');

                }
            }
            if (j == 0) {

                $.ajax({
                    url: "{{url('/admin/update_order_quantity')}}",
                    method: 'POST',
                    data: {
                        _token: _token,
                        order_status: order_status,
                        order_id: order_id,
                        quantity: quantity,
                        order_product_id: order_product_id
                    },
                    success: function(data) {
                        alert('Cập nhật số lượng thành công ');
                        location.reload();
                    }
                });

            }




        })
    </script>
    <script>
        $(document).ready(function() {

            fetch_delivery();

            function fetch_delivery() {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{url('/admin/money_delivery')}}",
                    method: 'POST',
                    data: {
                        _token: _token
                    },
                    success: function(data) {
                        $('#load_delivery').html(data);
                    }
                });
            }
            $(document).on('blur', '.mship_edit', function() {

                var mship_id = $(this).data('mship_id');
                var mship_value = $(this).text();
                var _token = $('input[name="_token"]').val();


                $.ajax({
                    url: "{{url('/admin/update_delivery')}}",
                    method: 'POST',
                    data: {
                        mship_id: mship_id,
                        mship_value: mship_value,
                        _token: _token
                    },
                    success: function(data) {
                        fetch_delivery();
                    }
                });
            })
            $('.add_delivery').click(function() {
                var city = $('.city').val();
                var province = $('.province').val();
                var wards = $('.wards').val();
                var money_ship = $('.money_ship').val();
                var _token = $('input[name="_token"]').val();

                $.ajax({
                    url: "{{url('/admin/insert_delivery')}}",
                    method: 'POST',
                    data: {
                        city: city,
                        province: province,
                        _token: _token,
                        wards: wards,
                        money_ship: money_ship
                    },
                    success: function(data) {
                        fetch_delivery();
                    }
                });

            });
            $('.choose').on('change', function() {

                var action = $(this).attr('id');
                var ma_id = $(this).val();
                var _token = $('input[name="_token"]').val();
                var result = "";


                if (action == 'city') {
                    result = 'province';

                } else {
                    result = 'wards';
                }
                $.ajax({
                    url: "{{url('/admin/select_delivery')}}",
                    method: 'POST',
                    data: {
                        action: action,
                        ma_id: ma_id,
                        _token: _token
                    },
                    success: function(data) {
                        $('#' + result).html(data);
                    }
                });
            });
        })
    </script>



    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

    <script>
        $(document).ready(function() {
            load_video();

            function load_video() {
                $.ajax({
                    url: "{{url('/admin/select_video')}}",
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {

                        $('#video_load').html(data);
                    }
                });
            }
            $(document).on('click', '.btn_add_video', function() {
                var video_title = $('.video_title').val();
                var video_slug = $('.video_slug').val();
                var video_desc = $('.video_desc').val();
                var video_link = $('.video_link').val();


                var form_data = new FormData();

                form_data.append("file", document.getElementById('file_img_video').files[0]);
                form_data.append("video_title", video_title);
                form_data.append("video_slug", video_slug);
                form_data.append("video_desc", video_desc);
                form_data.append("video_link", video_link);


                $.ajax({
                    url: "{{url('/admin/create_video')}}",
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: form_data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        load_video();
                        $('#notify').html('<span class="text text-success">Thêm video thành công</span>');
                    }
                });
            });
            $(document).on('blur', '.video_edit', function() {
                var video_type = $(this).data('video_type');
                var video_id = $(this).data('video_id');


                if (video_type == 'video_title') {
                    var video_edit = $('#' + video_type + '_' + video_id).text();

                    var video_check = video_type;

                } else if (video_type == 'video_desc') {
                    var video_edit = $('#' + video_type + '_' + video_id).text();

                    var video_check = video_type;
                } else if (video_type == 'video_link') {
                    var video_edit = $('#' + video_type + '_' + video_id).text();

                    var video_check = video_type;
                } else {
                    var video_edit = $('#' + video_type + '_' + video_id).text();

                    var video_check = video_type;
                }

                $.ajax({
                    url: "{{url('/admin/update_video')}}",
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        video_check: video_check,
                        video_id: video_id,
                        video_edit: video_edit
                    },
                    success: function(data) {
                        load_video();
                        alert('Cập nhật thành công ');
                    }
                });

            });
            $(document).on('change', '.file_img_video', function() {
                var video_id = $(this).data('video_id');
                var image = document.getElementById('file-video-' + video_id).files[0];

                var form_data = new FormData();
                form_data.append("file", document.getElementById('file-video-' + video_id).files[0]);
                form_data.append("video_id", video_id);

                $.ajax({
                    url: "{{url('/admin/update_video_image')}}",
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: form_data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        load_video();
                        $('#notify').html('<span class="text-danger">Cập nhật ảnh thành công</span>');
                    }
                });

            });
            $(document).on('click', '.btn_delete_video', function() {
                var video_id = $(this).data('video_id');
                if (confirm('Bạn có muốn xoá video không ?')) {
                    $.ajax({
                        url: "{{url('/admin/delete_video')}}",
                        method: "POST",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            video_id: video_id
                        },
                        success: function(data) {
                            load_video();
                            $('#notify').html('<span class="text-success">Xoá video thành công</span>');
                        }
                    });
                }

            });



        });
    </script>
    <script>
        $(document).ready(function() {
            load_gallery();

            function load_gallery() {
                var pro_id = $('.pro_id').val();
                var _token = $('input[name="_token"]').val();

                $.ajax({
                    url: "{{url('/admin/select_gallery')}}",
                    method: "POST",
                    data: {
                        pro_id: pro_id,
                        _token: _token
                    },
                    success: function(data) {
                        $('#gallery_load').html(data);
                    }
                });
            }

            $("#file").change(function() {
                var erorr = '';
                var files = $('#file')[0].files;
                if (files.length > 5) {
                    erorr += '<p>Chọn tối đa 5 ảnh </p>';
                } else if (files.length == '') {
                    erorr += '<p>Không được bỏ trống file ảnh </p>';
                } else if (files.size > 2000000) {
                    erorr += '<p>File ảnh không được lớn hơn 2MB</p>';
                }
                if (erorr == '') {

                } else {
                    $('#file').val('');
                    $('#error_gallery').html('<span class="text-danger">' + erorr + '</span>');
                    return false;
                }

            });
            $(document).on('blur', '.edit_gallery_name', function() {
                var gal_id = $(this).data('gal_id');
                var gal_text = $(this).text();
                var _token = $('input[name="_token"]').val();


                $.ajax({
                    url: "{{url('/admin/update_gallery')}}",
                    method: "POST",
                    data: {
                        gal_id: gal_id,
                        _token: _token,
                        gal_text: gal_text
                    },
                    success: function(data) {
                        load_gallery();
                        $('#error_gallery').html('<span class="text-danger">Cập nhật tên thành công</span>');
                    }
                });
            });
            $(document).on('click', '.delete_gallery', function() {
                var gal_id = $(this).data('gal_id');
                var _token = $('input[name="_token"]').val();

                if (confirm('Bạn có muốn xoá không ? ')) {
                    $.ajax({
                        url: "{{url('/admin/delete_gallery')}}",
                        method: "POST",
                        data: {
                            gal_id: gal_id,
                            _token: _token
                        },
                        success: function(data) {
                            load_gallery();
                            $('#error_gallery').html('<span class="text-danger">Xoá thành công</span>');
                        }
                    });
                }



            });

            $(document).on('change', '.file_image', function() {
                var gal_id = $(this).data('gal_id');
                var image = document.getElementById('file-' + gal_id).files[0];

                var form_data = new FormData();
                form_data.append("file", document.getElementById('file-' + gal_id).files[0]);
                form_data.append("gal_id", gal_id);

                $.ajax({
                    url: "{{url('/admin/update_gallery_image')}}",
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: form_data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        load_gallery();
                        $('#error_gallery').html('<span class="text-danger">Cập nhật ảnh thành công</span>');
                    }
                });


            });
        });
    </script>

    <script>
        // Chỉ dùng cho textarea ko dùng cho input 
        CKEDITOR.replace('ckeditor_blog_content');
        CKEDITOR.replace('edit_blog_content');
        CKEDITOR.replace('ckeditor_product_content');
        CKEDITOR.replace('ckeditor_edit_product_content');
        CKEDITOR.replace('ckeditor_video_content');
        CKEDITOR.replace('ckeditor_infor_content');
    </script>



    <script type="text/javascript" src="{{url('admin')}}/js/monthly.js"></script>

    <script type="text/javascript">
        $('.btndelete').click(function(ev) {
            ev.preventDefault();
            var _href = $(this).attr('href');
            $('form#form-delete').attr('action', _href);

            if (confirm('Bạn có chắc không ? ')) {
                $('form#form-delete').submit();
            }

        })
    </script>
    <script>
        $(document).ready(function() {
            chart30daysorder();
            var chart = new Morris.Area({

                element: 'chart',
                lineColors: ['green', 'red', 'blue', 'white'],
                parseTime: false,
                hideHover: 'auto',
                xkey: 'period',
                ykeys: ['order', 'sales', 'profit', 'quantity'],
                labels: ['Đơn hàng', 'Doanh số', 'Lợi nhuận', 'Số lượng']

            });

            function chart30daysorder() {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{url('/admin/days_order')}}",
                    method: 'POST',
                    dataType: "JSON",

                    data: {
                        _token: _token
                    },
                    success: function(data) {
                        chart.setData(data);
                    }
                });

            }
            $('.dashboard-filter').change(function() {
                var dashboard_value = $(this).val();
                var _token = $('input[name="_token"]').val();

                $.ajax({
                    url: "{{url('/admin/dashboard_filter')}}",
                    method: 'POST',
                    dataType: "JSON",

                    data: {
                        _token: _token,
                        dashboard_value: dashboard_value
                    },
                    success: function(data) {
                        chart.setData(data);
                    }
                });
            });


            $('#btn-dashboard-filter').click(function() {
                var _token = $('input[name="_token"]').val();
                var from_date = $('#datepicker').val();
                var to_date = $('#datepicker2').val();
                $.ajax({
                    url: "{{url('/admin/filter_by_date')}}",
                    method: 'POST',
                    dataType: 'JSON',

                    data: {
                        _token: _token,
                        from_date: from_date,
                        to_date: to_date
                    },
                    success: function(data) {
                        chart.setData(data);
                    }
                })

            })
        });
    </script>
    <script>
        $(document).ready(function() {
            var colorDanger = "#FF1744";
            Morris.Donut({
                element: 'donut',
                resize: true,
                colors: [
                    '#E0F7FA',
                    '#B2EBF2',
                    '#80DEEA',
                    '#4DD0E1',
                    '#26C6DA',
                    '#00BCD4',
                    '#00ACC1',
                    '#0097A7',
                    '#00838F',
                    '#006064'
                ],

                data: [{
                        label: "Sản phẩm",
                        value: <?php echo $product_admin ?>,
                        color: colorDanger
                    },
                    {
                        label: "Bài viết",
                        value: <?php echo $blog_admin ?>
                    },
                    {
                        label: "Đơn hàng",
                        value: <?php echo $order_admin ?>
                    },
                    {
                        label: "Video",
                        value: <?php echo $video_admin ?>
                    },
                    {
                        label: "Khách Hàng",
                        value: <?php echo $customer_admin ?>
                    }
                ]
            });

        });
    </script>
    <script>
        list_icon();

        function delete_icon(id) {
            $.ajax({
                url: "{{url('admin/delete_icon')}}",
                method: 'GET',
                data: {
                    id: id
                },
                success: function(data) {
                    list_icon();
                    list_partner();
                }
            });
        }

        function list_icon() {
            $.ajax({
                url: "{{url('admin/list_icon')}}",
                method: 'GET',

                success: function(data) {
                    $('#list_icon').html(data);
                }
            });
        }
        $('.add_icon').click(function() {
            
            var name = $('#icon_name').val();
            var link = $('#icon_link').val();
            var image = $('#icon_image')[0].files[0];
          
           
           
            

            var form_data = new FormData();
            form_data.append('file', image);
            form_data.append('name', name);
            form_data.append('link', link);
            



            $.ajax({
                url: "{{url('admin/add_icon')}}",
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                contentType: false,
                cache: false,
                processData: false,
                data: form_data,

                success: function(data) {
                    alert('Thêm icon thành công ');
                    list_icon();
                }
            });

        });
    </script>

<script>
        list_partner();

       

        function list_partner() {
            $.ajax({
                url: "{{url('admin/list_partner')}}",
                method: 'GET',

                success: function(data) {
                    $('#list_partner').html(data);
                }
            });
        }
        $('.add_partner').click(function() {
            
            var name = $('#partner_name').val();
            var link = $('#partner_link').val();
            var image = $('#partner_image')[0].files[0];
          
           
           
            

            var form_data = new FormData();
            form_data.append('file', image);
            form_data.append('name', name);
            form_data.append('link', link);
            



            $.ajax({
                url: "{{url('admin/add_partner')}}",
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                contentType: false,
                cache: false,
                processData: false,
                data: form_data,

                success: function(data) {
                    alert('Thêm đối tác thành công ');
                    list_partner();
                    
                }
            });

        });
    </script>
    <script>
        function previewFile(input){
            var file=$('.image_preview').get(0).files[0];
           
            if(file){
                var render=new FileReader();
                render.onload=function(){
                    $('#preview_img').attr('src',render.result);
                }
                render.readAsDataURL(file);
            }

        }
    </script>
     <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}




</body>

</html>