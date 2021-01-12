<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/report/pdf.css'); ?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div id="payslip">
        <div id="title">Gaji Pegawai</div>
        <div class="details">
            <div class="scope">
                <div class="entry">
                    <div class="float-left">Nama</div>
                    <div class="float-center">:</div>
                    <div class="float-right"><?php echo $user->user_name ?></div>
                </div>
                <div class="entry">
                    <div class="float-left">Email</div>
                    <div class="float-center">:</div>
                    <div class="float-right"><?php echo $user->user_email ?></div>
                </div>
                <div class="entry">
                    <div class="float-left">Tanggal Gabung</div>
                    <div class="float-center">:</div>
                    <div class="float-right"><?php echo $user->start_join_company ?></div>
                </div>
                <div class="entry">
                    <div class="float-left">Gaji Bulan</div>
                    <div class="float-center">:</div>
                    <div class="float-right"><?php echo $amount->date ?></div>
                </div>
            </div>

            <div class="scope mt-2">
                <div class="d-flex  mt-4">
                    <div id="label" class="p-1 bd-highlight">Gaji Pokok</div>
                    <div id="rate" class="p-1 bd-highlight"><?php echo $absences->work_hours ?>@Rp90.000/jam</div>
                    <div id="amount" class="p-1 bd-highlight">Rp <?php echo $amount->work_hours ?></div>
                </div>

                <div class="d-flex  mt-4">
                    <div id="label" class="p-1 bd-highlight">Lembur</div>
                    <div id="rate" class="p-1 bd-highlight"><?php echo $absences->overtime_hours ?>@Rp90.000/jam</div>
                    <div id="amount" class="p-1 bd-highlight">Rp <?php echo $amount->overtime_hours ?></div>
                </div>

                <div class="d-flex mt-4">
                    <div id="label" class="p-1 bd-highlight">Cuti</div>
                    <div id="rate" class="p-1 bd-highlight"><?php echo $working_permits->total_leave_day ?>@Rp90.000/jam</div>
                    <div id="amount" class="p-1 bd-highlight">Rp <?php echo $amount->total_leave_day ?></div>
                </div>

                <div class="d-flex mt-4">
                    <div id="label" class="p-1 bd-highlight">Penalty</div>
                    <div id="rate" class="p-1 bd-highlight"><?php echo $absences->penalty_hours ?>@Rp30.000/jam</div>
                    <div id="amount" class="p-1 bd-highlight">Rp <?php echo $amount->penalty_hours ?></div>
                </div>
            </div>
            <div class="scope mt-2">
                <div class="d-flex mt-4">
                    <div id="label" class="p-1 bd-highlight">Total</div>
                    <div id="amount" class="p-1 bd-highlight">Rp <?php echo $amount->total ?></div>
                </div>
            </div>

        </div>
    </div>

    <footer>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </footer>

    <script type="text/javascript">
        window.addEventListener("load", window.print());
    </script>
</body>

</html>