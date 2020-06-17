<!--main-->
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Create New Product</h1>
        </div>
    </div>
    <?php if(isset($data['error'])) { ?>
    <div class="alert alert-danger">
        <?php echo $data['error']; ?>
    </div>
    <?php } ?>
    <!--/.row-->
    <div class="row">
        <div class="col-xs-6 col-md-12 col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Create New Product</div>
                <form action="<?php echo $_SESSION['mainUrl']; ?>/admin/products/store" method="POST" enctype="multipart/form-data">
                    <div class="panel-body">
                        <div class="row" style="margin-bottom:40px">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Category</label>
                                    <select name="product_category" class="form-control">
                                        <?php
                                            $sub = new SubCategories($data['categories']);
                                            if(isset($data['post']['product_category'])) {
                                                $sub->main($data['post']['product_category']);
                                            } else {
                                                $sub->main();
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Product Code</label>
                                    <input required type="text" name="product_code" class="form-control"
                                    value="<?php if(isset($data['post']['product_code'])) echo $data['post']['product_code']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Product Name</label>
                                    <input required type="text" name="product_name" class="form-control"
                                    value="<?php if(isset($data['post']['product_name'])) echo $data['post']['product_name']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Price</label>
                                    <input required type="number" name="product_price" class="form-control"
                                    value="<?php if(isset($data['post']['product_price'])) echo $data['post']['product_price']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Is Highlighted</label>
                                    <select name="product_highlight" class="form-control">
                                        <option value="0" <?php if(isset($data['post']['product_highlight']) && $data['post']['product_highlight']=='0') echo "selected"; ?>>No</option>
                                        <option value="1" <?php if(isset($data['post']['product_highlight']) && $data['post']['product_highlight']=='1') echo "selected"; ?>>Yes</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Quantity</label>
                                    <input required type="number" name="product_quantity" min="0" class="form-control"
                                    value="<?php if(isset($data['post']['product_quantity'])) echo $data['post']['product_quantity']; ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Image</label>
                                    <input id="img" type="file" name="product_image" class="form-control hidden"
                                        onchange="changeImg(this)" value="<?php if(isset($data['post']['product_image'])) echo $data['post']['product_image'] ?>">
                                    <img id="avatar" class="thumbnail" width="100%" height="350px"
                                        src="<?php echo $_SESSION['mainUrl']; ?>/public/img/import-img.png">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Details</label>
                                    <textarea name="product_details" 
                                        style="width: 100%;height: 100px;"><?php if(isset($data['post']['product_details'])) echo $data['post']['product_details']; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea id="editor" name="product_description"
                                        style="width: 100%;height: 100px;"><?php if(isset($data['post']['product_description'])) echo $data['post']['product_description']; ?></textarea>
                                </div>
                                <button class="btn btn-success" name="createProduct" type="submit">Create</button>
                                <button class="btn btn-danger" type="reset">Cancel</button>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--/.row-->
</div>
<!--end main-->