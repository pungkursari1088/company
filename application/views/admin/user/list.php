<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("_partials/head") ?>
</head>

<body class="hold-transition sidebar-mini">

    <!-- wrapper -->
    <div class="wrapper">
        <?php $this->load->view("_partials/navbar") ?>
        <?php $this->load->view("_partials/sidebar") ?>

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
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Level</th>
                                            <th>Tgl Masuk</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($tbl_users as $tbl_user) : ?>
                                            <tr>
                                                <td>
                                                    <?php echo $tbl_user->user_name ?>
                                                </td>
                                                <td>
                                                    <?php echo $tbl_user->user_email ?>
                                                </td>
                                                <td>
                                                    <?php echo $tbl_user->user_level ?>
                                                </td>
                                                <td>
                                                    <?php echo $tbl_user->start_join_company ?>
                                                </td>
                                                <td width="auto">
                                                    <a href="<?php echo site_url('admin/users/edit/' . $tbl_user->user_id) ?>" class="btn btn-small"><i class="fas fa-edit"></i> Ubah</a>
                                                    <a onclick="return confirm('Kamu Yakin Menghapus Data ini?');" href="<?php echo site_url('admin/users/delete/' . $user->user_id) ?>" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
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