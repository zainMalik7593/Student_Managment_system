<?php
    include('connection.php');
    $select = "SELECT id from student where course = 'cit';";
    $exe = mysqli_query($conn,$select);
    if ($exe) {
        while ($row = $exe->fetch_assoc()) {
           $id = $row['id'];
           $entry = "INSERT INTO cit (id) value ($id)";
           mysqli_query($conn,$entry);

        }
    }
    
 ?>