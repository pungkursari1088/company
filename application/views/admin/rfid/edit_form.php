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

                <div>
                    <div class="p-3">
                        <a href="<?php echo site_url('admin/rfids/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
                    </div>

                    <form action="<?php base_url('admin/rfids/add') ?>" method="post" enctype="multipart/form-data">

                        <input type="hidden" name="id" value="<?php echo $rfid->id ?>" />

                        <div class="form-group">
                            <label for="user_name">Nama*</label>
                            <div class="select">
                                <select name="user_id">
                                    <?php
                                    foreach ($users as $user) {
                                        if ($user->user_id == $rfid->user_id) {
                                            $selected = 'selected';
                                        } else {
                                            $selected = '';
                                        }
                                        echo '<option value="' . $user->user_id . '" ' . $selected . '>' . $user->user_name . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="code_rfid">kode RFID*</label>
                            <input class="form-control <?php echo form_error('code_rfid') ? 'is-invalid' : '' ?>" type="text" name="code_rfid" value="<?php echo $rfid->code_rfid ?>" />
                            <div class="invalid-feedback">
                                <?php echo form_error('code_rfid') ?>
                            </div>
                        </div>

                        <input class="btn btn-success" type="submit" name="btn" value="Update" />
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