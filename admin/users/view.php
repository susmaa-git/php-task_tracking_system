<?php require('../includes/header.php');?>
<?php require('../includes/navbar.php');?>
<?php require('../includes/sidebar.php');?>


<?php

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $select = "SELECT * FROM users WHERE id = $id";
    $get_select = mysqli_query($conn, $select);
    $data = mysqli_fetch_assoc($get_select);
}
?>
<!-- Form in users/create.php -->
  <main id="main" class="main">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title text-center">Floating labels Form</h5>
              <!-- Floating Labels Form -->
              <form class="w-50 mx-auto">
                <div class="mb-3">
                  <div class="mb-3">
                    <label for="exampleInputName" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="exampleInputName"  value="<?php echo $data['name']?>" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="exampleInputEmail"    value="<?php echo $data['email']?>" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputusername" class="form-label">Username:</label>
                    <input type="text" class="form-control" id="exampleInputusername"    value="<?php echo $data['username']?>"  aria-describedby="emailHelp">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputpassword" class="form-label">password:</label>
                    <input type="password" class="form-control" id="exampleInputpassword"     value="<?php echo $data['password']?>" aria-describedby="emailHelp">
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

