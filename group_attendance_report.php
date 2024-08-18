<?php
include("connection.php");
if (isset($_POST['check'])) {
    if (isset($_POST['_time']) && isset($_POST['_class']) && isset($_POST['time_range'])) {
        $time = $_POST['_time'];
        $class = $_POST['_class'];
        $currentDate = date('Y-m-d');
        $time_range = $_POST['time_range'];
        $subtraction_time = date('Y-m-d', strtotime('-' . $time_range, strtotime($currentDate)));
        $time = mysqli_real_escape_string($conn, $time);
        $class = mysqli_real_escape_string($conn, $class );
        $sql = "SELECT 
            student.id,
            student.name,
            student.father_name,
            class_time.timing,
            class.class,
            seat.seatno,
            student.date ,
            student_stage.stage ,
            COUNT(CASE WHEN attendance.status = 'present' THEN 1 END) AS present,
            COUNT(CASE WHEN attendance.status = 'absent' THEN 1 END) AS absent
            FROM student
            INNER JOIN attendance ON attendance.student_id = student.id
            INNER JOIN student_stage ON student_stage.id = student.stage_id
        INNER JOIN class_time ON class_time.id = student.timeid
        INNER JOIN class ON class.id = student.classid
        INNER JOIN seat ON seat.id = student.seat_number
        WHERE student.timeid = $time && student.classid = $class AND attendance.date BETWEEN '$subtraction_time' AND '$currentDate'
        GROUP by student.id
        ORDER BY student.id ASC;";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="plugins/loader.js"></script>
    <link rel="stylesheet" href="plugins/loader.css" />
    <link rel="stylesheet" src="plugins/center-simple.css" />
    <link rel="stylesheet" href="plugins/datatables.css">
    <link rel="stylesheet" href="plugins/datatables.min.css">
    <link rel="stylesheet" href="plugins/bootstrap.css">
    <link rel="stylesheet" href="group_attendance_report.css" >
    <script src="plugins/datatables.min.js"></script>
</head>
<body style="height: 100vh; display: flex; flex-direction: column; justify-content: space-evenly; align-items: center;" class="group-attendance text-center">
    <div class="container mt-4">
        <div class="row">
            <div class="col-12 text-center">
                <h1>Student Report</h1>
            </div>
        </div>
        <br>
        
        <div class="row">
            <div class="col">
            <table class="table table-bordered table-striped text-center " id="table">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Father Name</th>
                        <th>Timing</th>
                        <th>Class</th>
                        <th>Seat Number</th>
                        <th>Date of Admissoin</th>
                        <th>Status</th>
                        <th>Total Present</th>
                        <th>Total Absent</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = mysqli_query($conn, $sql);
                
                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td class='align-middle'>{$row['id']}</td>
                                <td class='align-middle'>{$row['name']}</td>
                                <td class='align-middle'>{$row['father_name']}</td>
                                <td class='align-middle'>{$row['timing']}</td>
                                <td class='align-middle'>{$row['class']}</td>
                                <td class='align-middle'>{$row['seatno']}</td>
                                <td class='align-middle'>{$row['date']}</td>
                                <td class='align-middle'>{$row['stage']}</td>
                                <td class='align-middle'>{$row['present']}</td>
                                <td class='align-middle'>{$row['absent']}</td>
                                </td>
                            </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='8'>No records found</td></tr>";
                        }
            } else {
                ?>
                    <script>
                        alert("<?php echo mysqli_error($conn) ?>");
                    </script>
                <?php
            }
                }
                
                mysqli_close($conn);
                ?>
                </tbody>
            </table>
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
                        <svg xmlns="http://www.w3.org/2000/svg" width="45" height="23" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                        <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1"/>
                        <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1"/>
                        </svg>
                        Print
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script src="plugins/datatables.min.js"></script>
    <script src="plugins/jquery-3.7.1.min.js"></script>
    <script>
    let table = new DataTable('#table');
    $(window).on("load", function() {
        setInterval(() => {
            $(".pace").hide();
        }, 500);
    });
    $(document).ready(function() {
        
        $(".pace").show();
        $('#back').click(function () {
            window.location.href = "gorup_attendance.php";
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