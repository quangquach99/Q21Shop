<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="<?php echo $_SESSION['mainUrl']; ?>/admin"><svg class="glyph stroked home">
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
                        <div class="col-md-12">
                            <a href="<?php echo $_SESSION['mainUrl']; ?>/admin/categories/create" class="btn btn-primary">Add New Category</a>
                            <h3><strong>Category Level</strong></h3>
                            <div class="vertical-menu">
                                <?php $sub = new SubCategories($data['categories']); $sub->main(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/.col-->
    </div>
    <!--/.row-->
</div>