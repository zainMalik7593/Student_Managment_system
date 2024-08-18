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
    <div style="border : 5px solid #ab1316; display: none;" class="container form ">
        <form id="admissionForm" action="#" class="row g-3 needs-validation" method="post">
            <div class="row mt-5 d-flex justify-content-center align-items-center">
                <div class="col-md-9">
                    <label for="validationCustom01" id="dynamicDropdown" class="form-label">Time</label>
                    <select class="form-select time" name="time" id="validationCustom01" required>
                        <option selected disabled value="">Select Timing...</option>
                        <?php include 'dropdownForChangingStatus&Seat.php'; dynamic_option_time2(); ?>
                    </select>
                    <div class="invalid-feedback">Please select a valid Time.</div>
                </div>
            </div>
            <div class="row mt-1 d-flex justify-content-center align-items-center">
                <div class="col-md-9">
                    <label for="validationCustom02" class="form-label">Class</label>
                    <select class="form-select class" name="class" id="validationCustom02" required>
                        <option selected disabled value="">Select Class...</option>
                    </select>
                    <div class="invalid-feedback">Please select a valid class.</div>
                </div>
            </div>

            <div class="row mt-1 d-flex justify-content-center align-items-center">
                <div class="col-md-9">
                    <label for="validationCustom03" class="form-label">Seat</label>
                    <select class="form-select seat" name="seat" id="validationCustom03" required>
                        <option selected disabled value="">Select Seat...</option>
                    </select>
                    <div class="invalid-feedback">Please select a valid seat.</div>
                </div>
            </div>

            <div class="row mt-1 d-flex justify-content-center align-items-center">
                <div class="col-md-9">
                    <label for="validationCustom04" class="form-label">From Status</label>
                    <select class="form-select status" name="from_status" id="validationCustom04" required>
                        <option selected disabled value="">Select Status...</option>
                    </select>
                    <div class="invalid-feedback">Please select a valid seat.</div>
                </div>
            </div>

            <div class="row mt-1 d-flex justify-content-center align-items-center">
                <div class="col-md-9">
                    <label for="validationCustom05" class="form-label">Changing Status</label>
                    <select class="form-select status" name="to_status" id="validationCustom05" required>
                        <option selected disabled value="">Select Status...</option>
                    </select>
                    <div class="invalid-feedback">Please select a valid seat.</div>
                </div>
            </div>


            <div class="row mt-4 mb-4 d-flex justify-content-center align-items-center">
                <div class="col-12 mt-2 mb-2 text-center">
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

            $('#validationCustom04').change(function () {
                let timeid = $('#validationCustom01').val();
                let classid = $('#validationCustom02').val();
                let seatid = $('#validationCustom03').val();
                let fromstatus = $(this).val();
                $.ajax({
                    url: 'dropdownForChangingStatus&Seat.php',
                    type: 'POST',
                    data: { time_changed_sts: timeid, class_changed_value_sts: classid ,seat_change_sts: seatid , fromstatus : fromstatus},
                    success: function (response) {
                        $('#validationCustom05').html(response);
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
include("connection.php");
    global $conn;

if (isset($_POST['submit'])) {
$time = $_POST['time'];
$class = $_POST['class'];
$seat = $_POST['seat'];
$fromstatus = $_POST['from_status'];
$tostatus = $_POST['to_status'];
$fields = explode(',', $fromstatus);
$status = $fields[0];
if ($status == 4) {
    $sqlselectquery = "SELECT student.id, student.stage_id 
            FROM `student`
            INNER JOIN reserved_seats ON student.timeid = reserved_seats.timeid AND student.classid = reserved_seats.classid AND student.seat_number = reserved_seats.seat_number
            WHERE student.timeid = $time AND student.classid = $class AND student.seat_number = $seat AND student.stage_id = 1;";
    $executequery = mysqli_query($conn,$sqlselectquery);
    if ($executequery && $executequery->num_rows > 0) {
            echo '<script>
                    $(document).ready(function () {
                        $(".modal-title").text("Alert : You can not unfreez seat!");
                        $(".modal-body-h1").text(`"your seat already reserved please change your seat or you can  change reserved seat"`);
                        $("#exampleModal1").modal("show");
                    });
                </script>';
        }   else {
            $sql1 = "UPDATE student set stage_id = 1 WHERE timeid = $time AND classid = $class AND seat_number = $seat;";
            $sql2 = "UPDATE reserved_seats SET reserved = 1 WHERE timeid = $time  AND classid = $class AND seat_number = $seat ; ";
            $update1 = mysqli_query($conn,$sql1);
            $update2 = mysqli_query($conn,$sql2);
            if ($update1 && $update2) {
                $unfreez = true;
            }else {
                echo mysqli_error($conn);
            }
            if ($unfreez) {
                echo '<script>
                        $(document).ready(function () {
                            $(".modal-title").text("Success!");
                            $(".modal-body-h1").text(`"Your seat is Successfully Unfreez"`);
                            $("#exampleModal1").modal("show");
                        });
                    </script>';
            }   
        }
    } elseif ($status == 1) {
    if ($tostatus == 2) {
        $needalert = false;
        $sql = "SELECT DISTINCT student.id,student.course
                    FROM reserved_seats 
                    INNER JOIN student ON student.timeid = reserved_seats.timeid AND student.classid = reserved_seats.classid AND student.seat_number = reserved_seats.seat_number 
                    WHERE reserved_seats.timeid = $time AND reserved_seats.classid = $class AND reserved_seats.seat_number = $seat AND reserved = 1 AND student.stage_id = 1
                    ORDER BY id ASC;";
        $result = mysqli_query($conn,$sql);
        if ($result && $result->num_rows > 0) {
            $row1 = $result->fetch_assoc();
            $studentid = $row1['id'];
            $studentcourse = $row1['course'];
            $logicalquery2 = " SELECT COLUMN_NAME  AS column_name
                                FROM INFORMATION_SCHEMA.COLUMNS 
                                WHERE TABLE_NAME = '$studentcourse' 
                                AND TABLE_SCHEMA = 'simsat' 
                                AND DATA_TYPE IN ('tinyint', 'boolean');";
            $result2 = mysqli_query($conn, $logicalquery2);
            if ($result2->num_rows > 0) {
                while ($row2 = $result2->fetch_assoc()) {
                    $courseTopicName = $row2['column_name'];
                    $logicalquery3 = "SELECT '$courseTopicName' AS column_name FROM `$studentcourse` WHERE $courseTopicName = 0 AND id = $studentid";
                    $result3 = mysqli_query($conn, $logicalquery3);
                        if ($result3->num_rows > 0) {
                            $needalert = true;
                        } else {
                            $sql1 = "UPDATE student set stage_id = $tostatus WHERE timeid = $time AND classid = $class AND seat_number = $seat;";
                            $sql2 = "UPDATE reserved_seats SET reserved = 0 WHERE timeid = $time  AND classid = $class AND seat_number = $seat ; ";
                            $update1 = mysqli_query($conn,$sql1);
                            $update2 = mysqli_query($conn,$sql2);
                            if ($update1 && $update2) {
                                $executeupdation = true;
                            }else {
                                echo mysqli_error($conn);
                            }
                            if ($executeupdation) {
                                echo '<script>
                                        $(document).ready(function () {
                                            $(".modal-title").text("Success!");
                                            $(".modal-body-h1").text(`"Your Status is Successfully Update"`);
                                            $("#exampleModal1").modal("show");
                                        });
                                    </script>';
                            }   
                        }
                    }
                    if ($needalert) {
                        echo '<script>
                                $(document).ready(function () {
                                    $(".modal-title").text("Alert!");
                                    $(".modal-body-h1").text(`"Your course is not complete because you did not cover some topics."`);
                                    $("#exampleModal1").modal("show");
                                });
                            </script>';
                    }
                }
            }
        
        } elseif($tostatus != 2) {
            $sql1 = "UPDATE student set stage_id = $tostatus WHERE timeid = $time AND classid = $class AND seat_number = $seat;";
            $sql2 = "UPDATE reserved_seats SET reserved = 0 WHERE timeid = $time  AND classid = $class AND seat_number = $seat ; ";
            $update1 = mysqli_query($conn,$sql1);
            $update2 = mysqli_query($conn,$sql2);
            if ($update1 && $update2) {
                $executeupdation = true;
            }else {
                echo mysqli_error($conn);
            }
            if ($executeupdation) {
                echo '<script>
                        $(document).ready(function () {
                            $(".modal-title").text("Success!");
                            $(".modal-body-h1").text(`"Your Status is Successfully Update"`);
                            $("#exampleModal1").modal("show");
                        });
                    </script>';
            }   
        }
    }

}
        mysqli_close($conn);

        ?>
        