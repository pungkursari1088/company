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
                            <h1>Tabel Berita Perusahaan</h1>
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
                                            <th>Judul</th>
                                            <th>Deskripsi</th>
                                            <th>Tanggal</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($news as $new) : ?>
                                            <tr>
                                                <td>
                                                    <?php echo $new->title ?>
                                                </td>
                                                <td>
                                                    <?php echo $new->description ?>
                                                </td>
                                                <td>
                                                    <?php echo $new->created_at ?>
                                                </td>
                                                <td width="auto">
                                                    <a href="<?php echo site_url('admin/news/edit/' . $new->id) ?>" class="btn btn-small"><i class="fas fa-edit"></i> Ubah</a>
                                                    <a onclick="return confirm('Kamu Yakin Menghapus Data ini?');" href="<?php echo site_url('admin/new/delete/' . $new->id) ?>" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
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
        <?php $this->load->view("_partials/footer") ?>
        <?php $this->load->view("_partials/foot") ?>

    </div>
    <!-- /.content-wrapper -->

    <script>
        $(document).ready(function() {
            $('#main_table').DataTable();
        });
    </script>

</body>

</html>