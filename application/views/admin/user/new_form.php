<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("_partials/head.php") ?>
</head>

<body class="hold-transition sidebar-mini">

    <div class="wrapper">
        <?php $this->load->view("_partials/navbar.php") ?>
        <?php $this->load->view("_partials/sidebar.php") ?>

        <div class="content-wrapper">

            <div class="container-fluid">

                <?php if ($this->session->flashdata('success')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php endif; ?>

                <div class>
                    <div class="p-3">
                        <a href="<?php echo site_url('admin/users/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
                    </div>

                    <form action="<?php base_url('admin/users/add') ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="user_name">Nama*</label>
                            <input class="form-control <?php echo form_error('user_name') ? 'is-invalid' : '' ?>" type="text" name="user_name" placeholder="Nama" />
                            <div class="invalid-feedback">
                                <?php echo form_error('user_name') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="user_password">Password*</label>
                            <input class="form-control <?php echo form_error('user_password') ? 'is-invalid' : '' ?>" type="password" name="user_password" />
                            <div class="invalid-feedback">
                                <?php echo form_error('user_password') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="user_email">Email*</label>
                            <input class="form-control <?php echo form_error('user_email') ? 'is-invalid' : '' ?>" type="email" name="user_email" placeholder="example@example.com" />
                            <div class="invalid-feedback">
                                <?php echo form_error('user_email') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="user_level">Level*</label>
                            <input class="form-control <?php echo form_error('user_level') ? 'is-invalid' : '' ?>" type="number" min="1" max="3" name="user_level" placeholder="0" />
                            <div class="invalid-feedback">
                                <?php echo form_error('user_level') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="start_join_company">Tanggal Masuk*</label>
                            <input class="form-control <?php echo form_error('start_join_company') ? 'is-invalid' : '' ?>" type="date" name="start_join_company" />
                            <div class="invalid-feedback">
                                <?php echo form_error('start_join_company') ?>
                            </div>
                        </div>

                        <input class="btn btn-success" type="submit" name="btn" value="Save" />
                    </form>

                    <div class="small text-muted">
                        * required fields
                    </div>

                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Sticky Footer -->
        <?php $this->load->view("_partials/foot") ?>
        <?php $this->load->view("_partials/footer") ?>
    </div>
    <!-- /#wrapper -->



</body>

</html>