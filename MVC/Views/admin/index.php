<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Q21Shop</title>
    <!-- css -->
    <link href="<?php echo $_SESSION['mainUrl']; ?>/public/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $_SESSION['mainUrl']; ?>/public/admin/css/styles.css" rel="stylesheet">
    <!--Icons-->
    <script src="<?php echo $_SESSION['mainUrl']; ?>/public/admin/js/lumino.glyphs.js"></script>
    <link rel="stylesheet" href="<?php echo $_SESSION['mainUrl']; ?>/public/admin/Awesome/css/all.css">
</head>

<body>
    <!-- header -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="<?php echo $_SESSION['mainUrl']; ?>/admin"><span>Q21Shop </span>Admin</a>
                <ul class="user-menu">
                    <li class="dropdown pull-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user">
                                <use xlink:href="#stroked-male-user"></use>
                            </svg> <?php echo isset($_SESSION['user_fullname']) ? $_SESSION['user_fullname'] : ''; ?> <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#"><svg class="glyph stroked male-user">
                                        <use xlink:href="#stroked-male-user"></use>
                                    </svg>Information</a></li>
                            <li><a href="logout" class="logout-btn"><svg class="glyph stroked cancel">
                                        <use xlink:href="#stroked-cancel"></use>
                                    </svg> Logout</a></li>
                            <form id="logout-form" action="<?php echo $_SESSION['mainUrl']; ?>/admin/logoutcontroller" method="POST" class="d-none">
                                <input type="hidden" name="logout">
                            </form>
                        </ul>
                    </li>
                </ul>
            </div>
        </div><!-- /.container-fluid -->
    </nav>
    <!-- header -->
    <!-- sidebar left-->
    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
        <form role="search">
        </form>
        <ul class="nav menu">
            <li class="<?php if($data['page'] === 'home') echo 'active'; ?>"><a href="<?php echo $_SESSION['mainUrl']; ?>/admin"><svg
                        class="glyph stroked dashboard-dial">
                        <use xlink:href="#stroked-dashboard-dial"></use>
                    </svg> Overview</a></li>
            <li class="<?php if($data['page'] === 'categories') echo 'active'; ?>"><a
                    href="<?php echo $_SESSION['mainUrl']; ?>/admin/categories"><svg class="glyph stroked clipboard with paper">
                        <use xlink:href="#stroked-clipboard-with-paper" /></svg> Categories</a></li>
            <li class="<?php if($data['page'] === 'products') echo 'active'; ?>"><a
                    href="<?php echo $_SESSION['mainUrl']; ?>/admin/products"><svg class="glyph stroked bag">
                        <use xlink:href="#stroked-bag"></use>
                    </svg> Products</a></li>
            <li class="<?php if($data['page'] === 'orders') echo 'active'; ?>"><a href="<?php echo $_SESSION['mainUrl']; ?>/admin/orders"><svg class="glyph stroked notepad ">
                        <use xlink:href="#stroked-notepad" /></svg> Orders</a></li>
            <li role="presentation" class="divider"></li>
            <li class="<?php if($data['page'] === 'users') echo 'active'; ?>"><a
                    href="<?php echo $_SESSION['mainUrl']; ?>/admin/users"><svg class="glyph stroked male-user">
                        <use xlink:href="#stroked-male-user"></use>
                    </svg> Users</a></li>
        </ul>
    </div>
    <!--/. end sidebar left-->

    <!-- Main -->
    <?php
        require_once './MVC/Views/admin/' . $data['content'] . '.php';
    ?>
    <!-- End Main -->

    <!-- javascript -->
    <script src="<?php echo $_SESSION['mainUrl']; ?>/public/admin/js/jquery-1.11.1.min.js"></script>
    <script src="<?php echo $_SESSION['mainUrl']; ?>/public/admin/js/bootstrap.min.js"></script>
    <script src="<?php echo $_SESSION['mainUrl']; ?>/public/admin/js/chart.min.js"></script>
    <script src="<?php echo $_SESSION['mainUrl']; ?>/public/admin/js/chart-data.js"></script>
    <script src="<?php echo $_SESSION['mainUrl']; ?>/public/admin/js/myscript.js"></script>
    <script>
        $(document).ready(function() {
            $(".logout-btn").click(function(e) {
                e.preventDefault();
                $("#logout-form").submit();
            });
            $(".delete-category").click(function(e) {
                let result = confirm("You sure want to drop this category???");
                if(!result) {
                    e.preventDefault();
                }
            });
            $(".handling-order").click(function(e) {
                e.preventDefault();
                $("#handlingOrder").submit();
            });
            $(".delete-product").click(function(e) {
                let result = confirm("You sure want to drop this Product???");
                if(!result) {
                    e.preventDefault();
                }
            });
            $('#avatar').click(function(){
                $('#img').click();
            });
        });
        function changeImg(input){
            //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
            if(input.files && input.files[0]){
                var reader = new FileReader();
                //Sự kiện file đã được load vào website
                reader.onload = function(e){
                    //Thay đổi đường dẫn ảnh
                    $('#avatar').attr('src',e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>

</html>