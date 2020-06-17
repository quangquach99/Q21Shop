<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Create New User</h1>
        </div>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading"><i class="fas fa-user"></i> Create New User</div>
                <div class="panel-body">
                    <form action="<?php echo $_SESSION['mainUrl']; ?>/admin/users/store" method="POST">
                        <div class="row justify-content-center" style="margin-bottom:40px">
                            <div class="col-md-8 col-lg-8 col-lg-offset-2">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input required type="text" name="username" class="form-control"
                                    value="<?php if(isset($data['post']['username'])) echo $data['post']['username']; ?>">
                                    <?php if(isset($data['errors']['username'])) { ?>
                                        <div class="alert alert-danger" role="alert">
                                            <strong>
                                                    <?php echo $data['errors']['username']; ?>
                                            </strong>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input required type="password" name="password" class="form-control">
                                    <?php if(isset($data['errors']['password'])) { ?>
                                        <div class="alert alert-danger" role="alert">
                                            <strong>
                                                    <?php echo $data['errors']['password']; ?>
                                            </strong>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input required type="password" name="confirm_password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input required type="text" name="user_fullname" class="form-control"
                                    value="<?php if(isset($data['post']['user_fullname'])) echo $data['post']['user_fullname']; ?>">
                                    <?php if(isset($data['errors']['user_fullname'])) { ?>
                                        <div class="alert alert-danger" role="alert">
                                            <strong>
                                                    <?php echo $data['errors']['user_fullname']; ?>
                                            </strong>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input required type="email" name="user_email" class="form-control"
                                    value="<?php if(isset($data['post']['user_email'])) echo $data['post']['user_email']; ?>">
                                    <?php if(isset($data['errors']['user_email'])) { ?>
                                        <div class="alert alert-danger" role="alert">
                                            <strong>
                                                    <?php echo $data['errors']['user_email']; ?>
                                            </strong>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input required type="text" name="user_phone" class="form-control"
                                    value="<?php if(isset($data['post']['user_phone'])) echo $data['post']['user_phone']; ?>">
                                    <?php if(isset($data['errors']['user_phone'])) { ?>
                                        <div class="alert alert-danger" role="alert">
                                            <strong>
                                                    <?php echo $data['errors']['user_phone']; ?>
                                            </strong>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input required type="text" name="user_address" class="form-control"
                                    value="<?php if(isset($data['post']['user_phone'])) echo $data['post']['user_phone']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Level</label>
                                    <select name="user_level" class="form-control">
                                        <option <?php if(isset($data['post']['user_level']) && $data['post']['user_level'] == 1) echo "selected"; ?> value="1">Admin</option>
                                        <option <?php if(isset($data['post']['user_level']) && $data['post']['user_level'] == 0) echo "selected"; ?> value="0">User</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-lg-8 col-lg-offset-2 text-right">
                                    <button class="btn btn-success" type="submit" name="create">Create</button>
                                    <button class="btn btn-danger" type="reset">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <!--/.row-->
</div>