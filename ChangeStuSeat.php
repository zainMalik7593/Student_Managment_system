<script src="plugins/jquery-3.7.1.min.js"></script>

<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Student Data</title>
        <script src="plugins/jquery-3.7.1.min.js"></script>
        <link rel="stylesheet" href="plugins/bootstrap.css">
        <script src="plugins/loader.js"></script>
        <link rel="stylesheet" href="plugins/loader.css" />
        <link rel="stylesheet" src="plugins/center-simple.css" />
        <link rel="stylesheet" href="attendance_form.css">
    </head>

<body>
    <div style="top: 10px;" id="submitpage" class="d-block position-absolute top-2 shadow w-50">Change Student Status!</div>
    <div style="border : 5px solid #ab1316; display: none;" class="container form mt-5">
        <form id="admissionForm" action="#" class="row g-3 needs-validation" method="post">
            <div class="row mt-5 d-flex justify-content-center align-items-center">
                <div class="col-md-9">
                    <label for="validationCustom01" id="dynamicDropdown" class="form-label">Time</label>
                    <select class="form-select time" name="from_time" id="validationCustom01" required>
                        <option selected disabled value="">Select Timing...</option>
                        <?php include 'dropdownForChangingStatus&Seat.php'; dynamic_option_time2(); ?>
                    </select>
                    <div class="invalid-feedback">Please select a valid Time.</div>
                </div>
            </div>
            <div class="row mt-1 d-flex justify-content-center align-items-center">
                <div class="col-md-9">
                    <label for="validationCustom02" class="form-label">Class</label>
                    <select class="form-select class" name="from_class" id="validationCustom02" required>
                        <option selected disabled value="">Select Class...</option>
                    </select>
                    <div class="invalid-feedback">Please select a valid class.</div>
                </div>
            </div>

            <div class="row mt-1 d-flex justify-content-center align-items-center">
                <div class="col-md-9">
                    <label for="validationCustom03" class="form-label">Seat</label>
                    <select class="form-select seat" name="from_seat" id="validationCustom03" required>
                        <option selected disabled value="">Select Seat...</option>
                    </select>
                    <div class="invalid-feedback">Please select a valid seat.</div>
                </div>
            </div>

            <div class="row mt-1 d-flex justify-content-center align-items-center">
                <div class="col-md-9">
                    <label for="validationCustom04" class="form-label">What status</label>
                    <select class="form-select status" name="from_status" id="validationCustom04" required>
                        <option selected disabled value="">Select Status...</option>
                    </select>
                    <div class="invalid-feedback">Please select a valid seat.</div>
                </div>
            </div>

            <div class="row mt-1 d-flex justify-content-center align-items-center">
                <div class="col-md-9">
                    <label for="validationCustom05" id="" class="form-label">Time</label>
                    <select class="form-select time" name="to_time" id="validationCustom05" required>
                        <option selected disabled value="">Select Timing...</option>
                        <?php include 'dropdown.php'; dynamic_option_time("timeid", "timing"); ?>
                    </select>
                    <div class="invalid-feedback">Please select a valid Time.</div>
                </div>
            </div>
            <div class="row mt-1 d-flex justify-content-center align-items-center">
                <div class="col-md-9">
                    <label for="validationCustom06" class="form-label">Class</label>
                    <select class="form-select class" name="to_class" id="validationCustom06" required>
                        <option selected disabled value="">Select Class...</option>
                    </select>
                    <div class="invalid-feedback">Please select a valid class.</div>
                </div>
            </div>

            <div class="row mt-1 d-flex justify-content-center align-items-center">
                <div class="col-md-9">
                    <label for="validationCustom07" class="form-label">Seat</label>
                    <select class="form-select seat" name="to_seat" id="validationCustom07" required>
                        <option selected disabled value="">Select Seat...</option>
                    </select>
                    <div class="invalid-feedback">Please select a valid seat.</div>
                </div>
            </div>

            <div class="row mt-3 mb-4 d-flex justify-content-center align-items-center">
                <div class="col-12 mt-2  text-center">
                    <button class="btn btn-primary" id="submit" name="submit" type="submit" value="submit">complete course
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title  modal-title1" id="exampleModalLabel1">Problem</h5>
            </div>
            <div class="modal-body">
                <h6 class="modal-body-h1">Error Occure</h6>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Ok</button>
            </div>
            </div>
        </div>
    </div>
    <script>
        // dosry dropdown k liye dosra ajax requestain bany gi
        $(document).ready(function () {
            $('#validationCustom01').change(function () {
                let timeid = $(this).val();
                $.ajax({
                    url: 'dropdownForChangingStatus&Seat.php',
                    type: 'POST',
                    data: { time_change_value: timeid },
                    success: function (response) {
                        $('#validationCustom02').html(response);
                    }
                });
            });
    
            $('#validationCustom02').change(function () {
                let timeid = $('#validationCustom01').val();
                let classid = $(this).val();
                $.ajax({
                    url: 'dropdownForChangingStatus&Seat.php',
                    type: 'POST',
                    data: { time_change: timeid, class_change_value: classid },
                    success: function (response) {
                        $('#validationCustom03').html(response);
                    }
                });
            });

            $('#validationCustom03').change(function () {
                let timeid = $('#validationCustom01').val();
                let classid = $('#validationCustom02').val();
                let seatid = $(this).val();
                $.ajax({
                    url: 'dropdownForChangingStatus&Seat.php',
                    type: 'POST',
                    data: { time_changed: timeid, class_changed_value: classid ,seat_change: seatid},
                    success: function (response) {
                        $('#validationCustom04').html(response);
                    }
                });
            });

            $('#validationCustom05').change(function () {
                let timeid2 = $(this).val();
                $.ajax({
                    url: 'dropdown.php',
                    type: 'POST',
                    data: { time_change_value: timeid2 },
                    success: function (response) {
                        $('#validationCustom06').html(response);
                    }
                });
            });
    
            $('#validationCustom06').change(function () {
                let timeid2 = $('#validationCustom05').val();
                let classid2 = $(this).val();
                $.ajax({
                    url: 'dropdown.php',
                    type: 'POST',
                    data: { time_change: timeid2, class_change_value: classid2 },
                    success: function (response) {
                        $('#validationCustom07').html(response);
                    }
                });
            });

            

            $(window).on("load", function() {
                setInterval(() => {
                    $(".pace").hide();
                }, 500);
            });

            $(document).ready(function() {
                $(".pace").show();
            });

            $(".form").slideDown(1000);

        });
        $('form').submit(function (event) {
            if ($(this)[0].checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
                $(this).addClass('was-validated');
            }
        });
    </script>
    <script src="plugins/bootstrap.js"></script>
