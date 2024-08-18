<?php
include('connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                        <select class="form-select time" name="_time" id="validationCustom07" required>
                            <option selected disabled value="">timing unreserve...</option>
                            <?php include 'group_attendance_dropdown.php';  dynamic_option_time(); ?>
                        </select>
                        <div class="invalid-feedback">Please select a valid Time.</div>
                    </div>
                </div>
                <div class="row mt-1 d-flex justify-content-center align-items-center">
                    <div class="col-md-9">
                    <label for="validationCustom08" class="form-label">Class</label>
                        <select class="form-select class" name="_class" id="validationCustom08" required>
                            <option selected  value="">Class unreserve...</option>
                        </select>
                        <div class="invalid-feedback">Please select a valid class room.</div>
                    </div>
                </div>
                <div class="mt-4 container text-center" id="validationCustom09">
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
                        url: 'group_attendance_dropdown.php',
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
                        url: 'group_attendance_dropdown.php',
                        type: 'POST',
                        data: { time_change: timeid, class_change_value: classid },
                        success: function (response) {
                            $('#validationCustom09').html(response);
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
if (isset($_POST['Att-submit'])) {
    date_default_timezone_set('Asia/Karachi');
    $time = date('H:i:s');
    $date = date('Y-m-d');
    $timing = $_POST['_time'];
    $class = $_POST['_class'];
    $attendance_checkboxes = $_POST['attendance'];

    foreach ($attendance_checkboxes as $checkbox) {
        $already_exist1 = null;
        $selectid = "SELECT id FROM `student` WHERE timeid = $timing AND classid = $class AND seat_number = $checkbox;";
        $idexecute = mysqli_query($conn, $selectid);

        if ($idexecute) {
            $id1 = $idexecute->fetch_assoc();
            if ($id1) {
                $id = $id1['id'];
            } else {
                echo "No student found with the specified criteria.";
                continue;
            }
        } else {
            echo "Error in select query: " . mysqli_error($conn);
            continue;
        }

        $check_if_this_attendance_id = "SELECT COUNT(id) as count FROM `attendance` WHERE student_id = '$id' && date = '$date';";
        $attendance_checkit = mysqli_query($conn, $check_if_this_attendance_id);
        if ($attendance_checkit === false) {
            echo "Error: " . mysqli_error($conn);
        } else {
            $let_check_attendance_exist = $attendance_checkit->fetch_assoc();
            if($let_check_attendance_exist['count'] > 0){
                $already_exist1 = true;
            }else {
                $already_exist1 = false;
            }

            if ($already_exist1 === false) {
                $sql = "INSERT INTO attendance (student_id, date, time, status) VALUES ($id, '$date', '$time', 'present')";
                if (mysqli_query($conn, $sql) === TRUE) {
                    echo '<script>
                        $(document).ready(function () {
                            $(".modal-title").text("Attendance marked successfully!");
                            $(".modal-body-h1").text("Your attendance has been marked today.");
                            $("#exampleModal").modal("show");
                        });
                    </script>';
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else if ($already_exist1) {
                $checkForUpdate = "SELECT status, date as count FROM `attendance` WHERE student_id = '$id' && date = '$date';";
                $collectUpdateData = mysqli_query($conn,$checkForUpdate);
                if ($collectUpdateData && $collectUpdateData->num_rows > 0) {
                    $updating_data = $collectUpdateData->fetch_assoc();
                    if($updating_data['status'] === 'present'){
                                echo '<script>
                                    $(document).ready(function () {
                                        $(".modal-title").text("Updating not Available!");
                                        $(".modal-body-h1").text("To update your attendance, please go to the Attendance Update tab and update it from there.");
                                        $("#exampleModal").modal("show");
                                    });
                                </script>';
                    } elseif ($updating_data['status'] === 'absent') {
                        $update_absent = "UPDATE `attendance` SET `status` = 'present', `time` = '$time' WHERE `student_id` = $id and `date` = '$date'";
                            if (mysqli_query($conn, $update_absent) === TRUE) {
                                echo '<script>
                                    $(document).ready(function () {
                                        $(".modal-title").text("Update Your Attendance!");
                                        $(".modal-body-h1").text("Your attendance was marked, but it has been updated.");
                                        $("#exampleModal").modal("show");
                                    });
                                </script>';
                            }
                    }
                } else {                  
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
                

                
            }
        }
    }

    $is_database_entry = null;
    $after_time_attendance_marked = null;
    $before_time_attendance_marked = null;
    $students_sql = "SELECT student.id, class_time.start_time, class_time.end_time 
                    FROM student 
                    INNER JOIN class_time 
                    ON student.timeid = class_time.id;";
    $students_result = $conn->query($students_sql);

    if ($students_result && $students_result->num_rows > 0) {
        while ($student = $students_result->fetch_assoc()) {
            $student_id2 = $student['id'];
            $start_time = $student['start_time'];
            $end_time = $student['end_time'];

            $attendance_sql = "SELECT * FROM attendance WHERE student_id = $student_id2 AND date = '$date'";
            $attendance_result = $conn->query($attendance_sql);

            if ($attendance_result && $attendance_result->num_rows > 0) {
                $attendance = $attendance_result->fetch_assoc();
                $is_database_entry = true;
                $marked_time = $attendance['time'];
                $status2 = $attendance['status'];

                if ($marked_time > $end_time && $status2 == 'present') {
                    $update_sql = "UPDATE attendance SET status = 'absent' WHERE id = " . $attendance['id'];
                    $conn->query($update_sql);
                    $after_time_attendance_marked = true;
                } elseif ($marked_time < $start_time && $status2 == 'present') {
                    $update_sql = "UPDATE attendance SET status = 'absent' WHERE id = " . $attendance['id'];
                    $conn->query($update_sql);
                    $before_time_attendance_marked = true;
                }
            } else if ($is_database_entry == null) {
                if ($time > $end_time) {
                    $insert_sql = "INSERT INTO attendance (student_id, date, time, status) VALUES ($student_id2, '$date', '$end_time', 'absent')";
                    $conn->query($insert_sql);
                } else {
                    continue;
                }
            }
        }
    }
    
    if ($after_time_attendance_marked) {
        echo '<script>
            $(document).ready(function () {
                $(".modal-title").text("Absence Due to Late Attendance!");
                $(".modal-body-h1").text("You marked your attendance after the allowed time, so you have been marked absent.");
                $("#exampleModal").modal("show");
            });
        </script>';
    }

    if ($before_time_attendance_marked) {
        echo '<script>
            $(document).ready(function () {
                $(".modal-title").text("Update your attendance on time");
                $(".modal-body-h1").text("Attendance has been marked early, so you have been marked absent. Please update your attendance on time, otherwise, it will remain marked as absent.");
                $("#exampleModal").modal("show");
            });
        </script>';
    }

}
$conn->close();
?>
