<?php require('../includes/header.php');?>
<?php require('../includes/navbar.php');?>
<?php require('../includes/sidebar.php');?>


<?php


if(isset($_SESSION['id'])){
    $id = $_SESSION['id'];
    $user_select = "SELECT * FROM users WHERE id = $id";
    $get_select = mysqli_query($conn, $user_select);
    

    
}
if(isset($_POST['create'])){
  $user_id = $id;
  $task_title = $_POST['task_title'];
  $task_description = $_POST['task_description'];
  if( $task_title != "" && $task_description != ""){
     $insert = "INSERT INTO taskboard(user_id,task_title,task_description)VALUES('$user_id','$task_title','$task_description')";
      $get_insert = mysqli_query($conn, $insert);
      if($get_insert){
        ?>   
         <div class="alert alert-dismissible fade show" role = "alert">
          <strong>User is added successful</strong>
          <button type="button" class="btn-close" aria-label="close" data-bs-dismiss="alert"></button>
         </div>

        <?php
        echo "<meta http-equiv=\"refresh\"content=\"2;URL= index.php\">";

      }
      else{
        ?>
       <div class="alert alert-dismissible fade show">
        <strong>User addition failed</strong>
        <button type="button" class="btn-close" aria-label="close" data-bs-dismiss="alert"></button>
       </div>
        <?php
        echo "<meta http-equi\"refresh\"content=\"2;URL = create.php\">";
      }
    
  }
  else{
    ?>
   <div class="alert alert-dismissible fade show" role = "alert">
    <strong>ALl fields are required</strong>
    <button type="button" class="btn-close" aria-label="close" data-bs-dismiss="alert"></button>
   </div>
    <?php
    echo "<meta http-equiv=\"refresh\"content=\"2;URL = create.php\">";
   
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
                    <input type="text" class="form-control" id="task_title" name = "task_title" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="task_description" class="form-label">task_description:</label>
                    <input type="text" class="form-control" id="task_description" name = "task_description" aria-describedby="emailHelp">
                </div>
                  <div class="mb-3">
                    <button type="submit" class="btn btn-sm btn-primary" name = "create">Add task_label</button>
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

