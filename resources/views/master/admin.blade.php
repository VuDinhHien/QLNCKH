<!DOCTYPE html>
<html>

<head>
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
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="assets/dist/css/skins/_all-skins.min.css">
  <!-- font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

</head>

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

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- <img src="assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">  -->
                
                <i class="fa fa-solid fa-power-off"></i>
                <span class="hidden-xs">{{ auth()->user()->name }}</span>
              </a>

            </li>
            <!-- Control Sidebar Toggle Button -->

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
            <a href="{{ route('admin.logout') }}"><i class="fa fa-circle text-success"></i> Logout</a>
          </div>
        </div>


        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
          <!-- <li class="header">MAIN NAVIGATION</li> -->






          <!-- <li class="treeview">
            <a href="#">
              <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <li><a href="assets/index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
              <li><a href="assets/index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
            </ul>
          </li> -->

          <li>
            <a href="#">
              <i class="fa fa-solid fa-id-card"></i> <span> Nhà Khoa Học</span>

            </a>
          </li>

          <li>
            <a href="#">
              <i class="fa fa-solid fa-clipboard-check"></i> <span> Quản lý đề xuất</span>

            </a>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-solid fa-file-lines"></i> <span> Đề tài/Đề án</span>

            </a>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-regular fa-comments"></i> <span>Hội thảo/Hội nghị</span>

            </a>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-solid fa-newspaper"></i> <span>Bài báo khoa học</span>

            </a>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-solid fa-book"></i> <span>Giáo trình/Sách tham khảo</span>

            </a>
          </li>

          <li>
            <a href="#">
              <i class="fa fa-solid fa-check"></i> <span>Hội đồng khoa học</span>

            </a>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-solid fa-clock-rotate-left"></i> <span>Tổng giờ khoa học</span>

            </a>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-th"></i> <span>Báo cáo thống kê</span>

            </a>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-solid fa-pager"></i> <span>Báo cáo tiến độ</span>

            </a>
          </li>

          <li class="treeview">
            <a href="#">
              <i class=" fa fa-solid fa-gear"></i> <span> Danh Mục</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <li><a href=""><i class="fa fa-solid fa-user-tie"></i></i> Chức vụ hội đồng</a></li>
              <li><a href=""><i class="fa fa-solid fa-message"></i> Cấp đề tài</a></li>
              <li><a href=""><i class="fa fa-solid fa-layer-group"></i> Cấp hội đồng</a></li>
              <li><a href=""><i class="fa fa-solid fa-building"></i> Cơ quan</a></li>
              <li><a href=""><i class="fa fa-solid fa-file"></i> Tên tạp chí KHHĐGS</a></li>
              <li><a href=""><i class="fa fa-solid fa-file-contract"></i> Loại hợp đông</a></li>
              <li><a href=""><i class="fa fa-solid fa-users"></i> Loại hội đồng</a></li>
              <li><a href=""><i class="fa fa-solid fa-warehouse"></i> Loại hội thảo</a></li>
              <li><a href=""><i class="fa fa-solid fa-list-check"></i> Loại đề xuất</a></li>
              <li><a href=""><i class="fa fa-solid fa-receipt"></i> Cấp đề tài</a></li>
              <li><a href=""><i class="fa fa-solid fa-tag"></i> Lĩnh vực nghiên cứu</a></li>
              <li><a href=""><i class="fa fa-solid fa-note-sticky"></i> Lĩnh vực đề tài</a></li>
              <li><a href=""><i class="fa fa-solid fa-certificate"></i> Loại sản phẩm</a></li>
              <li><a href=""><i class="fa fa-solid fa-money-check-dollar"></i> Nguồn kinh phí</a></li>
              <li><a href=""><i class="fa fa-solid fa-chart-pie"></i> Loại hạng mục</a></li>
              <li><a href=""><i class="fa fa-solid fa-circle-half-stroke"></i> Trạng thái đề xuất</a></li>
              <li><a href=""><i class="fa fa-solid fa-snowflake"></i> Tiêu chí điểm</a></li>
              <li><a href=""><i class="fa fa-solid fa-building-columns"></i> Trình độ đào tạo</a></li>

            </ul>
          </li>

        </ul>

      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          @yield('title')
        </h1>

      </section>

      <!-- Main content -->
      <section class="content">

        <!-- Default box -->
        <div class="box">

          <div class="box-body">
            @if (Session::has('yes'));
            <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              {{ Session::get('yes')}}
            </div>
            @endif

            @if (Session::has('no'));
            <div class="alert alert-danger">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              {{ Session::get('no')}}
            </div>
            @endif


            <!-- cua main -->
            @yield('main')




            <!-- <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col col-md-6"><b>Student Data</b></div>
                  <div class="col col-md-6">
                    <a href="" class="btn btn-success btn-sm float-end">Add</a>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <table class="table table-bordered">
                  <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Action</th>
                  </tr>


                  <tr>
                    <td><img src="" width="75" /></td>
                    <td>dfghdfghd</td>
                    <td>dfghdfghdfgh</td>
                    <td>dgfhdfghdfg</td>
                    <td>
                      <form method="post" action="">

                        <a href="" class="btn btn-primary btn-sm">View</a>
                        <a href="}" class="btn btn-warning btn-sm">Edit</a>
                        <input type="submit" class="btn btn-danger btn-sm" value="Delete" />
                      </form>

                    </td>
                  </tr>


                  <tr>
                    <td colspan="5" class="text-center">No Data Found</td>
                  </tr>

                </table>

              </div>
            </div> -->

          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            Footer
          </div>
          <!-- /.box-footer-->
        </div>
        <!-- /.box -->

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
      <!-- <div class="pull-right hidden-xs">
       
      </div>
      <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
      reserved. -->
    </footer>

    <!-- Control Sidebar -->


  </div>
  <!-- ./wrapper -->

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
</body>

</html>