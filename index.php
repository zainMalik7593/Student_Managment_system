<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SIMSAT Computer Academy</title>
    <!-- stylesheet -->
    <link rel="stylesheet" href="index.css" />
    <!-- bootstrap style -->
    <link rel="stylesheet" href="plugins/bootstrap.css" />
    <!-- icons -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
      integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <!-- loader -->
    <script src="plugins/loader.js"></script>
    <link
      rel="stylesheet"
      href="plugins/loader.css"
    />
    <link rel="stylesheet" src="plugins/center-simple.css" />
    <style>
      .nav-item:hover .dropdown-menu {
            display: block;
        }
    </style>
  </head>
  <body class="bg-light">
    <!-- navbar open -->
    <div class="con1">
      <nav class="navbar gradient navbar-expand-lg navbar-light">
        <div class="container-fluid">
          <span class="lead">
            <a class="navbar-brand" href="#">
              <span id="outerimg">
                <img
                  id="img"
                  src="photos/unnamed-ai-brush-removebg-67jnbg78.png"
                  alt=""
                />
              </span>
            </a>
          </span>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#nav-list-item"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div id="nav-list-item" class="collapse mt-1 navbar-collapse">
            <ul class="navbar-nav ms-auto me-auto">
              <li class="nav-item">
                <a class="nav-link active" href="index.html">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="stu-rec.php">Record</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Stu-Rec-Maintain</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item text-center" href="admission.php">Admission</a>
                  <a class="dropdown-item text-center" href="CourseModuleUpdate.php">Tick Complete Topic</a>
                  <a class="dropdown-item text-center" href="ChangeStudentStatus.php">Change Student Status</a>
                  <a class="dropdown-item text-center" href="ChangeStuSeat.php">Change Timing & Seat</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Att-Maintain</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item text-center" href="group_attendance_form.php">Attendance</a>
                  <a class="dropdown-item text-center" href="stu_attendance_form.php">Attendance Update</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link">Search-With-Criteria</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item text-center" href="stu_record_form.php">Student Record</a>
                    <a class="dropdown-item text-center" href="group_record_form.php">Class Record</a>
                </div>
              </li>
            </ul>
            <br>
            <form class="d-flex">
              <input
                class="form-control me-3"
                type="search"
                placeholder="search courses info"
                aria-label="Search"
              />
              <a href="stu-rec.php">
                <button class="btn btn-outline-danger mt-1" type="submit">
                check
                </button>
              </a>
              
              <button class="btn btn-outline-danger ms-2 mt-1" type="login">
                Login
              </button>
            </form>
          </div>
        </div>
      </nav>
      <!-- crousal open -->
      <div style="height: 300px; margin-top: 10px" class=" crow1 container-fluid">
        <div style="height: 300px" class="container">
          <div
            id="carouselExampleSlidesOnly"
            class="carousel slide"
            data-bs-ride="carousel"
          >
            <div
              class="carousel-inner"
              style="
                border: 5px solid brown;
                border-radius: 2rem;
                box-shadow: 10px 10px 10px #646567;
              "
            >
              <div class="carousel-item active">
                <img
                  src="photos/agd_copy.jpg"
                  class="d-block w-100"
                  alt="..."
                />
              </div>
              <div class="carousel-item">
                <img
                  src="photos/pcit_copy.jpg"
                  class="d-block w-100"
                  alt="..."
                />
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- card open -->
      <div class="container mb-3 card-outer d-flex">
        <div
          class="card card1 me-5"
          style="
            height: 600px;
            width: 25rem;
            box-shadow: 10px 10px 10px #646567;
          "
        >
          <img
            src="photos/Advance-Graphic-Designing.jpg"
            class="card-img-top Web"
            alt="..."
          />
          <div
            class="card-body d-flex flex-column justify-content-center align-item-center"
          >
            <h5 class="card-title fw-bold">Advance-Graphic-Designing</h5>
            <p class="card-text">
              introduction to Photoshop and CoralDraw. Unlock your visual
              creativity and learn to create stunning graphics.
            </p>
          </div>
        </div>
        <div
          class="card card2 me-5"
          style="
            height: 600px;
            width: 25rem;
            box-shadow: 10px 10px 10px #646567;
          "
        >
          <img
            src="photos/christopher-gower-m_HRfLhgABo-unsplash.jpg"
            height="50%"
            class="card-img-top Web"
            alt="..."
          />
          <div
            class="card-body d-flex flex-column justify-content-center align-item-center"
          >
            <h5 class="card-title fw-bold">
            Web Developement
            </h5>
            <p class="card-text">
              <b>Frontend :</b> Learn Wib Development for HTML, CSS3, Modern
              JavaScript, JQuery, Bootstrap 5.3 etc:
              <br />
              <b>Backend :</b> php 8.3, mysqli Databases, laravel etc:
              
            </p>
          </div>
        </div>
        <div
          class="card card3 me-5"
          style="
            height: 600px;
            width: 25rem;
            box-shadow: 10px 10px 10px #646567;
          "
        >
          <img
            src="photos/front-pcit-final.jpg"
            class="card-img-top Web1"
            alt="..."
          />
          <div
            class="card-body d-flex flex-column justify-content-center align-item-center"
          >
            <h5 class="card-title fw-bold">  PCIT: Professional Certified Info Teachno</h5>
            <p class="card-text">
              Get Certification on MSOffice, Photoshop, CoralDraw, HTML, &
              CSS.Enhance your career prospects with comprehensive IT skills
              training.
            </p>
          </div>
        </div>
      </div>
      <div class="container-fluid mt-5">
        <footer
          class="footer text-center text-lg-start text-dark"
          style="background-color: #eceff1"
        >
          <section
            class="d-flex gradient justify-content-between p-4 text-white"
          >
            <div class="me-5">
              <h6 id="ft-text">Get connected with student database:</h6>
            </div>
            <div>
              <a href="https://www.facebook.com" class="text-white me-4">
                <i
                  class="fa-brands fa-facebook"
                  style="font-size: 2rem; color: #28282a"
                ></i>
              </a>
              <a href="https://twitter.com" class="text-white me-4">
                <i
                  class="fa-brands fa-twitter"
                  style="font-size: 2rem; color: #28282a"
                ></i>
              </a>
              <a href="https://www.google.com" class="text-white me-4">
                <i
                  class="fab fa-google"
                  style="font-size: 2rem; color: #28282a"
                ></i>
              </a>
              <a
                href="https://www.instagram.com/accounts/login"
                class="text-white me-4"
              >
                <i
                  class="fab fa-instagram"
                  style="font-size: 2rem; color: #28282a"
                ></i>
              </a>
              <a href="https://pk.linkedin.com" class="text-white me-4">
                <i
                  class="fab fa-linkedin"
                  style="font-size: 2rem; color: #28282a"
                ></i>
              </a>
              <a href="https://github.com/login" class="text-white me-4">
                <i
                  class="fab fa-github"
                  style="font-size: 2rem; color: #28282a"
                ></i>
              </a>
            </div>
            <!-- Right -->
          </section>
          <!-- Section: Social media -->

          <!-- Section: Links  -->
          <section class="">
            <div class="container text-center text-md-start mt-5">
              <!-- Grid row -->
              <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                  <!-- Content -->
                  <h6 class="text-uppercase fw-bold">
                    SIMSAT Computer Acamdemy
                  </h6>
                  <hr
                    class="mb-4 mt-0 d-inline-block mx-auto"
                    style="width: 60px; background-color: #ab1316; height: 4px"
                  />
                  <p>
                    Empowering individuals with comprehensive computer courses
                    in Web Development, Graphic Designing, and more. Join us to
                    elevate your skills and advance your career in the digital
                    world.
                  </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                  <!-- Links -->
                  <h6 class="text-uppercase fw-bold">Products</h6>
                  <hr
                    class="mb-4 mt-0 d-inline-block mx-auto"
                    style="width: 60px; background-color: #ab1316; height: 4px"
                  />
                  <p>
                    <a href="#!" class="text-dark">PCIT</a>
                  </p>
                  <p>
                    <a href="#!" class="text-dark">Graphic Designing</a>
                  </p>
                  <p>
                    <a href="#!" class="text-dark">Web Developement</a>
                  </p>
                  <p>
                    <a href="#!" class="text-dark">MS Office</a>
                  </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                  <!-- Links -->
                  <h6 class="text-uppercase fw-bold">Useful links</h6>
                  <hr
                    class="mb-4 mt-0 d-inline-block mx-auto"
                    style="width: 60px; background-color: #ab1316; height: 4px"
                  />
                  <p>
                    <a href="https://simsatedu.com/" class="text-dark"
                      >Center Website</a
                    >
                  </p>
                  <p>
                    <a href="#!" class="text-dark">Help</a>
                  </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                  <!-- Links -->
                  <h6 class="text-uppercase fw-bold">Contact</h6>
                  <hr
                    class="mb-4 mt-0 d-inline-block mx-auto"
                    style="width: 60px; background-color: #ab1316; height: 4px"
                  />
                  <p>
                    <i class="fas fa-home mr-3"></i> karachi , landhi noor
                    manzil, PKR
                  </p>
                  <p>
                    <i class="fas fa-envelope mr-3"></i> simsatedu@gmail.com
                  </p>
                  <p><i class="fas fa-phone mr-3"></i> + 92 xxxxxxxxx</p>
                  <p><i class="fas fa-print mr-3"></i> + 92 xxxxxxxxx</p>
                </div>
              </div>
            </div>
          </section>
          <div
            class="text-center p-3"
            style="background-color: rgba(0, 0, 0, 0.2)"
          >
            © 2024 SIMSAT. All rights reserved.
            <a class="text-dark" href="https://simsatedu.com/"
              >simsatedu.com</a
            >
          </div>
        </footer>
      </div>
      <script src="plugins/jquery-3.7.1.min.js"></script>
      <script>
        $(window).on("load", function () {
          setInterval(() => {
            $(".pace").hide();
            $(".con1").show();
          }, 500);
        });
        $(document).ready(function () {
          $(".pace").show();
          $(".con1").hide();
        });
      </script>
      <!-- bootstrap script-->
      <script src="plugins/bootstrap.js"></script>
    </div>
  </body>
</html>