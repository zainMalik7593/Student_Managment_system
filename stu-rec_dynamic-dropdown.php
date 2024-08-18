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
// if(!isset($_POST['Pictureold'])){
//         echo "old picture";
//      } elseif (!isset($_POST['student_id'])) {
//         echo "studentid";
//      } elseif (!isset($_POST['picture_Update'])) {
//         echo "picture";
//      }
// if(isset($_POST['Pictureold']) && isset($_POST['student_id']) && isset($_FILES['picture_Update'])){
//     echo "pta nahikia ama";
//     pictureupdate();
// } else {
//     echo "offset araha hai";
// }
// function pictureupdate(){
//     global $conn;
//     $oldpic = $_POST['Pictureold'];
//     $oldfileExplode = explode('/', $oldpic);
//     $foldername = isset($oldfileExplode[4]) ? $oldfileExplode[4] : '';
//     $id = $_POST['student_id'];
//     $file_pic = $_FILES['picture_Update'];
//     $file_name = $file_pic['name'];
//     $temp_file = $file_pic['tmp_name'];
//     $file_error = $file_pic['error'];

//     $fileExplode = explode('.', $file_name);
//     $fileExt = strtolower(end($fileExplode));
//     $extension_array = array('png', 'jpg', 'jpeg');

// if (in_array($fileExt, $extension_array)) {
//     move_uploaded_file($temp_file,$foldername . '/' . $file_name);
//     $image = $foldername . '/' . $file_name;

//     $sqlpicupdatequery = "UPDATE student SET image = $image WHERE id = $id "; 
//     $queryexecute = mysqli_query($conn,$sqlpicupdatequery);
//     if ($queryexecute) {
//         echo "updated data";
//     } else {
//         echo mysqli_error($conn);
//     }
// }   else {
//     echo "extension galat hai";
// }
// }


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

?>
