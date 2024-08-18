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
    <div>
        <p id="display"></p>
    </div>
    <div style="top: 10px;" id="submitpage" class="d-block position-absolute top-2 shadow w-50">Student Attendance Record!</div>
    <div style="border : 5px solid #ab1316; display: none;" class="container form ">
        <form id="admissionForm" method="post" action="stu_attendance_report.php" class="row g-3 needs-validation" novalidate>
            <div class="row mt-5 d-flex justify-content-center align-items-center">
                <div class="col-md-9">
                    <label for="validationCustom07" id="dynamicDropdown" class="form-label">Time</label>
                    <select class="form-select time" name="_time" id="validationCustom07" required>
                        <option selected disabled value="">timing unreserve...</option>
                        <?php include 'stu-rec_dynamic-dropdown.php'; dynamic_option_time(); ?>
                    </select>
                    <div class="invalid-feedback">Please select a valid Time.</div>
                </div>
            </div>
            <div class="row mt-1 d-flex justify-content-center align-items-center">
                <div class="col-md-9">
                <label for="validationCustom08" class="form-label">Class</label>
                    <select class="form-select class" name="_class" id="validationCustom08" required>
                        <option selected disabled value="">Class unreserve...</option>
                    </select>
                    <div class="invalid-feedback">Please select a valid class room.</div>
                </div>
            </div>
            <div class="row mt-1 d-flex justify-content-center align-items-center">
                <div class="col-md-9">
                    <label for="validationCustom09" class="form-label">Seat</label>
                    <select class="form-select seat" name="_seat" id="validationCustom09" required>
                        <option selected disabled value="">seat unreserve...</option>
                    </select>
                    <div class="invalid-feedback">Please select a valid seat name.</div>
                </div>
            </div>
            <div class="row mt-1 d-flex justify-content-center align-items-center">
                <div class="col-md-9">
                    <label for="validationCustom09" class="form-label">Time Range</label>
                    <select class="form-select time_range" name="time_range" id="validationCustom09" required>
                        <option selected disabled value="">Time ...</option>
                        <option value="1 month">1 Month</option>
                        <option value="3 months">3 Months</option>
                        <option value="6 months">6 Months</option>
                        <option value="9 months">9 Months</option>
                        <option value="1 year">1 Year</option>
                    </select>
                    <div class="invalid-feedback">Please select a valid Time range.</div>
                </div>
            </div>
            <div class="row mt-4 mb-4 text-center">
                <div class="col-12">
                    <button class="btn btn-lg btn-primary" id="check" name="check" type="submit" value="check">
                        Generate report
                    </button>
                </div>
            </div>
        </form>
    </div>
    <script src="plugins/jquery-3.7.1.min.js"></script>
    <script>
        $('document').ready(function () {
            $('form').submit(function (event) {
                if ($(this)[0].checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                    $(this).addClass('was-validated');
                } else {
                    window.location.href = "stu_attendance_report.php";
                }
            });
        });

        $(window).on("load", function () {
            setInterval(() => {
                $(".pace").hide();
            }, 500);
        });

        $('document').ready(function () {
            $(".pace").show();

            
            $(".form").slideDown(1000);

            $('#validationCustom07').change(function () {
                let timeid = $(this).val();
                $.ajax({
                    url: 'stu-rec_dynamic-dropdown.php',
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
                    url: 'stu-rec_dynamic-dropdown.php',
                    type: 'POST',
                    data: { time_change: timeid, class_change_value: classid },
                    success: function (response) {
                        $('#validationCustom09').html(response);
                    }
                });
            });
        });
    </script>
    <script src="plugins/bootstrap.js"></script>
</body>

</html>
