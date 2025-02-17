<?php require('../includes/header.php');?>
<?php require('../includes/navbar.php');?>
<?php require('../includes/sidebar.php');?>


<?php

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $select = "SELECT * FROM labels WHERE id = $id";
    $get_select = mysqli_query($conn, $select);
    $data = mysqli_fetch_assoc($get_select);
}

$taskboard = "SELECT * FROM taskboard";
$taskboard_result = mysqli_query($conn, $taskboard);
if($taskboard_result){
    $taskboard = mysqli_fetch_assoc($taskboard_result);
    $taskboard_id = $taskboard['id'];
}


$task = "SELECT * FROM tasks";
$task_result = mysqli_query($conn, $task);
if($task_result){
  $task = mysqli_fetch_assoc($task_result);
  $task_idd = $task['id'];

}

?>


<!-- Form in users/create.php -->
  <main id="main" class="main">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title text-center">Label form</h5>
              <!-- Floating Labels Form -->
              <form class="w-50 mx-auto" method="POST" action = "#" enctype="multipart/form-data">
                  <div class="mb-3">
                    <label for="label_title" class="form-label">label_title:</label>
                    <input type="text"  readonly value="<?php echo $data['label_title'];?>" class="form-control" id="label_title" name="label_title"    aria-describedby="emailHelp">
                  </div>
                  <div class="mb-3">
                    <label for="label_description" class="form-label">label_description:</label>
                    <input type="text" readonly value="<?php echo $data['label_description'];?>"     class="form-control" id="label_description" name = "label_description" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-3">
                    <label for="color" class="form-label">color:</label>
                    <input type="text" readonly class="form-control" value="<?php echo $data['color'];?>" id="color" name = "color" aria-describedby="emailHelp">
                </div>
                  <div class="mb-3">
                    <button type="submit" class="btn btn-sm btn-primary" name = "create">Update label</button>
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

