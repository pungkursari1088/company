<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("_partials/head.php") ?>
    <!-- calendar -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/plugins/fullcalendar/fullcalendar.css'; ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css'; ?>">
    <!-- sweet alert -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/sweetalert2.min.css'; ?>">
    <style>
        h2 {
            font-size: 16pt;
            font-weight: bold;
        }

        .card-title {
            font-size: 20pt;
            font-weight: bold;
        }

        .head-news {
            font-size: 30pt;
            font-weight: bold;
        }

        .card-custom {
            margin-bottom: 15px;
            overflow: hidden;
            min-height: 200px;
            box-shadow: 0 0 15px rgba(10, 10, 10, 0.3);
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">


    <!-- wrapper -->
    <div class="wrapper">
        <?php $this->load->view("_partials/navbar") ?>
        <?php $this->load->view("employee/_partials/sidebar") ?>

        <!-- Main content -->
        <section class="content-wrapper">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-9 p-4">
                        <label class="head-news">Portal Berita</label>
                        <div>
                            <?php foreach ($news as $new) : ?>
                                <div class="card card-custom bg-white border-white border-0">
                                    <div class="card-body">
                                        <h3 class="card-title"><?php echo $new->title ?></h3>
                                        <p class="card-text"><?php echo $new->description ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="row">
                            <div class="col center">
                                <!--Tampilkan pagination-->
                                <?php echo $links; ?>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-3">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->


        <!-- Sticky Footer -->
        <?php $this->load->view("_partials/foot") ?>
        <?php $this->load->view("_partials/footer") ?>
        <!-- calendar -->
        <script type="text/javascript" src="<?php echo base_url() . 'assets/js/calendar/moment.min.js'; ?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . 'assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js'; ?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . 'assets/plugins/fullcalendar/fullcalendar.js'; ?>"></script>
        <!-- sweet alert -->
        <script type="text/javascript" src="<?php echo base_url() . 'assets/js/sweetalert2.min.js'; ?>"></script>
    </div>
    <!-- /.content-wrapper -->
    <script>
        var events = <?php echo json_encode($results) ?>;
        //Date for the calendar events (dummy data)
        var date = new Date()
        var d = date.getDate(),
            m = date.getMonth(),
            y = date.getFullYear()

        $(document).ready(function() {
            //set fullcalendar height property
            $('#calendar').fullCalendar({
                //options
                selectable: true,
                events: events,
                eventClick: function(event, jsEvent, view) {
                    Swal.fire(
                        event.title,
                        event.description,
                        'info'
                    )
                }
            });
        })
    </script>
</body>

</html>