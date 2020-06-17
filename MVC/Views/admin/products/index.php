<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="<?php echo $_SESSION['mainUrl']; ?>/admin"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li class="active">Products</li>
        </ol>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Products</h1>
        </div>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-body">
                    <div class="bootstrap-table">
                        <div class="table-responsive">
                            <?php if(isset($data['result'])) { ?>
                            <div class="alert bg-success" role="alert">
                                <svg class="glyph stroked checkmark">
                                    <use xlink:href="#stroked-checkmark"></use>
                                </svg><?php echo $data['result']; ?><a href="#" class="pull-right"><span
                                        class="glyphicon glyphicon-remove"></span></a>
                            </div>
                            <?php } ?>
                            <a href="<?php echo $_SESSION['mainUrl']; ?>/admin/products/create" class="btn btn-primary">Add New Product</a>
                            <table class="table table-bordered" style="margin-top:20px;">
                                <thead>
                                    <tr class="bg-primary">
                                        <th>ID</th>
                                        <th>Details</th>
                                        <th>Price</th>
                                        <th>State</th>
                                        <th>Category</th>
                                        <th width='18%'>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($data['products'] as $product) { ?>
                                    <tr>
                                        <td><?php echo $product['product_id'] ?></td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-3"><img src="<?php echo $_SESSION['mainUrl']; ?>/public/img/<?php echo $product['product_image']; ?>" alt="Áo đẹp"
                                                        width="100px" class="thumbnail"></div>
                                                <div class="col-md-9">
                                                    <p><strong>Product Code : <?php echo $product['product_code']; ?></strong></p>
                                                    <p>Name : <?php echo $product['product_name']; ?></p>


                                                </div>
                                            </div>
                                        </td>
                                        <td><?php echo number_format($product['product_price'],2); ?> VND</td>
                                        <td>
                                            <?php if($product['product_state']) { ?>
                                            <a class="btn btn-success" href="#" role="button">Vailable</a>
                                            <?php } else { ?>
                                            <a class="btn btn-danger" href="#" role="button">Unavailable</a>
                                            <?php } ?>
                                        </td>
                                        <td><?php echo $product['category_name']; ?></td>
                                        <td>
                                            <a href="<?php echo $_SESSION['mainUrl']; ?>/admin/products/edit/<?php echo $product['product_id']; ?>" class="btn btn-warning"><i class="fa fa-pencil"
                                                    aria-hidden="true"></i> Edit</a>
                                            <a href="<?php echo $_SESSION['mainUrl']; ?>/admin/products/delete/<?php echo $product['product_id'] . '/' . $product['reg_date']; ?>" class="delete-product btn btn-danger"><i class="fa fa-trash"
                                                    aria-hidden="true"></i> Delete</a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <div align='right'>
                                <ul class="pagination">
                                <?php $pagination = new Pagination('products',$data['products'], $data['pagination'], $data['lastPage']); $pagination->main(); ?>
                                </ul>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!--/.row-->
        </div>
    </div>
</div>