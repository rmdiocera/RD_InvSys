<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Products Inventory</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../../assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="../../assets/dist/css/skins/skin-blue.min.css">
  <!-- Page CSS -->
  <link rel="stylesheet" href="../../assets/dist/css/style_main.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

      <!-- Logo -->
      <a href="<?= site_url(); ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>IS</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Inventory</b> System</span>
      </a>

      <!-- Header Navbar -->
      <nav class="navbar navbar-static-top" role="navigation"></nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
          <!-- Optionally, you can add icons to the links -->
          <li><a href="<?= site_url(); ?>products"><i class="fa fa-link"></i><span>Products</span></a></li>
          <li><a href="<?= site_url(); ?>categories"><i class="fa fa-link"></i><span>Categories</span></a></li>
          <li><a href="<?= site_url(); ?>warehouse"><i class="fa fa-link"></i><span>Warehouses</span></a></li>
          <li><a href="<?= site_url(); ?>transactions"><i class="fa fa-link"></i><span>Transfer Stock</span></a></li>
        </ul>
        <!-- /.sidebar-menu -->
      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->

      <!-- Main content -->
      <section class="content container-fluid">
        <div class="row">
          <div class="col-md-6">
            <div class="box">
              <div class="box-body">
                <table class="table table-borderless">
                  <th colspan="2" class="thead-light">Edit Category</th>
                  <?php foreach ($category as $category) : ?>
                    <form method="POST" action="<?= site_url(); ?>categories/update/<?= $category->id ?>">
                      <tr>
                        <td>Product Name:</td>
                        <td class="pull-right"><input type="text" name="name" value="<?= $category->name ?>"></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td>
                          <button class="btn btn-primary pull-right" type="submit">Save</button>
                        </td>
                      </tr>
                    </form>
                  <?php endforeach ?>
                </table>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="pull-right hidden-xs">
        <strong><a href="http://rmdiocera.000webhostapp.com">Portfolio Website</a></strong>
      </div>
      <!-- Default to the left -->
      <strong>Made by Reginald Diocera.</strong>
    </footer>

  </div>
  </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  </div>
  <!-- ../../wrapper -->

  <!-- REQUIRED JS SCRIPTS -->

  <!-- jQuery 3 -->
  <script src="../../assets/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="../../assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../assets/dist/js/adminlte.min.js"></script>

  <!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>

</html>