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
      <!-- Main content -->
      <section class="content container-fluid">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Categories</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="categories_table" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Category Name</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($categories as $category) : ?>
                  <tr>
                    <td><?= $category->id ?></td>
                    <td><?= $category->name ?></td>
                    <td><a href="<?= site_url(); ?>categories/edit/<?= $category->id ?>"><button class="btn-xs btn-block btn-flat btn-info">Edit</button></a></td>
                    <td><a href="<?= site_url(); ?>categories/delete/<?= $category->id ?>"><button class="btn-xs btn-block btn-flat btn-danger">Delete</button></a></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <th colspan="2" class="thead_light">Add Category</th>
              <form method="POST" action="<?= site_url(); ?>categories/add">
                <tbody>
                  <tr>
                    <td>Category Name: </td>
                    <td>
                      <input type="text" name="name">
                      <button class="btn-sm bg-primary bg-flat add-btn" type="submit">Add</button>
                    </td>
                  </tr>
                </tbody>
              </form>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    </section>

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



  <script src="./assets/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="./assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- DataTables -->
  <script src="./assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="./assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <!-- SlimScroll -->
  <script src="./assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="./assets/bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="./assets/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="./assets/dist/js/demo.js"></script>
  <!-- page script -->
  <script>
    $(function() {
      $('#categories_table').DataTable({
        "columnDefs": [
                { width: "12%", targets: 0 },
                { width: "12%", targets: 2 },
                { width: "12%", targets: 3 }
            ]
      });

    })
  </script>
</body>

</html>