<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li class="active">Categories</li>
        </ol>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Categories</h1>
        </div>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-5">
                            <form action="<?php echo $_SESSION['mainUrl']; ?>/admin/categories/update" method="POST">
                                <input type="hidden" name="category_id" value="<?php echo $data['category']['category_id']; ?>">
                                <input type="hidden" name="reg_date" value="<?php echo $data['category']['reg_date']; ?>">
                                <?php if(isset($data['error'])) { ?>
                                <div class="alert bg-danger" role="alert">
                                    <svg class="glyph stroked cancel">
                                        <use xlink:href="#stroked-cancel"></use>
                                    </svg><?php echo $data['error']; ?><a href="#" class="pull-right"><span
                                            class="glyphicon glyphicon-remove"></span></a>
                                </div>
                                <?php } ?>
                                <div class="form-group">
                                    <label for="">Category Parent</label>
                                    <select class="form-control" name="category_parent">
                                        <?php 
                                            $sub = new Subcategories($data['categories']);
                                            if(isset($data['post']['category_parent'])) {
                                                $sub->main($data['post']['category_parent']);
                                            } else {
                                                $sub->main($data['category']['category_parent']);
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Category Name</label>
                                    <input type="text" class="form-control" name="category_name" placeholder="Category Name Goes Here"
                                        value="<?php echo isset($data['post']['category_name']) ? $data['post']['category_name'] : $data['category']['category_name']; ?>">
                                </div>
                                <button type="submit" name="updateCategory" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/.col-->
    </div>
    <!--/.row-->
</div>