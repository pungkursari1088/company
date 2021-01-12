<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("_partials/head.php") ?>
</head>

<body class="hold-transition sidebar-mini">

    <div class="wrapper">
        <?php $this->load->view("_partials/navbar.php") ?>
        <?php $this->load->view("employee/_partials/sidebar.php") ?>

        <div class="content-wrapper">

            <div class="container-fluid">

                <?php if ($this->session->flashdata('success')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php endif; ?>

                <div class>
                    <div class="p-3">
                        <a href="<?php echo site_url('employee/working_permits/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
                    </div>

                    <form action="<?php base_url('employee/working_permits/add') ?>" method="post" enctype="multipart/form-data">

                        <input type="hidden" name="user_id" value="<?php echo $working_permit->user_id ?>" />

                        <div class="form-group">
                            <label for="date_start">Tanggal Mulai*</label>
                            <input id="date1" class="form-control <?php echo form_error('date_start') ? 'is-invalid' : '' ?>" type="text" name="date_start" />
                            <div class="invalid-feedback">
                                <?php echo form_error('date_start') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="date_finish">Tanggal Berakhir*</label>
                            <input id="date2" class="form-control <?php echo form_error('date_finish') ? 'is-invalid' : '' ?>" type="text" name="date_finish" />
                            <div class="invalid-feedback">
                                <?php echo form_error('date_finish') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="total_leave_day"> Anda Mengambil Cuti Sebanyak :</label>
                            <input id='diff' name=" total_leave_day" type="text" />
                            <label> Hari </label>
                        </div>

                        <div>
                            <label>Sisa Cuti Anda : <?php echo $working_permit->total_leave_day ?> Hari</label>
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

    <!-- Select for Table -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

    <script>
        document.getElementById("diff").style.pointerEvents = "none";
        $('#date1').datepicker();
        $('#date2').datepicker();

        $('#date2').change(function() {
            var diff = $('#date1').datepicker("getDate") - $('#date2').datepicker("getDate");

            $('#diff').val(diff / (1000 * 60 * 60 * 24) * -1);
        });
    </script>


</body>

</html>