<?php
require('connection/config.php');
require('auth/secure.php');
require('auth/rolemanagement.php');

?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - Task Tracking system</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Fontawesom -->
  <script src="https://kit.fontawesome.com/f1510e78f8.js" crossorigin="anonymous"></script>


  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">Task tracking system</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->



        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <span class="d-none d-md-block dropdown-toggle ps-2">
              <h6><?php echo $_SESSION['name']; ?></h6>
            </span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php $_SESSION['name']; ?></h6>
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="auth/logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>


          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->
  <?php

  if (isset($_GET['success'])) {
    echo "<div class = 'alert alert-success>" . $_GET['success'] . "</div>";
    header('refresh:2;URL=dashboard.php');
  }




  ?>

  <!-- Sidebar -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <?php if ($_SESSION['role'] ==  0) : ?> 
      <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#tables-nav11" data-bs-toggle="collapse" href="#">
            <i class="bi bi-layout-text-window-reverse"></i><span>Submission</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="tables-nav11" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="submit_task/create.php">
                <i class="bi bi-circle"></i><span>Submit task</span>
              </a>
            </li>
            <li>
              <a href="submit_task/index.php">
                <i class="bi bi-circle"></i><span>Manage submitted task</span>
              </a>
            </li>
          </ul>
        </li><!-- End Tables Nav -->
        <?php endif ?>


      <?php if ($_SESSION['role'] ==  1) : ?>
        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-layout-text-window-reverse"></i><span>Users</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="users/create.php">
                <i class="bi bi-circle"></i><span>Add users</span>
              </a>
            </li>
            <li>
              <a href="users/index.php">
                <i class="bi bi-circle"></i><span>Manage users</span>
              </a>
            </li>
          </ul>
        </li>


        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#tables-nav11" data-bs-toggle="collapse" href="#">
            <i class="bi bi-layout-text-window-reverse"></i><span>File</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="tables-nav11" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="files/create.php">
                <i class="bi bi-circle"></i><span>Add files</span>
              </a>
            </li>
            <li>
              <a href="files/index.php">
                <i class="bi bi-circle"></i><span>Manage files</span>
              </a>
            </li>
          </ul>
        </li><!-- End Tables Nav -->

      <?php endif ?>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav1" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Task</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav1" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="tasks/create.php">
              <i class="bi bi-circle"></i><span>Add tasks</span>
            </a>
          </li>
          <li>
            <a href="tasks/index.php">
              <i class="bi bi-circle"></i><span>Manage tasks</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->


      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav7" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Task board</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav7" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="taskboard/create.php">
              <i class="bi bi-circle"></i><span>Add task_board</span>
            </a>
          </li>
          <li>
            <a href="taskboard/index.php">
              <i class="bi bi-circle"></i><span>Manage task_board</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav17" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Label</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav17" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="taskboard/create.php">
              <i class="bi bi-circle"></i><span>Add label</span>
            </a>
          </li>
          <li>
            <a href="taskboard/index.php">
              <i class="bi bi-circle"></i><span>Manage label</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-contact.html">
          <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li><!-- End Contact Page Nav -->



    </ul>

  </aside>
  <!-- Sidebar -->


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Task tracking system</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
          <div class="container">
            <div class="d-flex float-end">
              <a href="auth/logout.php"><button type="button" class="btn btn-sm btn-primary">Log out</button></a>
            </div>
          </div>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-11">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-3 col-md-6">
              <div class="card info-card sales-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Tasks <span>| Assigned</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="fa-solid fa-list-check"></i>
                    </div>
                    <div class="ps-3">
                      <?php
                      $sql = "SELECT COUNT(id) AS user_count FROM users";
                      $get_sql  = mysqli_query($conn, $sql);
                      if ($get_sql->num_rows > 0) {
                        $row = mysqli_fetch_assoc($get_sql);
                        echo "$row[user_count]";
                      } else {
                        echo "0";
                      }

                      ?>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-3 col-md-6">
              <div class="card info-card revenue-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Users</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Users <span>| Login users</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="fa-solid fa-user"></i>
                    </div>
                    <div class="ps-3">
                      <div class="ps-3">
                        <?php
                        $sql = "SELECT COUNT(id) AS user_count FROM users";
                        $get_sql  = mysqli_query($conn, $sql);
                        if ($get_sql->num_rows > 0) {
                          $row = mysqli_fetch_assoc($get_sql);
                          echo "$row[user_count]";
                        } else {
                          echo "0";
                        }

                        ?>

                      </div>


                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-3 col-xl-12">

              <div class="card info-card customers-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Task board</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Label <span>| Assigned</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="fa-solid fa-tag"></i>
                    </div>
                    <div class="ps-3">
                      <?php
                      $sqll = "SELECT COUNT(id) as label_count FROM labels";
                      $get_sqll = mysqli_query($conn, $sqll);
                      if ($get_sqll->num_rows > 0) {
                        $data = mysqli_fetch_assoc($get_sqll);
                        echo "$data[label_count]";
                      } else {
                        echo "0";
                      }




                      ?>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

            <!-- Customers Card -->
            <div class="col-xxl-3 col-xl-12">

              <div class="card info-card customers-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Taskboard <span>| contains task</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="fa-solid fa-gauge"></i>
                    </div>
                    <div class="ps-3">
                      <?php
                      $sql_taskboard = "SELECT COUNT(id) as task_count FROM taskboard";
                      $get_sql_taskboard = mysqli_query($conn, $sql_taskboard);
                      if ($get_sql_taskboard->num_rows > 0) {
                        $dataa = mysqli_fetch_assoc($get_sql_taskboard);
                        echo $dataa['task_count'];
                      } else {
                        echo "0";
                      }


                      ?>
                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->



            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Assigned task <span>| OF login users</span></h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">username</th>
                        <th scope="col">task_title</th>
                        <th scope="col">task_description</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if (isset($_SESSION['id'])) {
                        $id = $_SESSION['id'];

                        $user_select = "SELECT * FROM users WHERE id = $id";
                        $get_select = mysqli_query($conn, $user_select);
                        if($get_select->num_rows>0){
                          $username = mysqli_fetch_assoc($get_select);
                          $row = $username['username'];


                        }




                      }

                      $taskboard_select = "SELECT * FROM taskboard WHERE user_id = $id";
                      $get_sql_taskboard = mysqli_query($conn,$taskboard_select);


                      $i = 1;
                      while ($result = mysqli_fetch_array($get_sql_taskboard)) {
                      ?>
                        <tr>
                          <td class="col"> <?php echo $i++; ?></td>
                          <td><?php echo $row; ?></td>
                          <td><?php echo $result['task_title']; ?></td>
                          <td><?php echo $result['task_description']; ?></td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Recent Sales -->


            <!-- Reports -->
            <div class="col-12">
              <div class="card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title"> <span>T</span></h5>

                  <!-- Line Chart -->
                  <div id="reportsChart"></div>


                  <!-- End Line Chart -->

                </div>

              </div>
            </div><!-- End Reports -->

            <!-- Top Selling -->
            <div class="col-12">
              <div class="card top-selling overflow-auto">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body pb-0">
                  <h5 class="card-title"> <span></span></h5>


                </div>

              </div>
            </div><!-- End Top Selling -->

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">


          <!-- Modal trigger button -->
          <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#modalId">
            Launch
          </button>

          <!-- Modal Body -->
          <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
          <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modalTitleId">
                    Modal title
                  </h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">Body</div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Close
                  </button>
                  <button type="button" class="btn btn-primary">Save</button>
                </div>
              </div>
            </div>
          </div>

          <!-- Optional: Place to the bottom of scripts -->
          <script>
            const myModal = new bootstrap.Modal(
              document.getElementById("modalId"),
              options,
            );
          </script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>









        </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span> &copy TTS team</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">Susma</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->



  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>