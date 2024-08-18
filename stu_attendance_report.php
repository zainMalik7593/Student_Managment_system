<?php
if (isset($_POST['check'])) {
    include("connection.php");
    if (isset($_POST['_time']) && isset($_POST['_class']) && isset($_POST['_seat']) && isset($_POST['time_range'])) {
        $time = $_POST['_time'];
        $class = $_POST['_class'];
        $seat = $_POST['_seat'];
        $currentDate = date('Y-m-d');
        $time_range = $_POST['time_range'];
        $subtraction_time = date('Y-m-d', strtotime('-' . $time_range, strtotime($currentDate)));
        
        // Escape the input data to prevent SQL injection
        $time = mysqli_real_escape_string($conn, $time);
        $class = mysqli_real_escape_string($conn, $class );
        $seat = mysqli_real_escape_string($conn, $seat);
        
        $sql = "SELECT distinct
                    student.id,
                    class_time.timing,
                    class.class,
                    seat.seatno
                    FROM (SELECT student.id, student.timeid, student.classid , student.seat_number FROM student 
                        INNER JOIN attendance ON attendance.student_id = student.id) as student
                INNER JOIN class_time ON class_time.id = student.timeid
                INNER JOIN class ON class.id = student.classid
                INNER JOIN seat ON seat.id = student.seat_number
                WHERE student.timeid = $time AND student.classid = $class AND seat.id = $seat";

        $query_execute = mysqli_query($conn, $sql);
        if ($query_execute) {
            if ($query_execute->num_rows > 0) {
                $student = $query_execute->fetch_assoc();
                $id =  $student['id'];
                $timing =  $student['timing'];
                $class =  $student['class'];
                $seat =  $student['seatno'];
                $end_date = date('Y-m-d');
    
                $attendance_query = "SELECT 
                    COUNT(CASE WHEN attendance.status = 'present' THEN 1 END) AS present_days,
                    COUNT(CASE WHEN attendance.status = 'absent' THEN 1 END) AS absent_days,
                    student.name,
                    student.father_name,
                    class_time.timing
                FROM attendance
                INNER JOIN student ON student.id = attendance.student_id
                INNER JOIN class_time ON class_time.id = student.timeid
                WHERE attendance.student_id = $id AND attendance.date BETWEEN '$subtraction_time' AND '$currentDate';";
    
                $attendance = mysqli_query($conn, $attendance_query);
    
                if ($attendance) {
                    $attendance_count = $attendance->fetch_assoc();
                    $student_id = $id;
                    $name = $attendance_count['name'];
                    $fathername = $attendance_count['father_name'];
                    $timming = $attendance_count['timing'];
                    $present = $attendance_count['present_days'];
                    $absent = $attendance_count['absent_days'];
                    if (isset($student_id) && isset($name) && isset($fathername) && isset($timing) && isset($present) && isset($absent)) {
                        function echofun  ($var){
                            echo $var;
                        }
                    }
                } else {
                    ?>
                        <script>
                            alert("<?php echo mysqli_error($conn) ?>");
                        </script>
                    <?php
                }
                
                
            } else {
                ?>
                        <script>
                            alert('"There is no attendance on this ID."');
                        </script>
                    <?php
            }
} else {
    ?>
        <script>
            alert("<?php echo mysqli_error($conn) ?>");
        </script>
    <?php
}
    }
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="plugins/bootstrap.css">
    <script src="plugins/loader.js"></script>
    <link rel="stylesheet" href="plugins/loader.css" />
    <link rel="stylesheet" src="plugins/center-simple.css" />
    <link rel="stylesheet" href="stu_attendance_report.css" >
    
</head>
<body class="text-center">
    <div class="outer-container container-fluid">
        <div class="inner-container container">
            <div class="row">
                <div class="col-10 text-center">
                    <h1>Student Report</h1>
                </div>
            </div>
            <br>
            
            <div class="row">
                <div class="id me-4 col-4 text-center">
                    <b>ID</b> <br>
                    <p>
                        <?php if (function_exists('echofun')) {
                        echofun($student_id) ;  
                        }  ?>
                    </p>
                </div>
                <div class="timing ms-4 col-4 text-center">
                    <b>Timing</b> <br>
                    <p>
                        <?php if (function_exists('echofun')) {
                        echofun($timing) ;  
                        }  ?>
                    </p>
                </div>
            </div>
            <br>
            <br>
            
            
            <div class="row">
                <div class="name me-4 col-4 text-center">
                    <b>Name</b> <br>
                    <p>
                        <?php if (function_exists('echofun')) {
                        echofun($name) ;  
                        }  ?>
                    </p>
                </div>
                <div class="father ms-4 col-4 text-center">
                    <b>Father</b> <br>
                    <p>
                        <?php if (function_exists('echofun')) {
                        echofun($fathername) ;  
                        }  ?>
                    </p>
                </div>
            </div>
            <br>
            <br>

            <div class="row">
                <div class="id me-4 col-4 text-center">
                    <b>Start range</b> <br>
                    <p>
                        <?php if (function_exists('echofun')) {
                        echofun($subtraction_time) ;  
                        }  ?>
                    </p>
                </div>
                <div class="timing ms-4 col-4 text-center">
                    <b>End range</b> <br>
                    <p>
                        <?php if (function_exists('echofun')) {
                        echofun($currentDate) ;  
                        }  ?>
                    </p>
                </div>
            </div>
            <br>
            <br>

            <div class="row">
                <div class="present me-4 col-4 text-center">
                    <b>Present</b> <br>
                    <p>
                        <?php if (function_exists('echofun')) {
                        echofun($present) ;  
                        }  ?>
                    </p>
                </div>
                <div class=" absent ms-4 col-4 text-center">
                    <b>Absent</b> <br>
                    <p>
                        <?php if (function_exists('echofun')) {
                        echofun($absent) ;  
                        }  ?>
                    </p>
                </div>
            </div>
            
        </div> 
        <div class="container position">
            <div class="row justify-content-around">
                <div class="col-2 text-end">
                    <button class="btn btn-secondary" id="back">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M12.5 15a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5M10 8a.5.5 0 0 1-.5.5H3.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L3.707 7.5H9.5a.5.5 0 0 1 .5.5"/>
                          </svg>
                          back
                    </button>
                </div>
                <div class="col-2 me-5 align-self-start">
                    <button class="btn btn-primary" id="print">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="23" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                        <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1"/>
                        <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1"/>
                        </svg>
                        Print
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <script src="plugins/jquery-3.7.1.min.js"></script>
    <script>
    $(window).on("load", function() {
        setInterval(() => {
            $(".pace").hide();
        }, 500);
    });
    $(document).ready(function() {
        $(".pace").show();
        $('#back').click(function () {
            window.location.href = "stu_record_form.php";
        });
        $('#print').click(function () {
            window.print()
        })
    });
    
    $(".form").slideDown(1000)

    </script>            
    <script src="plugins/bootstrap.js"></script>
</body>
</html>