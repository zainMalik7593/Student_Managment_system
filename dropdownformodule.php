<?php
include("connection.php");

if (isset($_POST['time_change_value'])) {
    $time_change_value = intval($_POST['time_change_value']);
    dynamic_option_class($time_change_value);
} elseif (isset($_POST['time_change']) && isset($_POST['class_change_value'])) {
    $time_change = intval($_POST['time_change']);
    $class_change_value = intval($_POST['class_change_value']);
    dynamic_option_seat($time_change, $class_change_value);
} elseif (isset($_POST['time_changed']) && isset($_POST['class_changed_value']) && isset($_POST['seat_changed'])) {
    $time_changed = intval($_POST['time_changed']);
    $class_changed_value = intval($_POST['class_changed_value']);
    $seat_changed = intval($_POST['seat_changed']);
    dynamic_check_boxes($time_changed, $class_changed_value,$seat_changed);
}


function dynamic_option_time() {
    global $conn;
    $sql_time = " SELECT DISTINCT reserved_seats.timeid, class_time.timing 
                FROM reserved_seats
                INNER JOIN student  ON reserved_seats.timeid = student.timeid AND reserved_seats.classid = student.classid AND reserved_seats.seat_number
                INNER JOIN class_time ON class_time.id = student.timeid
                WHERE reserved_seats.reserved = 1 AND student.stage_id = 1;";
    $result = mysqli_query($conn, $sql_time);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row["timeid"] . "'>" . $row["timing"] . "</option>";
        }
    } else {
        echo "<option value=''>No options available</option>";
    }
}

function dynamic_option_class($time_change_value) {
    global $conn;
    $sql_class = " SELECT DISTINCT reserved_seats.classid, class.class 
                    FROM reserved_seats 
                    INNER JOIN student ON student.timeid = reserved_seats.timeid and student.classid = reserved_seats.classid
                    INNER JOIN class ON class.id = reserved_seats.classid
                    WHERE reserved_seats.reserved = 1 AND student.stage_id = 1 and reserved_seats.timeid = $time_change_value;";
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

function dynamic_option_seat($time_change, $class_change_value) {
    global $conn;
    $sql_seat = "SELECT DISTINCT reserved_seats.seat_number, seat.seatno 
                FROM reserved_seats 
                INNER JOIN student ON student.timeid = reserved_seats.timeid and student.classid = reserved_seats.classid and student.seat_number = reserved_seats.seat_number 
                INNER JOIN seat ON seat.id = student.seat_number
                WHERE reserved_seats.timeid = $time_change AND reserved_seats.classid = $class_change_value AND  reserved_seats.reserved = 1 AND student.stage_id = 1;";
    $result = mysqli_query($conn, $sql_seat);
    if ($result->num_rows > 0) {
        echo '<option selected disabled value="">seat unreserve...</option>';
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['seat_number'] . "'>" . $row['seatno'] . "</option>";
        }
    } else {
        echo "<option value=''>No options available</option>";
    }
}

function dynamic_check_boxes($time_changed, $class_changed_value,$seat_changed) {
    global $conn;
    $even = true;
    $logicalquery1 = "SELECT DISTINCT student.id,student.course
                FROM reserved_seats 
                INNER JOIN student ON student.timeid = reserved_seats.timeid AND student.classid = reserved_seats.classid AND student.seat_number = reserved_seats.seat_number 
                WHERE reserved_seats.timeid = $time_changed AND reserved_seats.classid = $class_changed_value AND reserved_seats.seat_number = $seat_changed AND reserved = 1 AND student.stage_id = 1
                ORDER BY id ASC;";
    $result1 = mysqli_query($conn, $logicalquery1);
    if ($result1->num_rows > 0) {
             $row1 = $result1->fetch_assoc();
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
                $logicalquery3 = "SELECT '$courseTopicName' AS column_name FROM `$studentcourse` WHERE $courseTopicName = 0 AND id = $studentid LIMIT 1";
                $result3 = mysqli_query($conn, $logicalquery3);
                if ($result3 && $result3->num_rows > 0) {
                    $row3 = $result3->fetch_assoc();
                        if ($even == true) {
                            echo '<div class="row mt-1 d-flex justify-content-center align-items-center" >
                                    <div class="col-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="topicvalue[]" value="true,'.$courseTopicName.'" id"'. $row3["column_name"] .'">
                                            <label class="form-check-label" for="'.$row3["column_name"].'">
                                                "'. $row3["column_name"].'"
                                            </label>
                                        </div>
                                    </div>';
                                $even = false;
                        }   else {
                            echo '<div class="col-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="topicvalue[]" value="true,'.$courseTopicName.'" id"'. $row3["column_name"] .'">
                                        <label class="form-check-label" for="'.$row3["column_name"].'">
                                            "'. $row3["column_name"].'"
                                        </label>
                                    </div>
                                </div>
                            </div>';
                            $even = true;
                        }
                } echo mysqli_error($conn);
                }
            }
                    
        } else {
        echo mysqli_error($conn);
        }
    }
?>
