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
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->

<link rel="stylesheet" href="{{url('admin')}}/css/bootstrap.min.css" >
<link rel="stylesheet" href="{{url('admin')}}/css/bootstrap-tagsinput.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{url('admin')}}/css/style.css" rel='stylesheet' type='text/css' />
<link href="{{url('admin')}}/css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{url('admin')}}/css/font.css" type="text/css"/>
<link href="{{url('admin')}}/css/font-awesome.css" rel="stylesheet"> 
<link rel="stylesheet" href="{{url('admin')}}/css/morris.css" type="text/css"/>
<!-- calendar -->
<link rel="stylesheet" href="{{url('admin')}}/css/monthly.css">
<link rel="stylesheet" href="//cdn.datatables.net/1.11.2/css/jquery.dataTables.min.css">

<!-- //calendar -->
<!-- //font-awesome icons -->
<script src="{{url('admin')}}/js/jquery2.0.3.min.js"></script>
<script src="{{url('admin')}}/js/raphael-min.js"></script>
<script src="{{url('admin')}}/js/morris.js"></script>

<script src="//cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>

<script src="{{url('admin')}}/js/bootstrap-tagsinput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>



@yield('js')
</head>
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
        <li>
            <input type="text" class="form-control search" placeholder=" Search">
        </li>
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="{{url('admin')}}/images/minhchien.jpg">
                <span class="username">
                <?php 
                        $name=Auth::user()->name;
                        if($name){
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
                    <a class="active" href="index.html">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Đơn hàng</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{url('/admin/manage_order')}}">Quản lí đơn hàng</a></li>
						<li><a href="glyphicon.html">Đơn hàng </a></li>
                        <li><a href="grids.html">Grids</a></li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-gift"></i>
                        <span>Mã giảm giá </span>
                    </a>
                    <ul class="sub">
						<li><a href="{{url('/admin/list_coupon')}}">Danh sách mã </a></li>
						<li><a href="{{url('/admin/insert_coupon')}}">Thêm mã giảm giá</a></li>
                        <li><a href="grids.html">Grids</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-gift"></i>
                        <span>Phí vận chuyển </span>
                    </a>
                    <ul class="sub">
						<li><a href="{{url('/admin/delivery')}}">Quản lí vận chuyển</a></li>
                    </ul>
                </li>
                
                
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-th"></i>
                        <span>Bảng dữ liệu</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{url('admin/list_customer')}}">Bảng khách hàng</a></li>
                        <li >
                            <a href="{{url('admin/list_product')}}"> Bảng sản phẩm </a>
                           
                           
                        </li>
                        <li><a href="{{url('admin/list_category')}}">Bảng thể loại</a></li>
                        <li><a href="{{url('admin/list_brand')}}">Bảng danh mục </a></li>
                        <li><a href="{{url('admin/list_blog')}}">Bảng bài viết </a></li>
                        <li><a href="responsive_table.html">Responsive Table</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-tasks"></i>
                        <span>Bình luận  </span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{url('/admin/comment')}}">Liệt kê bình luận </a></li>
                        
						
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-tasks"></i>
                        <span>Quản lí bài viết  </span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{url('/admin/list_category_blog')}}">Thể loại bài viết </a></li>
                        <li><a href="{{url('/admin/list_blog')}}">Danh sách bài viết  </a></li>
						
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="{{url('/admin/information')}}">
                        <i class="fa fa-tasks"></i>
                        <span>Thông tin website  </span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-tasks"></i>
                        <span>Quản lí Slider </span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{url('/admin/manage_slider')}}">Danh sách slider</a></li>
                        <li><a href="{{url('/admin/add_slider')}}">Thêm slider </a></li>
						
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-tasks"></i>
                        <span>Quản lí Video </span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{url('/admin/video')}}">Danh sách Video</a></li>
                        <li><a href="">Thêm slider </a></li>
						
                    </ul>
                </li>
                
                @hasrole(['admin','author'])
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-envelope"></i>
                        <span>Phân quyền  </span>
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

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class=" fa fa-bar-chart-o"></i>
                        <span>Charts</span>
                    </a>
                    <ul class="sub">
                        <li><a href="chartjs.html">Chart js</a></li>
                        <li><a href="flot_chart.html">Flot Charts</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class=" fa fa-bar-chart-o"></i>
                        <span>Maps</span>
                    </a>
                    <ul class="sub">
                        <li><a href="google_map.html">Google Map</a></li>
                        <li><a href="vector_map.html">Vector Map</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-glass"></i>
                        <span>Extra</span>
                    </a>
                    <ul class="sub">
                        <li><a href="gallery.html">Gallery</a></li>
						<li><a href="404.html">404 Error</a></li>
                        <li><a href="registration.html">Registration</a></li>
                    </ul>
                </li>
                <li>
                    <a href="login.html">
                        <i class="fa fa-user"></i>
                        <span>Login Page</span>
                    </a>
                </li>
            </ul>            </div>
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
			  <p>© Thiết kế bởi  <a href="">Minh Chiến </a></p>
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
    $(document).ready(function(){
        $('#brand_order').sortable({
            placeholder:'ui-state-highlight',
            update:function(event,ui){
                var page_id_array=new Array();
               
                $('#brand_order tr').each(function(){
                    page_id_array.push($(this).attr('id'));
                });
                $.ajax({
                    url:'{{url('/arrange_brand')}}',
                    method:'POST',
                    headers:{
                    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    },
                    data:{page_id_array:page_id_array},
                    success:function(data){
                        alert(data);
                    }
                })

            }
        });
    });
