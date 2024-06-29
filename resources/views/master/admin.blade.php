<!DOCTYPE html>
<html>

<head>
    <base href="/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">

    <link rel="stylesheet" href="assets/dist/css/skins/_all-skins.min.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- Linh google font -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="//cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">


    {{-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">  --}}

</head>

<style>
    body {
        font-family: 'Roboto', sans-serif;


    }

    .notification {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 1050;
        min-width: 350px;
        max-width: 400px;
        padding: 10px;
    }
</style>

<body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="{{ route('admin.index') }}" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>TLU</b></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Đại học Thủy Lợi</b></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->


            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>




                <!-- <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-solid fa-power-off"></i>
                <span class="hidden-xs">{{ auth()->user()->name }}</span>
              </a>
              <ul class="dropdown-menu">
                <li>
                  <div class="row">
                    <div class="text-center">
                      <a href="#">Log out</a>
                    </div>

                  </div>
                </li>

              </ul>
            </li>
          </ul>
        </div> -->

                <style>
                    .navbar-custom-menu .dropdown-menu {
                        display: none;
                        right: 0;
                        left: auto;
                        min-width: 100px;
                        padding: 0;
                        /* Loại bỏ padding */
                    }

                    .navbar-custom-menu .dropdown:hover .dropdown-menu {
                        display: block;
                    }

                    .navbar-custom-menu .dropdown-menu .user-footer {
                        padding: 0;
                        /* Loại bỏ padding */
                        margin: 0;
                        /* Loại bỏ margin */
                        text-align: center;
                        /* Căn giữa nội dung */
                    }

                    .navbar-custom-menu .dropdown-menu .user-footer .btn {
                        width: 100%;
                        /* Đặt nút "Logout" rộng 100% */
                        border-radius: 0;
                        /* Loại bỏ border-radius */
                    }
                </style>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-solid fa-power-off"></i>
                                <span class="hidden-xs">{{ auth()->user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="user-footer">

                                    <a href="{{ route('admin.logout') }}" class="btn btn-default btn-flat">Logout</a>

                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>



            </nav>
        </header>

        <!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">

                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="assets/dist/img/logo/logo-small.png" class="user-image" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>{{ auth()->user()->name }}</p>
                        <a href=""><i class="fa fa-circle text-success"></i>Online</a>
                    </div>
                </div>



                <ul class="sidebar-menu">
                    <li>
                        <a href="{{ route('scientist.index') }}">
                            <i class="fa fa-solid fa-id-card"></i> <span> Nhà Khoa Học</span>

                        </a>
                    </li>

                    <li>
                        <a href="{{ route('offer.index') }}">
                            <i class="fa fa-solid fa-clipboard-check"></i> <span> Quản lý đề xuất</span>

                        </a>
                    </li>
                    <li>
                        <a href="{{ route('topic.index') }}">
                            <i class="fa fa-solid fa-file-lines"></i> <span> Đề tài/Đề án</span>

                        </a>
                    </li>
                    <li>
                        <a href="{{ route('conference.index') }}">
                            <i class="fa fa-regular fa-comments"></i> <span>Hội thảo/Hội nghị</span>

                        </a>
                    </li>
                    <li>
                        <a href="{{ route('magazine.index') }}">
                            <i class="fa fa-solid fa-newspaper"></i> <span>Bài báo khoa học</span>

                        </a>
                    </li>
                    <li>
                        <a href="{{ route('curriculum.index') }}">
                            <i class="fa fa-solid fa-book"></i> <span>Giáo trình/Sách tham khảo</span>

                        </a>
                    </li>

                    <li>
                        <a href="{{ route('scouncil.index') }}">
                            <i class="fa fa-solid fa-check"></i> <span>Hội đồng khoa học</span>

                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-solid fa-clock-rotate-left"></i> <span>Tổng giờ khoa học</span>

                        </a>
                    </li>
                    <li>
                        <a href="{{ route('report.index') }}">
                            <i class="fa fa-th"></i> <span>Báo cáo thống kê</span>

                        </a>
                    </li>
                    <li>
                        <a href="{{ route('projects.progress-report') }}">
                            <i class="fa fa-solid fa-pager"></i> <span>Báo cáo tiến độ</span>
                        </a>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class=" fa fa-solid fa-gear"></i> <span> Danh Mục</span> <i
                                class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">

                            <li><a href="{{ route('council.index') }}"><i class="fa fa-solid fa-users"></i></i> Chức
                                    vụ hội đồng</a></li>
                            <li><a href="{{ route('lvtopic.index') }}"><i class="fa fa-solid fa-message"></i> Cấp
                                    đề tài</a></li>
                            <li><a href="{{ route('lvcouncil.index') }}"><i class="fa fa-solid fa-layer-group"></i>
                                    Cấp hội đồng</a></li>
                            <li><a href="{{ route('office.index') }}"><i class="fa fa-solid fa-building"></i> Cơ
                                    quan</a></li>
                            <li><a href="{{ route('paper.index') }}"><i class="fa fa-solid fa-file"></i> Tên tạp
                                    chí KHHĐGS</a></li>

                            <li><a href="{{ route('tpcouncil.index') }}"><i class="fa fa-solid fa-users"></i> Loại
                                    hội đồng</a></li>
                            <li><a href="{{ route('seminar.index') }}"><i class="fa fa-solid fa-warehouse"></i> Loại
                                    hội thảo</a></li>
                            <li><a href="{{ route('propose.index') }}"><i class="fa fa-solid fa-list-check"></i>
                                    Loại đề xuất</a></li>
                            <li><a href="{{ route('arsearch.index') }}"><i class="fa fa-solid fa-tag"></i> Lĩnh vực
                                    nghiên cứu</a></li>
                            <li><a href="{{ route('artopic.index') }}"><i class="fa fa-solid fa-note-sticky"></i>
                                    Lĩnh vực đề tài</a></li>
                            <li><a href="{{ route('product.index') }}"><i class="fa fa-solid fa-certificate"></i>
                                    Loại sản phẩm</a></li>
                            <li><a href="{{ route('money.index') }}"><i
                                        class="fa fa-solid fa-money-check-dollar"></i> Nguồn kinh phí</a></li>
                            <li><a href="{{ route('category.index') }}"><i class="fa fa-solid fa-chart-pie"></i>
                                    Loại hạng mục</a></li>
                            <li><a href="{{ route('suggestion.index') }}"><i
                                        class="fa fa-solid fa-circle-half-stroke"></i> Trạng thái đề xuất</a></li>
                            <li><a href="{{ route('score.index') }}"><i class="fa fa-solid fa-snowflake"></i> Tiêu
                                    chí điểm</a></li>
                            <li><a href="{{ route('training.index') }}"><i
                                        class="fa fa-solid fa-building-columns"></i> Trình độ đào tạo</a></li>

                        </ul>
                    </li>

                </ul>

            </section>

        </aside>





        <div class="content-wrapper">

            <section class="content-header">


            </section>













            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="box">

                    <div class="box-body">
                        @if (Session::has('ok'))
                            <div class="alert alert-success notification" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">&times;</button>
                                {{ Session::get('ok') }}
                            </div>
                        @endif

                        @if (Session::has('no'))
                            <div class="alert alert-danger notification" id="error-alert">
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">&times;</button>
                                {{ Session::get('no') }}
                            </div>
                        @endif





                        @yield('main')



                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">

                    </div>
                    <!-- /.box-footer-->
                </div>
                <!-- /.box -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">

        </footer>


    </div>
    <!-- ./wrapper -->
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap 3 JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- jQuery 2.2.0 -->
    <script src="assets/plugins/jQuery/jQuery-2.2.0.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="assets/plugins/fastclick/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="assets/dist/js/demo.js"></script>

    <script src="//cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>





    <script>
        let table = new DataTable('#myTable', {
            language: {
                "decimal": "",
                "emptyTable": "Không có dữ liệu",
                "info": "Hiển thị _START_ đến _END_ của _TOTAL_ mục",
                "infoEmpty": "Hiển thị 0 đến 0 của 0 mục",
                "infoFiltered": "(lọc từ _MAX_ mục)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Hiển thị _MENU_ mục",
                "loadingRecords": "Đang tải...",
                "processing": "Đang xử lý...",
                "search": "Tìm kiếm:",
                "zeroRecords": "Không tìm thấy kết quả",
                "paginate": {
                    "first": "Đầu",
                    "last": "Cuối",
                    "next": "Tiếp",
                    "previous": "Trước"
                },
                "aria": {
                    "sortAscending": ": kích hoạt để sắp xếp cột tăng dần",
                    "sortDescending": ": kích hoạt để sắp xếp cột giảm dần"
                }
            }
        });

        $(document).ready(function() {
            setTimeout(function() {
                $("#success-alert").fadeOut("slow");
            }, 1000); // 3 giây

            setTimeout(function() {
                $("#error-alert").fadeOut("slow");
            }, 1000); // 3 giây
        });

        $('#myTable tbody').on('click', 'tr', function() {
            var currentPageIndex = table.page.info().page; // Lấy số trang hiện tại
            localStorage.setItem('currentPageIndex', currentPageIndex); // Lưu vào localStorage
        });
    </script>




</body>

</html>
