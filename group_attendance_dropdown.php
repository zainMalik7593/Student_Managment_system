<?php
include("connection.php");

if (isset($_POST['time_change_value'])) {
    $time_change_value = intval($_POST['time_change_value']);
    dynamic_option_class($time_change_value);
} elseif (isset($_POST['time_change']) && isset($_POST['class_change_value'])) {
    $time_change = intval($_POST['time_change']);
    $class_change_value = intval($_POST['class_change_value']);
    dynamic_check_boxes($time_change, $class_change_value);
}



function dynamic_option_time() {
    global $conn;
date_default_timezone_set('Asia/Karachi');
    $time = '16:29';
    $sql_time = "SELECT DISTINCT student.timeid, class_time.timing
                 FROM reserved_seats
                 INNER JOIN student ON student.timeid = reserved_seats.timeid
                 INNER JOIN class_time ON class_time.id = student.timeid
                 WHERE reserved_seats.reserved = 1 AND '$time' between class_time.start_time AND class_time.end_time AND student.stage_id = 1;";
    $result = mysqli_query($conn, $sql_time);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row["timeid"] . "'>" . $row["timing"] . "</option>";
        }
    } else {
        echo "<option value=''>No students this time</option>";
    }
}

function dynamic_option_class($time_change_value) {
    global $conn;
    $sql_class = "SELECT DISTINCT reserved_seats.classid, class.class 
                  FROM reserved_seats 
                  INNER JOIN student ON student.timeid = reserved_seats.timeid AND student.classid = reserved_seats.classid  
                  INNER JOIN class ON class.id = reserved_seats.classid
                  WHERE reserved_seats.timeid = $time_change_value AND reserved = 1 AND student.stage_id = 1;";
    $result = mysqli_query($conn, $sql_class);
    if ($result->num_rows > 0) {
        echo "<option selected  value=''>Class unreserve...</option>";
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['classid'] . "'>" . $row['class'] . "</option>";
        }
    } else {
        echo "<option value=''>No options available</option>";
    }
}
function dynamic_check_boxes($time_change, $class_change_value) {
    global $conn;
    $even = true;
    $sql_seat = "SELECT DISTINCT reserved_seats.seat_number, seat.seatno 
                    FROM reserved_seats 
                    INNER JOIN student ON student.timeid = reserved_seats.timeid AND student.classid = reserved_seats.classid AND student.seat_number = reserved_seats.seat_number 
                    INNER JOIN seat ON seat.id = reserved_seats.seat_number
                    WHERE reserved_seats.timeid = $time_change AND reserved_seats.classid = $class_change_value AND reserved = 1 AND student.stage_id = 1
                    ORDER BY seat_number ASC;";
    $result = mysqli_query($conn, $sql_seat);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
                
                if ($even == true) {
                    echo '<div class="row mt-1 d-flex justify-content-center align-items-center" >
                        <div class="col-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="attendance[]" value="'.$row["seat_number"].'" id="'.$row["seatno"].'>
                                <label class="form-check-label" for="'.$row["seatno"].'">
                                    '.$row["seatno"].'
                                </label>
                            </div>
                        </div>';
                        $even = false;
                }   else {
                    echo '<div class="col-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="attendance[]" value="'.$row["seat_number"].'" id="'.$row["seatno"].'>
                                <label class="form-check-label" for="'.$row["seatno"].'">
                                    '.$row["seatno"].'
                                </label>
                            </div>
                        </div>
                    </div>';
                    $even = true;
                }
                
        }
    }
}
?>