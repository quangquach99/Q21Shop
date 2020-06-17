<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="<?php echo $_SESSION['mainUrl']; ?>/admin"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li class="active">Orders / Order Details</li>
        </ol>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Order Details</div>
                <div class="panel-body">
                    <div class="bootstrap-table">
                        <div class="table-responsive">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="panel panel-blue">
                                            <div class="panel-heading dark-overlay">Customer</div>
                                            <div class="panel-body">
                                                <strong><span class="glyphicon glyphicon-user" aria-hidden="true"></span> : <?php echo $data['order_details'][0]['customer_name']; ?></strong> <br>
                                                <strong><span class="glyphicon glyphicon-phone" aria-hidden="true"></span> : <?php echo $data['order_details'][0]['customer_phone']; ?></strong>
                                                <br>
                                                <strong><span class="glyphicon glyphicon-send" aria-hidden="true"></span> : <?php echo $data['order_details'][0]['customer_email']; ?></strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-bordered" style="margin-top:20px;">
                                <thead>
                                    <tr class="bg-primary">
                                        <th>Order ID</th>
                                        <th>Product Information</th>
                                        <th>Price</th>
                                        <th>Add Up</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $total = 0; foreach($data['order_details'] as $order_details) { ?>
                                    <tr>
                                        <td><?php echo $order_details['order_id']; ?></td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <img width="100px" src="<?php echo $_SESSION['mainUrl']; ?>/public/img/<?php echo $order_details['product_image']; ?>" class="thumbnail">
                                                </div>
                                                <div class="col-md-8">
                                                    <p><b>Product Code</b>: <?php echo $order_details['product_code']; ?></p>
                                                    <p><b>Product Name</b>: <?php echo $order_details['product_name']; ?></p>
                                                    <p><b>Quantity</b> : <?php echo $order_details['order_details_quantity']; ?></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td><?php echo number_format($order_details['product_price'],2); ?> VNĐ</td>
                                        <td><?php $addUp = $order_details['product_price']*$order_details['order_details_quantity']; echo number_format($addUp,2); $total += $addUp; ?> VNĐ</td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th width='70%'>
                                            <h4 align='right'>Total :</h4>
                                        </th>
                                        <th>
                                            <h4 align='right' style="color: brown;"><?php echo number_format($total,2); ?> VNĐ</h4>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                            <div class="alert alert-primary" role="alert" align='right'>
                                <a class="handling-order btn btn-success" href="#" role="button">Processed</a>
                            </div>
                            <form action="<?php echo $_SESSION['mainUrl']; ?>/admin/orders/processing" id="handlingOrder" method="POST">
                                <input type="hidden" name="order_id" value="<?php echo $data['order_id']; ?>">
                                <input type="hidden" name="processing" value="true">
                            </form>
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