</script>

<script>
   $('.comment_access_btn').click(function(){
        var comment_status=$(this).data('comment_status');
        var comment_id=$(this).data('comment_id');
        var comment_product_id=$(this).attr('id');
        if(comment_status==0){
            var alert='Duyệt thành công';
        }else{
            var alert='Bỏ duyệt bình luận';
        }
        $.ajax({
            url:'{{url('/admin/allow_comment')}}',
            method:'POST',
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            },
            data:{comment_status:comment_status,comment_id:comment_id,comment_product_id:comment_product_id},
            success:function(data){
                location.reload();
              $('#notify_comment').html('<span class="text text-alert">'+alert+'</span>');
             
            }
        });
        

   });
   $('.btn-reply-comment').click(function(){
        var comment_id=$(this).data('comment_id');

        var comment=$('.reply_comment_'+comment_id).val();
        
        var comment_product_id=$(this).data('product_id');
      
        
        $.ajax({
            url:'{{url('/admin/reply_comment')}}',
            method:'POST',
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            },
            data:{comment:comment,comment_id:comment_id,comment_product_id:comment_product_id},
            success:function(data){
                location.reload();
              $('.reply_comment_'+comment_id).val('');
              $('#notify_comment').html('<span class="text text-alert">Trả lời bình luận thành công </span>');
              
             
            }
        });
        

   });
</script>

