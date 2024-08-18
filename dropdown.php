<?php
include("connection.php");

if (isset($_POST['time_change_value'])) {
    $time_change_value = intval($_POST['time_change_value']);
    dynamic_option_class($time_change_value);
} elseif (isset($_POST['time_change']) && isset($_POST['class_change_value'])) {
    $time_change = intval($_POST['time_change']);
    $class_change_value = intval($_POST['class_change_value']);
    dynamic_option_seat($time_change, $class_change_value);
}

function dynamic_option_time($col1, $col2) {
    global $conn;
    $sql_time = "SELECT DISTINCT timeid , class_time.timing 
                FROM `reserved_seats` 
                INNER JOIN class_time
                on class_time.id = timeid
                WHERE reserved_seats.reserved = 0;";
    $result = mysqli_query($conn, $sql_time);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row["$col1"] . "'>" . $row["$col2"] . "</option>";
        }
    } else {
        echo "<option value=''>No options available</option>";
    }
}

function dynamic_option_class($time_change_value) {
    global $conn;
    $sql_class = "SELECT DISTINCT classid,class.class 
                    FROM (SELECT * FROM `reserved_seats` WHERE reserved_seats.timeid = $time_change_value) as win 
                    INNER JOIN class on classid = class.id 
                    WHERE reserved = 0;";
    $result = mysqli_query($conn, $sql_class);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['classid'] . "'>" . $row['class'] . "</option>";
        }
    } else {
        echo "<option value=''>No options available</option>";
    }
}

function dynamic_option_seat($time_change, $class_change_value) {
    global $conn;
    $sql_seat = "SELECT DISTINCT seat_number,seat.seatno 
                    FROM (SELECT * FROM `reserved_seats` WHERE reserved_seats.timeid = $time_change AND classid = $class_change_value) as win 
                    INNER JOIN seat on seat_number = seat.id 
                    WHERE reserved = 0;";
    $result = mysqli_query($conn, $sql_seat);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['seat_number'] . "'>" . $row['seatno'] . "</option>";
        }
    } else {
        echo "<option value=''>No options available</option>";
    }
}
?>