</body>
</html>
<?php
    if (isset($_POST['submit'])) {
        include("connection.php");
        global $conn;

        $fromtime = mysqli_real_escape_string($conn,$_POST['from_time']);
        $fromclass = mysqli_real_escape_string($conn,$_POST['from_class']);
        $fromseat = mysqli_real_escape_string($conn,$_POST['from_seat']);
        $fromstatus = mysqli_real_escape_string($conn,$_POST['from_status']);
        $totime = mysqli_real_escape_string($conn,$_POST['to_time']);
        $toclass = mysqli_real_escape_string($conn,$_POST['to_class']);
        $toseat = mysqli_real_escape_string($conn,$_POST['to_seat']);
        $fields = explode(',', $fromstatus);
        $status = $fields[0];
        $id = $fields[1];
        if ($status == 4) {
            $sql = "UPDATE student set timeid = $totime , classid = $toclass , seat_number = $toseat WHERE timeid = $fromtime AND classid = $fromclass AND seat_number = $fromseat AND stage_id = $status AND id = $id;";
            $query_execute = mysqli_query($conn,$sql) ;
            if ($query_execute) {
                echo '<script>
                        $(document).ready(function () {
                            $(".modal-title").text("Success!");
                            $(".modal-body-h1").text("Seat change with Freez status");
                            $("#exampleModal1").modal("show");
                        });
                    </script>';
            }   else {
                echo mysqli_error($conn);
            }

        }   elseif ($status == 1) {
            $sql1 = "UPDATE student SET timeid = $totime , classid = $toclass , seat_number = $toseat WHERE timeid = $fromtime AND classid = $fromclass AND seat_number = $fromseat AND stage_id = $status AND id = $id;";
            $sql2 = "UPDATE reserved_seats SET reserved = 0 WHERE  reserved_seats.timeid = $fromtime AND reserved_seats.classid = $fromclass AND reserved_seats.seat_number = $fromseat;";
            $sql3 = "UPDATE reserved_seats SET reserved = 1 WHERE  reserved_seats.timeid = $totime AND reserved_seats.classid = $toclass AND reserved_seats.seat_number = $toseat;";

            $query_execute1 = mysqli_query($conn,$sql1);
            $query_execute3 = mysqli_query($conn,$sql3);
            $query_execute2 = mysqli_query($conn,$sql2);
            if ($query_execute1 && $query_execute2 && $query_execute3) {
                $query_execute = true;
            }
            
            if ($query_execute) {
                echo '<script>
                        $(document).ready(function () {
                            $(".modal-title").text("Success!");
                            $(".modal-body-h1").text("seat change with continue status");
                            $("#exampleModal1").modal("show");
                        });
                    </script>';
            }   else {
                echo mysqli_error($conn);
            }
        }
        

        mysqli_close($conn);
        }

        ?>
