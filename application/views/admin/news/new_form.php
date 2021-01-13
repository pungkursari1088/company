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
                        <a href="<?php echo site_url('admin/news/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
                    </div>

                    <form action="<?php base_url('admin/news/add') ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Judul*</label>
                            <input class="form-control <?php echo form_error('title') ? 'is-invalid' : '' ?>" type="text" name="title" />
                            <div class="invalid-feedback">
                                <?php echo form_error('title') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="code_rfid">Deskripsi*</label>
                            <input class="form-control <?php echo form_error('description') ? 'is-invalid' : '' ?>" type="text" name="description" />
                            <div class="invalid-feedback">
                                <?php echo form_error('description') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="code_rfid">Tanggal*</label>
                            <input id="datetimepicker" class="form-control <?php echo form_error('created_at') ? 'is-invalid' : '' ?>" type="date" name="created_at" />
                            <div class="invalid-feedback">
                                <?php echo form_error('created_at') ?>
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