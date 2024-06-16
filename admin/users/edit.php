<?php require('../includes/header.php');?>
<?php require('../includes/navbar.php');?>
<?php require('../includes/sidebar.php');?>


<?php

if(isset($_GET['id'])){

    $id = $_GET['id'];
    $select = "SELECT * FROM users WHERE id = $id";
    $get_select = mysqli_query($conn, $select);
    $data= $get_select->fetch_assoc();
  }


  


if(isset($_POST['edit'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $username = $_POST['username'];
  $role = $_POST['role'];
  if($name!= "" && $email != "" && $username != "" && $role!= ""){
    
      $insert = "UPDATE users SET name = '$name', email = '$email',username = '$username' , role = '$role' WHERE id = $id";
      $get_insert = mysqli_query($conn, $insert);
      if($get_insert){
        ?>   
         <div class="alert alert-dismissible fade show" role = "alert">
          <strong>User is added successful</strong>
          <button type="button" class="btn-close" aria-label="close" data-bs-dismiss="alert"></button>
         </div>

        <?php
        echo "<meta http-equiv=\"refresh\"content=\"2;url=index.php\">";

      }
      else{
        ?>
       <div class="alert alert-dismissible fade show">
        <strong>User addition failed</strong>
        <button type="button" class="btn-close" aria-label="close" data-bs-dismiss="alert"></button>
       </div>
        <?php
        echo "<meta http-equi\"refresh\"content=\"2;url= edit.php\">";
      }
    }
  }
  else{
    ?>
   <div class="alert alert-dismissible fade show" role = "alert">
    <strong>ALl fields are required</strong>
    <button type="button" class="btn-close" aria-label="close" data-bs-dismiss="alert"></button>
   </div>
    <?php
    // echo "<meta http-equiv=\"refresh\"content=\"2;URL = edit.php\">";
  }


?>


<!-- Form in users/create.php -->
  <main id="main" class="main">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title text-center">Floating labels Form</h5>
              <!-- Floating Labels Form -->
              <form class="w-50 mx-auto" method="POST" enctype="multipart/form-data" action = "#">
                <div class="mb-3">
                  <div class="mb-3">
                    <label for="exampleInputName" class="form-label">Name:</label>
                    <input type="text" name="name"     class="form-control" id="exampleInputName"  value="<?php echo $data['name'];?>" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail" class="form-label">Email:</label>
                    <input type="email"  name="email"    class="form-control" id="exampleInputEmail"    value="<?php echo $data['email'];?>" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputusername" class="form-label">Username:</label>
                    <input type="text"    name="username" class="form-control" id="exampleInputusername"    value="<?php echo $data['username'];?>"  aria-describedby="emailHelp">
                  </div>
                  <div class="mb-3">
                    <label for="roles" class="form-label">Give role:</label>
                    <select name="role" class="form-control">
                    <option value="">Select</option>
                      <option value="1">Admin</option>
                      <option value="0">User</option>
                     
                    </select>
                  </div>
                  <div class="mb-3">
                    <button type="submit" class="btn btn-sm btn-primary" name = "edit">Add user</button>
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

