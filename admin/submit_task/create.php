<?php require('../includes/header.php'); ?>
<?php require('../includes/navbar.php'); ?>
<?php require('../includes/sidebar.php'); ?>


<section class="py-5">
    <div class="container w-50 py-5">
        <h4>Add File</h4>
        <a name="" id="" class="btn btn-primary" href="index.php" role="button">Manage submitted task</a>


        <?php
        if (isset($_POST['submit'])) {

            $title = $_POST['title'];
            $description = $_POST['description'];
            $role = $_POST['statuus'];

            $filename = $_FILES['dataFile']['name'];
            $filesize = $_FILES['dataFile']['size'];
             
            

            $exploade = explode('.', $filename);
           
            $file = strtolower(@$exploade[0]);
            $ext = strtolower(@$exploade[1]);


            $strreplace = str_replace(' ', '', $file);
            
            $finalname = $strreplace . time() . '.' . $ext;

            if ($title != "" && $description != "" && $finalname != "" && $role!= "") {
                if ($filesize <= 2 * 1024 * 1024) {
                    if ($ext == 'jpg' || $ext == 'png' || $ext == 'pdf' || $ext == 'jpeg') {
                        if (move_uploaded_file($_FILES['dataFile']['tmp_name'], '../uploads/' . $finalname)) {
                            $insert = "INSERT INTO files(title, description, img_link, type) VALUES ('$title','$description','$finalname','$ext')";
                            $result = mysqli_query($conn, $insert);
                            if ($result) {
                                echo "file is submitted";
                                echo "<meta http-equiv=\"refresh\"content=\"2;URL=index.php\">";
                                // echo "<meta http-equiv=\"refresh\" content=\"2;URL=create.php\">";

                            } else {
                                echo "file is not submitted";

                            }
                        } else {
                            echo "File is not uploaded";
                        }
                    } else {
                        echo "Extension does not match";
                    }
                } else {
                    echo "File size must be lessthen 2MB";
                }
            } else {
                echo "All fields are required";
            }
        }


        ?>

        
        <form action="#" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="exampleInputitle" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="exampleInputtitle" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea class="form-control"   name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleInputitle" class="form-label">Image</label>
                <input type="file" class="form-control" name="dataFile" id="exampleInputtitle" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                    <label for="statuus" class="form-label">Give statuus:</label>
                    <select name="statuus" class="form-control" id = "statuus">
                    <option value="">Select</option>
                      <option value="1">Completed</option>
                      <option value="0">Pending</option>
                      <option value="2">Inprogress</option>
                     
                    </select>
                  </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            <div class="mb-3 form-check">
            </div>
        </form>
    </div>
</section>

<?php require('../includes/footer.php'); ?>