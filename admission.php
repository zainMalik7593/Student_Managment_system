<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SIMSAT Computer Academy</title>
    <link rel="stylesheet" href="plugins/bootstrap.css" />
    <script src="plugins/loader.js"></script>
    <link rel="stylesheet" href="plugins/loader.css" />
    <link rel="stylesheet" src="plugins/center-simple.css" />
    <link rel="stylesheet" href="admission.css" />
    <script src="plugins/jquery-3.7.1.min.js"></script>
    <style>
        body{
            background-color: #fce1e1!important;
            width: 100vw;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        
        .form-control ,.form-select,#submitpage{
            box-shadow: 4px 4px 15px #ab1316;
        }
        .btn{
            box-shadow: 4px 4px 10px rgb(99, 131, 188);
        }
    </style>
</head>

<body>
        <div style="top: 10px;" id="submitpage" class="d-block position-absolute top-2 shadow w-50">Admission Form!</div>
        <div style="border : 5px solid #ab1316; margin-top: 4rem !important;" class="container form">
            <form id="admissionForm" method="post" action="#" class="row g-3 needs-validation" enctype="multipart/form-data" novalidate>
                <div class="row mt-4 d-flex justify-content-center align-items-center">
                    <div class="col-md-9">
                        <label for="validationCustom01" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control form-control-sm name" id="validationCustom01"
                            placeholder="Enter your Name" required />
                        <div class="name_feedback invalid-feedback">Looks good!</div>
                    </div>
                </div>
                <div class="row mt-1 d-flex justify-content-center align-items-center">
                    <div class="col-md-9">
                        <label for="validationCustom02" class="form-label">Father Name</label>
                        <input type="text" name="father" class="form-control form-control-sm father" id="validationCustom02"
                            placeholder="Enter your father name" required />
                        <div class="father_feedback invalid-feedback">Looks good!</div>
                    </div>
                </div>
                <div class="row mt-1 d-flex justify-content-center align-items-center">
                    <div class="col-md-9">
                        <label for="validationCustom03" class="form-label">Add Picture</label>
                        <input type="file" name="picture" class="form-control form-control-sm picture" id="validationCustom03"
                            placeholder="Add your picture" required />
                        <div class="picture_feedback invalid-feedback">Looks good!</div>
                    </div>
                </div>
                <div class="row mt-1 d-flex justify-content-center align-items-center">
                    <div class="col-md-9">
                        <label for="validationCustom04" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control form-control-sm email" id="validationCustom04"
                            placeholder="Enter your email" required />
                        <div class="email_feedback invalid-feedback">Looks good!</div>
                    </div>
                </div>
                <div class="row mt-1 d-flex justify-content-center align-items-center">
                    <div class="col-md-9">
                        <label for="validationCustom05" class="form-label">Age</label>
                        <input type="number" name="age" class="form-control form-control-sm age" id="validationCustom05"
                            placeholder="Enter your age" required />
                        <div class="age_feedback invalid-feedback">Looks good!</div>
                    </div>
                </div>
                <div class="row mt-1 d-flex justify-content-center align-items-center">
                    <div class="col-md-9">
                        <label for="validationCustom" class="form-label">Course</label>
                        <select class="form-select form-select-sm course" name="course" id="validationCustom" required>
                            <option selected value="">Course Choose...</option>
                            <option value="cit">CIT</option>
                            <option value="pcit">PCIT</option>
                            <option value="pro_web">Pro Web</option>
                            <option value="web_designing">Web Designing</option>
                            <option value="graphic_designing">Graphic Designing</option>
                            <option value="advanced_graphic_designing">Advanced Graphic Designing</option>
                            <option value="office_automation">Office Automation</option>
                        </select>
                        <div class="invalid-feedback">Please select a valid Course.</div>
                    </div>
                </div>
                <div class="row mt-1 d-flex justify-content-center align-items-center">
                    <div class="col-md-9">
                        <label for="validationCustom06" id="dynamicDropdown" class="form-label">Time</label>
                        <select class="form-select form-select-sm time" name="time" id="validationCustom06" required>
                            <option selected disabled value="">Time Choose...</option>
                            <?php include 'dropdown.php'; dynamic_option_time("timeid", "timing"); ?>
                        </select>
                        <div class="invalid-feedback">Please select a valid Time Zone.</div>
                    </div>
                </div>
                <div class="row mt-1 d-flex justify-content-center align-items-center">
                    <div class="col-md-9">
                        <label for="validationCustom07" class="form-label">Class</label>
                        <select class="form-select form-select-sm class" name="class" id="validationCustom07" required>
                            <option selected disabled value="">Class Choose...</option>
                        </select>
                        <div class="invalid-feedback">Please select a valid Class Room.</div>
                    </div>
                </div>
                <div class="row mt-1 d-flex justify-content-center align-items-center">
                    <div class="col-md-9">
                        <label for="validationCustom08" class="form-label">Seat</label>
                        <select class="form-select form-select-sm seat" name="seat" id="validationCustom08" required>
                            <option selected disabled value="">Seat Choose...</option>
                        </select>
                        <div class="invalid-feedback">Please select a valid Seat Name.</div>
                    </div>
                </div>
                <div class="row mt-4 mb-4 text-center">
                    <div class="col-12">
                        <button class="btn btn-primary" id="submit" name="submit" type="submit" value="submit">
                            Submit
                        </button>
                    </div>
                </div>
            </form>
            
            </div>
            <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title modal-title1" id="exampleModalLabel">Form Submit!</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Congratulation! Your Admission is Successfully and Reserved Seat.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Ok</button>
                    </div>
                    </div>
                </div>
            </div>
        <script>
        $(document).ready(function() {
            $('form').submit(function (event) {
                if ($(this)[0].checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                    $(this).addClass('was-validated');
                }
            });
            $('#validationCustom06').change(function() {
                let timeid = $(this).val();
                $.ajax({
                    url: 'dropdown.php',
                    type: 'POST',
                    data: { time_change_value: timeid },
                    success: function(response) {
                        $('#validationCustom07').html(response);
                    }
                });
            });

            $('#validationCustom07').change(function() {
                let timeid = $('#validationCustom06').val();
                let classid = $(this).val();
                $.ajax({
                    url: 'dropdown.php',
                    type: 'POST',
                    data: { time_change: timeid, class_change_value: classid },
                    success: function(response) {
                        $('#validationCustom08').html(response);
                    }
                });
            });
        });
        </script>
        <script src="validation_admission.js"></script>
        <script>
        $(window).on("load", function() {
            setInterval(() => {
                $(".pace").hide();
            }, 500);
        });
        $(document).ready(function() {
            $(".pace").show();
        });
        $('form').submit(function (event) {
            if ($(this)[0].checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
                $(this).addClass('was-validated');
            }
        });
        $(".form").slideDown(1000)

        $('input').click(function () {
            $('.invalid-feedback').hide();
        })
        </script>
        <?php

