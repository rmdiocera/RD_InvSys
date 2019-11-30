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
                        <h3 class="box-title">Transfer Stock</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- id="add_product_row"  -->
                    <form method="POST" action="<?= site_url(); ?>transactions/send_to_warehouse">
                        <div class="box-body">
                            <table id="products_table" class="table table-bordered table-striped">
                                <tbody>
                                    <tr>
                                        <td>Warehouse Origin</td>
                                        <td>
                                            <div class="form-group">
                                                <select name="from_warehouse" class="form-control select2" data-placeholder="Select a Warehouse" style="width: 30%;">
                                                    <?php foreach ($warehouses as $warehouse) : ?>
                                                        <option value="<?= $warehouse->id ?>"><?= $warehouse->name ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Warehouse Destination</td>
                                        <td>
                                            <div class="form-group">
                                                <select name="to_warehouse" class="form-control select2" data-placeholder="Select a Warehouse" style="width: 30%;">
                                                    <?php foreach ($warehouses as $warehouse) : ?>
                                                        <option value="<?= $warehouse->id ?>"><?= $warehouse->name ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="box-body">
                            <table class="table table-bordered table-striped">
                                <tbody id="product_row_header">
                                    <tr id="product_row">
                                        <td>Product Name: </td>
                                        <td>
                                            <select name="product_id[]" class="form-control select2" data-placeholder="Choose Product" style="width: 70%;">
                                                <?php foreach ($products as $product) : ?>
                                                    <option value="<?= $product->id ?>"><?= $product->name ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </td>
                                        <td>Product Quantity: </td>
                                        <td id="qty_textbox"><input type="text" name="quantity[]"></td>
                                    </tr>
                                    <tr id="send_products">
                                        <td colspan="4">
                                            <button class="btn btn-primary save-btn pull-right" type="submit" >Save</button>
                                            <button class="btn btn-primary pull-right" id="add_product_row">Add Item</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                </div>
                </form>
                <!-- /.box-body -->
            </section>
        </div>
        <!-- /.box -->

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

    <script src="./assets/js/transfer_stock.js"></script>

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
            $('#products_table').DataTable();

        });
    </script>
</body>

</html>