<script>
       function ChangeToSlug()
        {
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
    $('.update_quantity_order').click(function(){
      
       var order_product_id=$(this).data('product_id');
       var order_qty=$('.order_qty_'+order_product_id).val();
       var order_code=$('.order_code').val();
       var _token=$('input[name="_token"]').val();

       $.ajax({
            url:'{{url('/admin/update_quantity')}}',
            method:'POST',
            data:{_token:_token,order_product_id:order_product_id,order_qty:order_qty,order_code:order_code},
            success:function(data){
               alert('Thay đổi tình trạng thành công ');
               location.reload();
            }
        });
      
    });
</script>
<script>
    $('.order_details').change(function(){
        var order_status=$(this).val();
        var order_id=$(this).children(":selected").attr('id');
        var _token=$('input[name="_token"]').val();

        quantity=[];
        $("input[name='product_sale_quantity']").each(function(){
            quantity.push($(this).val());

        });

       
        order_product_id=[];
        $("input[name='order_product_id']").each(function(){
            order_product_id.push($(this).val());

        });
        j=0;
        for(i=0;i<order_product_id.length;i++){
           var order_qty=$('.order_qty_'+order_product_id[i]).val();
           var order_qty_storage=$('.order_qty_storage_'+order_product_id[i]).val();
           if(parseInt(order_qty)>parseInt(order_qty_storage)){
               j=j+1;
                if(j==1){
                    alert('Số lượng trong kho hàng không đủ');
                }
               $('.color_qty_'+order_product_id[i]).css('background','#000');
            
           }
        }
        if(j==0){
           
            $.ajax({
                url:'{{url('/admin/update_order_quantity')}}',
                method:'POST',
                data:{_token:_token,order_status:order_status,order_id:order_id,quantity:quantity,order_product_id:order_product_id},
                success:function(data){
                alert('Cập nhật số lượng thành công ');
                location.reload();
                }
            });

        }
       

     

    })
</script>
<script>
        $(document).ready(function(){

            fetch_delivery();

            function fetch_delivery(){
                var _token=$('input[name="_token"]').val();
                $.ajax({
                    url:'{{url('/admin/money_delivery')}}',
                    method:'POST',
                    data:{_token:_token},
                    success:function(data){
                        $('#load_delivery').html(data);
                    }
                });
            }
            $(document).on('blur','.mship_edit',function(){
               
                var mship_id=$(this).data('mship_id');
                var mship_value=$(this).text();
                var _token=$('input[name="_token"]').val();
               
               
                $.ajax({
                    url:'{{url('/admin/update_delivery')}}',
                    method:'POST',
                    data:{mship_id:mship_id,mship_value:mship_value,_token:_token},
                    success:function(data){
                        fetch_delivery();
                    }
                });
            })
            $('.add_delivery').click(function(){
                var city=$('.city').val();
                var province=$('.province').val();
                var wards=$('.wards').val();
                var money_ship=$('.money_ship').val();
                var _token=$('input[name="_token"]').val();
              
                $.ajax({
                    url:'{{url('/admin/insert_delivery')}}',
                    method:'POST',
                    data:{city:city,province:province,_token:_token,wards:wards,money_ship:money_ship},
                    success:function(data){
                        fetch_delivery();
                    }
                });
               
            });
            $('.choose').on('change',function(){
              
                var action=$(this).attr('id');
                var ma_id=$(this).val();
                var _token=$('input[name="_token"]').val();
                var result="";
               
                
                if(action=='city'){
                    result='province';
                    
                }else{
                    result='wards';
                }
                $.ajax({
                    url:'{{url('/admin/select_delivery')}}',
                    method:'POST',
                    data:{action:action,ma_id:ma_id,_token:_token},
                    success:function(data){
                        $('#'+result).html(data);
                    }
                });
            });
        })
</script>

<script src="{{url('admin')}}/js/bootstrap.js"></script>
<script src="{{url('admin')}}/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="{{url('admin')}}/js/scripts.js"></script>
<script src="{{url('admin')}}/js/jquery.slimscroll.js"></script>
<script src="{{url('admin')}}/js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="{{url('admin')}}/js/jquery.scrollTo.js"></script>
<script src="{{url('ckeditor')}}/ckeditor.js"></script>
<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>

<script>
    $(document).ready(function(){
        load_video();
        function load_video(){
            $.ajax({
            url:'{{url('/admin/select_video')}}',
            method:"POST",
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            },
            success:function(data){
              
                    $('#video_load').html(data);
                }       
            });
        }
        $(document).on('click','.btn_add_video',function(){
            var video_title=$('.video_title').val();
            var video_slug=$('.video_slug').val();
            var video_desc=$('.video_desc').val();
            var video_link=$('.video_link').val();
        

            var form_data=new FormData();

            form_data.append("file",document.getElementById('file_img_video').files[0]);
            form_data.append("video_title",video_title);
            form_data.append("video_slug",video_slug);
            form_data.append("video_desc",video_desc);
            form_data.append("video_link",video_link);
         
          
                $.ajax({
                    url:'{{url('/admin/create_video')}}',
                    method:"POST",
                    headers:{
                        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    },
                    data:form_data,
                    contentType:false,
                    cache:false,
                    processData:false,
                    success:function(data){
                        load_video();
                        $('#notify').html('<span class="text text-success">Thêm video thành công</span>');
                    }
                });
        });
        $(document).on('blur','.video_edit',function(){
            var video_type=$(this).data('video_type');
            var video_id=$(this).data('video_id');
          
          
            if(video_type=='video_title'){
                var video_edit=$('#'+video_type+'_'+video_id).text();
            
                var video_check=video_type;
               
            }else if(video_type=='video_desc'){
                var video_edit=$('#'+video_type+'_'+video_id).text();
             
                var video_check=video_type;
            }else if(video_type=='video_link'){
                var video_edit=$('#'+video_type+'_'+video_id).text();
             
                var video_check=video_type;
            }else{
                var video_edit=$('#'+video_type+'_'+video_id).text();
             
                var video_check=video_type;
            }
            
            $.ajax({
                url:'{{url('/admin/update_video')}}',
                method:"POST",
                headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            },
                data:{video_check:video_check,video_id:video_id,video_edit:video_edit},
                success:function(data){
                    load_video();
                   alert('Cập nhật thành công ');
                }
            });
         
        });
        $(document).on('change','.file_img_video',function(){
           var video_id=$(this).data('video_id');
           var image=document.getElementById('file-video-'+video_id).files[0];
           
           var form_data=new FormData();
           form_data.append("file",document.getElementById('file-video-'+video_id).files[0]);
           form_data.append("video_id",video_id);

            $.ajax({
                url:'{{url('/admin/update_video_image')}}',
                method:"POST",
                headers:{
                    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                },
                data:form_data,
                contentType:false,
                cache:false,
                processData:false,
                success:function(data){
                    load_video();
                    $('#notify').html('<span class="text-danger">Cập nhật ảnh thành công</span>');
                }
            });
              
        });
        $(document).on('click','.btn_delete_video',function(){
        var video_id=$(this).data('video_id');
        if(confirm('Bạn có muốn xoá video không ?')){
            $.ajax({
                url:'{{url('/admin/delete_video')}}',
                method:"POST",
                headers:{
                    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                },
                data:{video_id:video_id},
                success:function(data){
                    load_video();
                   $('#notify').html('<span class="text-success">Xoá video thành công</span>');
                }
            });
        }
       
    });



    });
  
    
         
   