if (isset($_POST['submit'])) {
    include 'connection.php';
    date_default_timezone_set('Asia/Karachi');
    $current_time = date('H-i-s A');
    $date = date('Y-m-d');
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $father = mysqli_real_escape_string($conn, $_POST['father']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $course = mysqli_real_escape_string($conn, $_POST['course']);
    $time = mysqli_real_escape_string($conn, $_POST['time']);
    $class = mysqli_real_escape_string($conn, $_POST['class']);
    $seat = mysqli_real_escape_string($conn, $_POST['seat']);
    $file_pic = $_FILES['picture'];
    

    $file_name = $file_pic['name'];
    $temp_file = $file_pic['tmp_name'];
    $file_error = $file_pic['error'];

    $fileExplode = explode('.', $file_name);
    $fileExt = strtolower(end($fileExplode));
    $extension_array = array('png', 'jpg', 'jpeg');

if (in_array($fileExt, $extension_array)) {
    if (!file_exists($name . '_' . $father)) {
        $folder = $name . '_' . $date . '_' . $current_time;
        mkdir($folder);
    }

    move_uploaded_file($temp_file,$folder . '/' . $file_name);
    $image = $folder . '/' . $file_name;

    $sql1 = "INSERT INTO `student` (name, father_name, email, age, timeid, classid, seat_number, image ,date,course) VALUES ('$name', '$father', '$email', '$age', '$time', '$class', '$seat', '$image','$date','$course')";

    $select = "SELECT id, timeid, classid, seat_number, reserved 
                FROM `reserved_seats` 
                WHERE reserved = 0 AND timeid = $time AND classid = $class AND seat_number = $seat";
    $result1 = mysqli_query($conn, $select);

    $id = 0;
    if ($result1->num_rows > 0) {
        while ($row = $result1->fetch_assoc()) {
            if ($time == $row["timeid"] && $class == $row["classid"] && $seat == $row["seat_number"]) {
                $id = $row["id"];
                break;
            }
        }
    }

    if ($id != 0) {
        $sql = "UPDATE `reserved_seats` SET reserved = 1 WHERE id = $id";
        if (mysqli_query($conn, $sql1)) {
            if (mysqli_query($conn, $sql)) {
                $selectforquery = "SELECT id from student where timeid = $time AND classid = $class AND seat_number = $seat AND stage_id = 1;"; 
                $executeforid = mysqli_query($conn , $selectforquery);
                if ($executeforid) {
                    $CourceAssocId = $executeforid->fetch_assoc();
                    $CourceDetailId = $CourceAssocId['id']; 
                    $Course_Record_Entry_query = "INSERT INTO `$course` (id) values ('$CourceDetailId');"; 
                    if (mysqli_query($conn,$Course_Record_Entry_query)) {
                        ?>
                            <script>
                                $('document').ready(function () {
                                    $('.modal-title1').text('Admission Ok!');
                                    $('.modal-body-h1').text('"Congratulation! Your Admission is Successfully and Reserved Seat."')
                                    $('#exampleModal1').modal("show");
                                })
                            </script>
                        <?php
                    } else {
                        echo mysqli_error($conn);
                    }
                }
            } else {
                $error = mysqli_error($conn);
                ?>
                    <script>
                        $('document').ready(function () {
                            $('.modal-title1').text('Admission Not Ok!');
                            $('.modal-body-h1').text('"Sorry! Your Admission is not Successfully and Unreserved Seat."')
                            $('#exampleModal1').modal("show");
                        })
                    </script>
                <?php
            }
        } else {
            $error = mysqli_error($conn);
            ?>
                <script>
                    $('document').ready(function () {
                        $('.modal-title1').text('Admission Not Ok!');
                        $('.modal-body-h1').text('"Sorry! Your Admission is not Successfully and Unreserved Seat."')
                        $('#exampleModal1').modal("show");
                    })
                </script>
            <?php
        }
    }
}

    mysqli_close($conn);
}
?>
    <script src="plugins/bootstrap.js"></script>
</body>

</html>

