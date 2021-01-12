<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("_partials/head") ?>
</head>

<body class="hold-transition sidebar-mini">

    <!-- wrapper -->
    <div class="wrapper">
        <?php $this->load->view("_partials/navbar") ?>
        <?php $this->load->view("employee/_partials/sidebar") ?>

        <!-- Main content -->
        <section class="content-wrapper">

            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Tabel User</h1>
                        </div>

                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="main_table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Tanggal Mulai</th>
                                            <th>Tanggal Selesai</th>
                                            <th>Jumlah Cuti</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($working_permits !== NULL) : ?>
                                            <?php foreach ($working_permits as $working_permit) : ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $working_permit->date_start ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $working_permit->date_finish ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $working_permit->total_leave_day ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tbody>

                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->

        <!-- Sticky Footer -->
        <?php $this->load->view("_partials/foot") ?>
        <?php $this->load->view("_partials/footer") ?>
    </div>
    <!-- /.content-wrapper -->



    <script>
        $(document).ready(function() {
            $('#main_table').DataTable();
        });
    </script>

</body>

</html>