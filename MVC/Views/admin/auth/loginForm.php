<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="<?php echo $_SESSION['mainUrl']; ?>/public/admin/css/bootstrap.min.css" rel="stylesheet">

    <link href="<?php echo $_SESSION['mainUrl']; ?>/public/admin/css/styles.css" rel="stylesheet">
</head>

<body>

    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">Log in</div>
                <div class="panel-body">
                    <form role="form" action="<?php echo $_SESSION['mainUrl']; ?>/admin/logincontroller/auth" method="POST">
                        <fieldset>
                            <?php if(isset($data['error'])) { ?>
                                <div class="alert alert-danger">
                                    <?php echo $data['error']; ?>
                                </div>
                            <?php } ?>
                            <div class="form-group">
                                <input class="form-control" required placeholder="Username" name="username" type="text" value="">
                            </div>
                            <div class="form-group">
                                <input class="form-control" required placeholder="Password" name="password" type="password"
                                    value="">
                            </div>
                            <button type="submit" name="login" class="btn btn-primary">Login</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row -->
</body>

</html>