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
      <section class="content-header">
        <h1>
          Products Inventory
          <small>An inventory system.</small>
        </h1>
      </section>

      <!-- Main content -->
      <section class="content container-fluid">
        <div class="row homepage_charts">
          <div class="col-md-6">
            <div class="box">
              <div class="box-body">
                <canvas id="products_chart"></canvas>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="box">
              <div class="box-body">
                <canvas id="transactions_chart"></canvas>
              </div>
            </div>
          </div>
        </div>

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Transactions</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="transactions_table" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Warehouse Origin</th>
                  <th>Warehouse Destination</th>
                  <th>Product Name</th>
                  <th>Quantity</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($transactions as $transaction) : ?>
                  <tr>
                    <td><?= $transaction->from_warehouse ?></td>
                    <td><?= $transaction->to_warehouse ?></td>
                    <td><?= $transaction->product_name ?></td>
                    <td><?= $transaction->quantity ?></td>
                    <td><?= $transaction->date ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
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
  <!-- ./wrapper -->

  <!-- REQUIRED JS SCRIPTS -->

  <!-- jQuery 3 -->
  <script src="./assets/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="./assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- Select2 -->
  <script src="./assets/bower_components/select2/dist/js/select2.full.min.js"></script>
  <!-- DataTables -->
  <script src="./assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="./assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <!-- SlimScroll -->
  <script src="./assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="./assets/bower_components/fastclick/lib/fastclick.js"></script>
  <!-- Chart.js -->
  <script src="./assets/js/Chart.js"></script>
  <!-- AdminLTE App -->
  <script src="./assets/dist/js/adminlte.min.js"></script>
  <!-- page script -->
  <script>
    $(function() {
      $('#transactions_table').DataTable();

      // Products Chart Script
      let products_chart = document.getElementById('products_chart').getContext('2d');
      let colorArr = [];

      var dynamicColors = function() {
        var r = Math.floor(Math.random() * 255);
        var g = Math.floor(Math.random() * 255);
        var b = Math.floor(Math.random() * 255);
        return "rgb(" + r + "," + g + "," + b + ")";
      };

      <?php foreach ($products as $prod) : ?>
        colorArr.push(dynamicColors());
      <?php endforeach; ?>

      let pie_chart = new Chart(products_chart, {
        type: 'doughnut',
        data: {
          labels: [
            <?php foreach ($products as $prod) : ?> '<?= $prod->name ?>',
            <?php endforeach; ?>
          ],
          datasets: [{
            label: 'Quantity',
            data: [
              <?php foreach ($products as $prod) : ?> '<?= $prod->quantity ?>',
              <?php endforeach; ?>
            ],
            backgroundColor: colorArr,
            borderWidth: 1,
            borderColor: 'rgb(119,119,199)',
            hoverBorderWidth: 2,
            hoverBorderColor: 'rgb(0,0,0)'
          }]
        },
        options: {}
      });

      // Transactions Chart Script
      let transactions_chart = document.getElementById('transactions_chart').getContext('2d');
      let line_chart = new Chart(transactions_chart, {
        type: 'line',
        data: {
          labels: [
            <?php foreach ($records as $record) : ?> '<?= $record->month_record . " " . $record->year_record ?>',
            <?php endforeach; ?>
          ],
          datasets: [{
            label: 'Number of Transactions',
            data: [
              <?php foreach ($records as $record) : ?> '<?= $record->total ?>',
              <?php endforeach; ?>
            ],
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
          }]
        },
        options: {
          title: {
            display: true,
            text: 'Transactions Per Month'
          }
        }
      });


    })
  </script>

  <!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>

</html>