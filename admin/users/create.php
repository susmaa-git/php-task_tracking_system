<?php require('../includes/header.php');?>
<?php require('../includes/navbar.php');?>
<?php require('../includes/sidebar.php');?>


<?php
if(isset($_POST['create'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $role = $_POST['role'];
  if($name!= "" && $email != "" && $username != "" && $password != ""  && $role != ""){
    $select = "SELECT * FROM users WHERE email = '$email'";
    $get_select = mysqli_query($conn,$select);
    if($get_select->num_rows>0){
      
      // echo "Invalid email";
      ?>
      <div class="alert alert-dismissible fade show" role = "alert">
        <strong>Email already exist</strong>
        <button type="button" class="btn-close" aria-label="close" data-bs-dismiss = "alert"></button>
      </div>

      <?php
      echo "<meta http-equiv=\"refresh\"content=\"2;URL= create.php\">";
    }
    else{
      $insert = "INSERT INTO users(name, email,username, pass,role)VALUES('$name','$email','$username','$password','$role')";
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
              <h5 class="card-title text-center">Floating labels Form</h5>
              <!-- Floating Labels Form -->
              <form class="w-50 mx-auto" method="POST" action = "#" enctype="multipart/form-data">
                <div class="mb-3">
                  <div class="mb-3">
                    <label for="exampleInputName" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="exampleInputName" name="name"   aria-describedby="emailHelp">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="exampleInputEmail"  name="email"   aria-describedby="emailHelp">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputusername" class="form-label">Username:</label>
                    <input type="text" class="form-control" id="exampleInputusername" name="username"    aria-describedby="emailHelp">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputpassword" class="form-label">password:</label>
                    <input type="password" class="form-control" id="exampleInputpassword" name = "password" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-3">
                    <label for="role" class="form-label">Give role:</label>
                    <select name="role" class="form-control" id = "role">
                    <option value="">Select</option>
                      <option value="1">Admin</option>
                      <option value="0">User</option>
                     
                    </select>
                  </div>

                  <div class="mb-3">
                    <button type="submit" class="btn btn-sm btn-primary" name = "create">Add user</button>
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

