<?php require('../includes/header.php');?>
<?php require('../includes/navbar.php');?>
<?php require('../includes/sidebar.php');?>


<?php


if(isset($_SESSION['id'])){
    $id = $_SESSION['id'];
    $user_select = "SELECT * FROM users WHERE id = $id";
    $get_select = mysqli_query($conn, $user_select);
    
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $select = "SELECT * FROM taskboard WHERE id = $id";
    $result = mysqli_query($conn, $select);
    $data = mysqli_fetch_assoc($result);
}
    
}

?>


<!-- Form in users/create.php -->
  <main id="main" class="main">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title text-center">Task label</h5>
              <!-- Floating Labels Form -->
              <form class="w-50 mx-auto" method="POST" action = "#" enctype="multipart/form-data">
                  <div class="mb-3">
                    <label for="task_title" class="form-label">task_title:</label>
                    <input type="text" class="form-control" id="task_title" name = "task_title"  readonly value = "<?php echo $data['task_title'];?>" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="task_description" class="form-label">task_description:</label>
                    <input type="text" class="form-control" id="task_description" name = "task_description" readonly   value = "<?php echo $data['task_description'] ?>" aria-describedby="emailHelp">
                </div>
                  <div class="mb-3">
                    <button type="submit" class="btn btn-sm btn-primary" name = "create">Add task</button>
                  </div>
                </div>
              </form><!-- End floating Labels Form -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

 <?php require('../includes/footer.php');?>

