<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Topic and Tick</title>
    <link rel="stylesheet" href="attendance_form.css">
    <link rel="stylesheet" href="plugins/bootstrap.css">
    <script src="plugins/loader.js"></script>
    <link rel="stylesheet" href="plugins/loader.css" />
    <link rel="stylesheet" src="plugins/center-simple.css" />
</head>
<body>
    <div style="top: 10px;" id="submitpage" class="d-block position-absolute top-2 shadow w-50">Class Attendance Marked!</div>
        <div style="border : 5px solid #ab1316; display: none;" class="container form ">
            <form id="admissionForm" method="post" action="#" class="row g-3 needs-validation" novalidate>
                <div class="row mt-5 d-flex justify-content-center align-items-center">
                    <div class="col-md-9">
                        <label for="validationCustom07" id="dynamicDropdown" class="form-label">Time</label>
                        <select class="form-select time" name="time" id="validationCustom07" required>
                            <option selected disabled value="">timing ...</option>
                            <?php include 'dropdownformodule.php';  dynamic_option_time(); ?>
                        </select>
                        <div class="invalid-feedback">Please select a valid Time.</div>
                    </div>
                </div>
                <div class="row mt-1 d-flex justify-content-center align-items-center">
                    <div class="col-md-9">
                    <label for="validationCustom08" class="form-label">Class</label>
                        <select class="form-select class" name="class" id="validationCustom08" required>
                            <option selected  value="">Class ...</option>
                        </select>
                        <div class="invalid-feedback">Please select a valid class room.</div>
                    </div>
                </div>
                <div class="row mt-1 d-flex justify-content-center align-items-center">
                    <div class="col-md-9">
                    <label for="validationCustom09" class="form-label">Seat</label>
                        <select class="form-select class" name="seat" id="validationCustom09" required>
                            <option selected  value="">seat ...</option>
                        </select>
                        <div class="invalid-feedback">Please select a valid class room.</div>
                    </div>
                </div>
                <div class="mt-4 container text-center" id="validationCustom10">
                </div>
                <div class="row mt-4 mb-4 text-center">
                    <div class="col-12">
                        <button  class="btn btn-primary" id="Att-submit" name="Att-submit" type="submit" value="Att-submit">
                            Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Problem</h5>
                    </div>
                    <div class="modal-body">
                        <h6 class="modal-body-h1">Error Occured</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Ok</button>
                    </div>
                </div>
            </div>
        </div>
        <script src="plugins/jquery-3.7.1.min.js"></script>
        <script>
            $('document').ready(function () {
                $('#validationCustom07').change(function () {
                    let timeid = $(this).val();
                    $.ajax({
                        url: 'dropdownformodule.php',
                        type: 'POST',
                        data: { time_change_value: timeid },
                        success: function (response) {
                            $('#validationCustom08').html(response);
                        }
                    });
                });

                $('#validationCustom08').change(function () {
                    let timeid = $('#validationCustom07').val();
                    let classid = $(this).val();
                    $.ajax({
                        url: 'dropdownformodule.php',
                        type: 'POST',
                        data: { time_change: timeid, class_change_value: classid },
                        success: function (response) {
                            $('#validationCustom09').html(response);
                        }
                    });
                });

                $('#validationCustom09').change(function () {
                    let timeid = $('#validationCustom07').val();
                    let classid = $('#validationCustom08').val();
                    let seatid = $(this).val();
                    $.ajax({
                        url: 'dropdownformodule.php',
                        type: 'POST',
                        data: { time_changed: timeid, class_changed_value: classid ,seat_changed: seatid},
                        success: function (response) {
                            $('#validationCustom10').html(response);
                        }
                    });
                });

                $('form').submit(function (event) {
                    if ($(this)[0].checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                        $(this).addClass('was-validated');
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
        </script>            
    <script src="plugins/bootstrap.js"></script>
</body>
</html>
<?php 
if (isset($_POST["Att-submit"])) {
    include('connection.php');
    $success = true;
    $time = mysqli_real_escape_string($conn,$_POST['time']);
    $class = mysqli_real_escape_string($conn,$_POST['class']);
    $seat = mysqli_real_escape_string($conn,$_POST['seat']);
    $topics = $_POST['topicvalue'];
    $selectstudentdetail = "SELECT student.id , student.course
                FROM student
                INNER JOIN reserved_seats ON reserved_seats.timeid = student.timeid AND reserved_seats.classid = student.classid AND reserved_seats.seat_number = student.seat_number
                WHERE student.timeid = $time AND student.classid = $class AND student.seat_number = $seat AND stage_id = 1 AND reserved_seats.reserved = 1;";
    $result1 = mysqli_query($conn,$selectstudentdetail);
    if($result1 && $result1->num_rows > 0){
        $row = $result1->fetch_assoc();
        $id = $row['id'];
        $course = $row['course'];
        foreach ($topics as $topic) {
            $fields = explode(',', $topic);
            $value = $fields[0];
            $field = $fields[1];
            $insertvaluequery = "UPDATE `$course` SET $field = $value where id = $id;";
            if(!mysqli_query($conn,$insertvaluequery)){
                $success = false;
                echo mysqli_error($conn);
            } else {
                echo '<script>
                    $(document).ready(function () {
                        $(".modal-title").text("Success!");
                        $(".modal-body-h1").text(`"Your Course Topic Complete Updation is Successfully Update"`);
                        $("#exampleModal").modal("show");
                    });
                </script>';
            }
        }
    }
    
    
}
?>
