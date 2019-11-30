<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Products Inventory</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../../assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../../assets/bower_components/Ionicons/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../../assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../assets/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../../assets/dist/css/skins/_all-skins.min.css">
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
            <!-- <section class="content-header">
                <h1>
                    <?php foreach ($warehouse as $wh) : ?>
                        <?= $wh->name ?>
                    <?php endforeach; ?>
                </h1>
            </section> -->

            <!-- Main content -->
            <section class="content container-fluid">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">
                            <?php foreach ($warehouse as $wh) : ?>
                                <?= $wh->name ?>
                            <?php endforeach; ?>
                        </h3>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12 warehouse_chart">
                                <canvas id="warehouse_products_chart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Products</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="products_table" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Product ID</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($items as $item) : ?>
                                    <tr>
                                        <td><?= $item->product_id ?></td>
                                        <td><?= $item->name ?></td>
                                        <td><?= $item->quantity ?></td>
                                        <td class="text-center"><a href="<?= site_url(); ?>warehouse/edit_warehouse_product/<?= $item->product_id ?>/<?= $item->warehouse_id ?>"><button class="btn-xs btn-block btn-flat btn-info">Edit</button></a></td>
                                        <td class="text-center"><a href="<?= site_url(); ?>warehouse/delete_warehouse_product/<?= $item->product_id ?>/<?= $item->warehouse_id ?>"><button class="btn-xs btn-block btn-flat btn-danger">Delete</button></a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered table-striped">
                            <th colspan="2" class="thead-light">Add Product to Warehouse</th>
                            <?php foreach ($warehouse as $warehouse) : ?>
                                <form method="POST" action="<?= site_url(); ?>warehouse/add_product_to_warehouse/<?= $warehouse->id ?>">
                                <?php endforeach ?>
                                <tbody>
                                    <tr>
                                        <td>Product Name: </td>
                                        <td>
                                            <div class="form-group">
                                                <select name="product_id" class="form-control select2" data-placeholder="Choose Product" style="width: 50%;">
                                                    <?php foreach ($products as $product) : ?>
                                                        <option value="<?= $product->id ?>"><?= $product->name ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Product Quantity: </td>
                                        <td>
                                            <input type="text" name="quantity">
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



    <script src="../../assets/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="../../assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="../../assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../../assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="../../assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../../assets/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- Chart.js -->
    <script src="../../assets/js/Chart.js"></script>
    <!-- AdminLTE App -->
    <script src="../../assets/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../assets/dist/js/demo.js"></script>
    <!-- page script -->
    <script>
        $(function() {
            $('#products_table').DataTable();

            let warehouse_products_chart = document.getElementById('warehouse_products_chart').getContext('2d');
            warehouse_products_chart.canvas.height = 400;

            let colorArr = [];

            var dynamicColors = function() {
                var r = Math.floor(Math.random() * 255);
                var g = Math.floor(Math.random() * 255);
                var b = Math.floor(Math.random() * 255);
                return "rgb(" + r + "," + g + "," + b + ")";
            };

            <?php foreach ($items as $item) : ?>
                colorArr.push(dynamicColors());
            <?php endforeach; ?>

            let warehouse_pie_chart = new Chart(warehouse_products_chart, {
                type: 'doughnut',
                data: {
                    labels: [
                        <?php foreach ($items as $item) : ?> '<?= $item->name ?>',
                        <?php endforeach; ?>
                    ],
                    datasets: [{
                        label: 'Quantity',
                        data: [
                            <?php foreach ($items as $item) : ?> '<?= $item->quantity ?>',
                            <?php endforeach; ?>
                        ],
                        backgroundColor: colorArr,
                        borderWidth: 1,
                        borderColor: 'rgb(119,119,199)',
                        hoverBorderWidth: 2,
                        hoverBorderColor: 'rgb(0,0,0)'
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    title: {
                        display: true,
                        text: 'Warehouse Product Distribution'
                    }
                }
            });
        });
    </script>
</body>

</html>