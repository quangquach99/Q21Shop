<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="<?php echo $_SESSION['mainUrl']; ?>/admin"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li class="active">Users</li>
        </ol>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Users</h1>
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
                            <a href="<?php echo $_SESSION['mainUrl']; ?>/admin/users/create" class="btn btn-primary">Add New User</a>
                            <table class="table table-bordered" style="margin-top:20px;">
                                <thead>
                                    <tr class="bg-primary">
                                        <th>ID</th>
                                        <th>Username</th>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Level</th>
                                        <th width='18%'>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($data['users'] as $user) { ?>
                                    <tr>
                                    <td><?php echo $user['user_id']; ?></td>
                                    <td><?php echo $user['username']; ?></td>
                                    <td><?php echo $user['user_fullname']; ?></td>
                                    <td><?php echo $user['user_email']; ?></td>
                                    <td><?php echo $user['user_phone']; ?></td>
                                    <td><?php echo $user['user_address']; ?></td>
                                    <td><?php echo $user['user_level'] == 1 ? 'Admin' : 'Member'; ?></td>
                                    <td>
                                        <a href="<?php echo $_SESSION['mainUrl']; ?>/admin/users/edit/<?php echo $user['user_id']; ?>" class="btn btn-warning"><i class="fa fa-pencil"
                                                    aria-hidden="true"></i> Edit</a>
                                        <a href="<?php echo $_SESSION['mainUrl']; ?>/admin/users/delete/<?php echo $user['user_id'] . '/' . $user['reg_date']; ?>" class="delete-user btn btn-danger"><i class="fa fa-trash"
                                                    aria-hidden="true"></i> Delete</a>
                                    </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                            <div align='right'>
                                <ul class="pagination">
                                    <?php $pagination = new Pagination('users',$data['users'], $data['pagination'], $data['lastPage']); $pagination->main(); ?>
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