</script>
<script>
    $(document).ready(function(){
        load_gallery();
        function load_gallery(){
            var pro_id=$('.pro_id').val();
            var _token=$('input[name="_token"]').val();
            
            $.ajax({
                url:'{{url('/admin/select_gallery')}}',
                method:"POST",
                data:{pro_id:pro_id,_token:_token},
                success:function(data){
                   $('#gallery_load').html(data);
                }
            });
        }

        $("#file").change(function(){
            var erorr='';
            var files=$('#file')[0].files;
            if(files.length>5){
                erorr+='<p>Chọn tối đa 5 ảnh </p>';
            }else if(files.length==''){
                erorr+='<p>Không được bỏ trống file ảnh </p>';
            }else if(files.size>2000000){
                erorr+='<p>File ảnh không được lớn hơn 2MB</p>';
            }
            if(erorr==''){
                
            }else{
                $('#file').val('');
                $('#error_gallery').html('<span class="text-danger">'+erorr+'</span>');
                return false;
            }

        });
        $(document).on('blur','.edit_gallery_name',function(){
           var gal_id=$(this).data('gal_id');
           var gal_text=$(this).text();
           var _token=$('input[name="_token"]').val();
        
              
           $.ajax({
                url:'{{url('/admin/update_gallery')}}',
                method:"POST",
                data:{gal_id:gal_id,_token:_token,gal_text:gal_text},
                success:function(data){
                    load_gallery();
                    $('#error_gallery').html('<span class="text-danger">Cập nhật tên thành công</span>');
                }
            });
        });
        $(document).on('click','.delete_gallery',function(){
           var gal_id=$(this).data('gal_id');
           var _token=$('input[name="_token"]').val();
         
           if(confirm('Bạn có muốn xoá không ? ')){
                $.ajax({
                    url:'{{url('/admin/delete_gallery')}}',
                    method:"POST",
                    data:{gal_id:gal_id,_token:_token},
                    success:function(data){
                        load_gallery();
                        $('#error_gallery').html('<span class="text-danger">Xoá thành công</span>');
                    }
                });
           }    
             
              
          
        });

        $(document).on('change','.file_image',function(){
           var gal_id=$(this).data('gal_id');
           var image=document.getElementById('file-'+gal_id).files[0];
           
           var form_data=new FormData();
           form_data.append("file",document.getElementById('file-'+gal_id).files[0]);
           form_data.append("gal_id",gal_id);

                $.ajax({
                    url:'{{url('/admin/update_gallery_image')}}',
                    method:"POST",
                    headers:{
                        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    },
                    data:form_data,
                    contentType:false,
                    cache:false,
                    processData:false,
                    success:function(data){
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
<!-- morris JavaScript -->	
<script>
	$(document).ready(function() {
		//BOX BUTTON SHOW AND CLOSE
	   jQuery('.small-graph-box').hover(function() {
		  jQuery(this).find('.box-button').fadeIn('fast');
	   }, function() {
		  jQuery(this).find('.box-button').fadeOut('fast');
	   });
	   jQuery('.small-graph-box .box-close').click(function() {
		  jQuery(this).closest('.small-graph-box').fadeOut(200);
		  return false;
	   });
	   
	    //CHARTS
	    function gd(year, day, month) {
			return new Date(year, month - 1, day).getTime();
		}
		
		graphArea2 = Morris.Area({
			element: 'hero-area',
			padding: 10,
        behaveLikeLine: true,
        gridEnabled: false,
        gridLineColor: '#dddddd',
        axes: true,
        resize: true,
        smooth:true,
        pointSize: 0,
        lineWidth: 0,
        fillOpacity:0.85,
			data: [
				{period: '2015 Q1', iphone: 2668, ipad: null, itouch: 2649},
				{period: '2015 Q2', iphone: 15780, ipad: 13799, itouch: 12051},
				{period: '2015 Q3', iphone: 12920, ipad: 10975, itouch: 9910},
				{period: '2015 Q4', iphone: 8770, ipad: 6600, itouch: 6695},
				{period: '2016 Q1', iphone: 10820, ipad: 10924, itouch: 12300},
				{period: '2016 Q2', iphone: 9680, ipad: 9010, itouch: 7891},
				{period: '2016 Q3', iphone: 4830, ipad: 3805, itouch: 1598},
				{period: '2016 Q4', iphone: 15083, ipad: 8977, itouch: 5185},
				{period: '2017 Q1', iphone: 10697, ipad: 4470, itouch: 2038},
			
			],
			lineColors:['#eb6f6f','#926383','#eb6f6f'],
			xkey: 'period',
            redraw: true,
            ykeys: ['iphone', 'ipad', 'itouch'],
            labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
			pointSize: 2,
			hideHover: 'auto',
			resize: true
		});
		
	   
	});
	</script>
<!-- calendar -->
	<script type="text/javascript" src="{{url('admin')}}/js/monthly.js"></script>
	<script type="text/javascript">
		$(window).load( function() {

			$('#mycalendar').monthly({
				mode: 'event',
				
			});

			$('#mycalendar2').monthly({
				mode: 'picker',
				target: '#mytarget',
				setWidth: '250px',
				startHidden: true,
				showTrigger: '#mytarget',
				stylePast: true,
				disablePast: true
			});

		switch(window.location.protocol) {
		case 'http:':
		case 'https:':
		// running on a server, should be good.
		break;
		case 'file:':
		alert('Just a heads-up, events will not work when run locally.');
		}

		});
	</script>
    <script type="text/javascript">
        $('.btndelete').click(function(ev){
            ev.preventDefault();
            var _href =$(this).attr('href');
            $('form#form-delete').attr('action',_href);

            if(confirm('Bạn có chắc không ? ')){
                $('form#form-delete').submit();
            }

        })
    </script>
   
	<!-- //calendar -->
</body>
</html>