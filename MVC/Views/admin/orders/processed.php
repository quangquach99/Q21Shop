<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="<?php echo $_SESSION['mainUrl']; ?>/admin"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li class="active">Orders</li>
        </ol>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Processed Orders</div>
                <div class="panel-body">
                    <div class="bootstrap-table">
                        <div class="table-responsive">
                            <a href="<?php echo $_SESSION['mainUrl']; ?>/admin/orders" class="btn btn-warning"><span class="glyphicon glyphicon-gift"></span>Unprocessed Orders</a>
                            <table class="table table-bordered" style="margin-top:20px;">
                                <thead>
                                    <tr class="bg-primary">
                                        <th>Order ID</th>
                                        <th>Customer Name</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($data['orders'] as $order) { ?>
                                    <tr>
                                        <td><?php echo $order['order_id']; ?></td>
                                        <td><?php echo $order['customer_name']; ?></td>
                                        <td><?php echo $order['customer_phone']; ?></td>
                                        <td><?php echo $order['customer_address']; ?></td>
                                        <td><?php echo $order['reg_date']; ?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <div align='right'>
                                <ul class="pagination">
                                    <?php $pagination = new Pagination('orders/processed',$data['orders'], $data['pagination'], $data['lastPage']); $pagination->main(); ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <!--/.row-->
</div>
<!--end main-->