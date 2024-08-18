
<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Student Data</title>
        <link rel="stylesheet" href="plugins/bootstrap.css" />
        <link rel="stylesheet" href="plugins/datatables.css">
        <link rel="stylesheet" href="plugins/datatables.min.css">
        <script src="plugins/jquery-3.7.1.min.js"></script>
        <script src="plugins/datatables.min.js"></script>
    <style>
        body {
            background-color: #fce1e1!important;
        }

        .mainheading {
            background-color: white;
            border: 3px solid #ab1316;
            border-radius: 3vh;
            font-family: Georgia, 'Times New Roman', Times, serif;
            font-weight: 900;
            box-shadow: 4px 4px 15px #ab1316;
        }

        .form-control ,.form-select,#submitpage{
            box-shadow: 4px 4px 15px #ab1316;
        }
        tr,td,th{
            text-align: center;
        }
        
    </style>
</head>

<body class="text-center">
    <div class="container">
        <h1 class="mainheading mt-1 mb-5">Student Data</h1>
    <div class="row mt-5">
        <div class="col">
            <table class="table table-bordered table-striped text-center " id="table">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Father-Name</th>
                        <th>Email</th>
                        <th>Age</th>
                        <th>Course</th>
                        <th>Timing</th>
                        <th>Class</th>
                        <th>Seat-Number</th>
                        <th>Status</th>
                        <th>image</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include("connection.php");
                $sql = "SELECT 
                        student.id,
                        student.name,
                        student.father_name,
                        student.email,
                        student.age,
                        student.image,
                        student.course,
                        class.class,
                        seat.seatno,
                        student_stage.stage,
                        class_time.timing
                        FROM student
                        INNER JOIN class ON class.id = student.classid
                        INNER JOIN class_time ON class_time.id = student.timeid
                        INNER JOIN seat ON student.seat_number = seat.id
                        INNER JOIN student_stage ON student.stage_id = student_stage.id
                        ORDER BY student.id;";

                $result = mysqli_query($conn, $sql);
                
                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td id='{$row['id']}' class='stud_id align-middle'>{$row['id']}</td>
                                <td class='align-middle'>{$row['name']}</td>
                                <td class='align-middle'>{$row['father_name']}</td>
                                <td class='align-middle'>{$row['email']}</td>
                                <td class='align-middle'>{$row['age']}</td>
                                <td class='align-middle'>{$row['course']}</td>
                                <td class='align-middle'>{$row['timing']}</td>
                                <td class='align-middle'>{$row['class']}</td>
                                <td class='align-middle'>{$row['seatno']}</td>
                                <td class='align-middle'>{$row['stage']}</td>
                                <td class='align-middle'><img class='align-middle' onclick='bigPicture(this.src,{$row['id']})' height='30' width='30' src='{$row['image']}'>
                                </td>
                            </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='8'>No records found</td></tr>";
                        }
                        
                        mysqli_close($conn);
                        ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Profile Picture</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12"><img id="img" height="300" alt=""></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <!-- <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Edit Picture</button> -->
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Profile Picture</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container mt-5">
                        <form method="post" action="stu-rec_dynamic-dropdown.php" class="needs-validation" enctype="multipart/form-data" novalidate>
                            <div class="row mb-5 justify-content-center align-item-center">
                                <div class="col-md-9">
                                    <label for="validationCustom" class="form-label">Add Update Picture</label>
                                    <input type="file" name="picture_Update" class="form-control form-control-sm picture" id="validationCustom"
                                        placeholder="Add your picture" required />
                                    <div class="picture_feedback invalid-feedback">Looks good!</div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                  <button class="btn btn-secondary" data-bs-target="#exampleModal" data-bs-toggle="modal">Go back</button>
                  <button class="btn btn-primary" name="submit1" type="submit" value="submit" id="submit1">Update Picture</button>
                </div>
              </div>
            </div>
          </div>
          <script>
            //   $('#submit1').click(function () {
            //     let file = $('.picture').val();
            //     let stud_id = $('.stud_id').attr('id');
            //     let imgSrc = $('#img').attr('src');
            //     $.ajax({
            //         url: 'stu-rec_dynamic-dropdown.php',
            //         type: 'POST',
            //         data: { Pictureold: imgSrc, student_id: stud_id, picture_Update: file},
            //         success: function (response) {
            //             alert(response)
            //         }
            //     });
            // });
          </script>
    <script src="plugins/bootstrap.js"></script>
    <script>
        let table = new DataTable('#table');

        function bigPicture (src) {
            $('document').ready(function () {
                $('#img').attr('src', src);
                $("#exampleModal").modal("show");
            })
        }
    </script>
</body>
</html>
