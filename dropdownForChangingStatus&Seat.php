<?php
include("connection.php");

if (isset($_POST['time_change_value'])) {
    $time_change_value = intval($_POST['time_change_value']);
    dynamic_option_class2($time_change_value);
} elseif (isset($_POST['time_change']) && isset($_POST['class_change_value'])) {
    $time_change = intval($_POST['time_change']);
    $class_change_value = intval($_POST['class_change_value']);
    dynamic_option_seat2($time_change, $class_change_value);
}  elseif (isset($_POST['time_changed']) && isset($_POST['class_changed_value']) && isset($_POST['seat_change'])) {
    $time_changed = intval($_POST['time_changed']);
    $class_changed_value = intval($_POST['class_changed_value']);
    $seat_change = intval($_POST['seat_change']);
    dynamic_option_status2($time_changed, $class_changed_value, $seat_change);
}   elseif (isset($_POST['time_changed_sts']) && isset($_POST['class_changed_value_sts']) && isset($_POST['seat_change_sts']) && isset($_POST['fromstatus'])) {
    $fromstatus = $_POST['fromstatus'];
    dynamic_option_for_convert_status($fromstatus);
}

function dynamic_option_time2() {
    global $conn;
    $sql_time = " SELECT DISTINCT student.timeid, class_time.timing 
                FROM student
                INNER JOIN reserved_seats ON reserved_seats.timeid = student.timeid
                INNER JOIN class_time ON class_time.id = student.timeid
                WHERE  student.stage_id IN (1,4)
                ORDER BY timeid ASC;";
    $result = mysqli_query($conn, $sql_time);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row["timeid"] . "'>" . $row["timing"] . "</option>";
        }
    } else {
        echo "<option value=''>No options available</option>";
    }
}

function dynamic_option_class2($time_change_value) {
    global $conn;
    $sql_class = " SELECT DISTINCT student.classid, class.class 
                    FROM student 
                    INNER JOIN reserved_seats ON reserved_seats.timeid = student.timeid AND reserved_seats.classid = student.classid
                    INNER JOIN class ON class.id = student.classid
                    WHERE  student.stage_id IN (1,4) and student.timeid = $time_change_value
                    ORDER BY classid ASC;";
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

function dynamic_option_seat2($time_change, $class_change_value) {
    global $conn;
    $sql_seat = "SELECT DISTINCT student.seat_number, seat.seatno 
                FROM student 
                INNER JOIN reserved_seats ON reserved_seats.timeid = student.timeid AND reserved_seats.classid = student.classid AND reserved_seats.seat_number = student.seat_number
                INNER JOIN seat ON seat.id = student.seat_number
                WHERE student.timeid = $time_change AND student.classid = $class_change_value AND student.stage_id IN (1,4)
                ORDER BY seat_number ASC;";
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

function dynamic_option_status2($time_changed, $class_changed_value, $seat_change) {
    global $conn;
    $sql_status = "SELECT DISTINCT student.id,student.name,student.timeid, student.classid,student.seat_number,stage_id,stage
                    FROM student 
                    INNER JOIN reserved_seats ON reserved_seats.timeid = student.timeid AND reserved_seats.classid = student.classid AND reserved_seats.seat_number = student.seat_number
                    INNER JOIN student_stage ON student_stage.id = student.stage_id
                    WHERE student.timeid = $time_changed AND student.classid = $class_changed_value AND student.seat_number = $seat_change AND student.stage_id IN (1,4)
                    ORDER BY seat_number ASC;";
    $result = mysqli_query($conn, $sql_status);
    if ($result->num_rows > 0) {
        echo '<option selected disabled value="">Select Status...</option>';
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['stage_id'] . ",".$row['id']."'>Name:  " . $row['name'] ."  Status:  ".$row['stage'] . "</option>";
        }
    } else {
        echo "<option value=''>No options available</option>";
    }
}

function dynamic_option_for_convert_status($fromstatus) {
    global $conn;
    $fields = explode(',', $fromstatus);
    $status = $fields[0];
    if ($status == 1) {
        $changinig_status = "SELECT * FROM `student_stage` WHERE id > 1;";
        $result = mysqli_query($conn, $changinig_status);
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['id'] . "'>".$row['stage'] . "</option>";
            }
        } else {
            echo "<option value=''>No options available</option>";
        }
    } elseif ($status == 4) {
        echo "<option value='1'>Unfreez</option>";
    }
}
?>
