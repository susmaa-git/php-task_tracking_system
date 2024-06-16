<?php require('../includes/header.php');?>
<?php require('../includes/navbar.php');?>
<?php require('../includes/sidebar.php');?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Tables</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Taskboard</li>
          <li class="breadcrumb-item active">Manage</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Datatables</h5>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>
                      <b>#</b>
                    </th>
                    <th>
                      <b>task_title</b>ame
                    </th>
                    <th>task_description</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                $select = "SELECT * FROM taskboard";
                $get_select = mysqli_query($conn, $select);
                $i = 1;
                while($data = mysqli_fetch_array($get_select)){
                  ?>
                  <tr>
                    <td><?php echo $i++?></td>
                    <td><?php echo $data['task_title']?></td>
                    <td><?php echo $data['task_description']?></td>
                    <td>
                      <a class="btn btn-sm btn-primary" role = "button" href="edit.php?id=<?php echo $data['id']?>;">Edit</a>
                      <a class="btn btn-sm btn-primary" role = "button" href="view.php?id=<?php echo $data['id'];?>">view</a>
                      <a class="btn btn-info btn-sm " href="delete.php?id=<?php echo $data['id'];?>" onclick="return confirm('Do you want to delete')"      role="button">Delete </a>

                    </td>
                  </tr>




<?php
                }
                
                
                
                ?>

                  <tr>
                    
                  </tr>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

 <?php require('../includes/footer.php');?>