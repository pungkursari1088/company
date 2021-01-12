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
    </style>
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
                            <h1>Overview</h1>
                        </div>

                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-9">
                        <div>
                            <?php echo '<pre>' . var_export($results, true) . '</pre>'; ?>
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