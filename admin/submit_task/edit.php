<?php require('../includes/header.php'); ?>
<?php require('../includes/navbar.php'); ?>
<?php require('../includes/sidebar.php'); ?>


<section class="py-5">
    <div class="container w-50 ">
        <h4>Add File</h4>
        <a name="" id="" class="btn btn-primary" href="index.php" role="button">Manage file</a>


        <?php
        if(isset($_GET['id'])){
            $id= $_GET['id'];

            $select= "SELECT *FROM files where id= $id";
            $select_result= mysqli_query($conn, $select);
            $data= $select_result->fetch_assoc();
            // $data=mysqli_fetch_assoc($select_result);
        }



        if (isset($_POST['submit'])) {

            $title = $_POST['title'];
            $description = $_POST['description'];

            $filename = $_FILES['dataFile']['name'];
            $filesize = $_FILES['dataFile']['size'];
            
            
            if($title!="" && $description!="" && $filename==""){
                $insert="UPDATE files SET title='$title', description='$description' where id=$id";
                $insert_result=mysqli_query($conn, $insert);
                if($insert_result){
                    echo "Data are updated";
                    echo "<meta http-equiv=\"refresh\"content=\"2;URL=index.php\">";

                }
                else{
                    echo "Nothing changes";
                    echo "<meta http-equiv=\"refresh\"content=\"2;URL=edit.php\">";
                }
            }

           

            if ($title != "" && $description != "" && $filename != "") {
                if ($filesize <= 2 * 1024 * 1024) {
                    $exploade = explode('.', $filename);
                    $file = strtolower($exploade[0]);
                    $ext = strtolower($exploade[1]);
        
                    $strreplace = str_replace(' ', '', $file);
                    $finalname = $strreplace . time() . '.' . $ext;

                    $old_path= '../uploads/'. $finalname;
                    
                    
                    if ($ext == 'jpg' || $ext == 'png' || $ext == 'pdf' || $ext == 'jpeg') {
                      
                        
                        // remove the old file from uploads folder
                        $oldfilelink = $data['img_link']; //file link from database
                        $finallink = '../uploads/' . $oldfilelink;
                        unlink($finallink);

                        if (move_uploaded_file($_FILES['dataFile']['tmp_name'], $old_path)) {
                            $insert = "UPDATE files SET title='$title', description='$description', img_link='$finalname' WHERE id=$id";
                            $result = mysqli_query($conn, $insert);
                            if ($result) {
                                echo "file is updated";
                                echo "<meta http-equiv=\"refresh\"content=\"2;URL=index.php\">";
                            } else {
                                echo "file is not updated";
                                echo "<meta http-equiv=\"refresh\"content=\"2;URL=create.php\">";
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
                <input type="text" class="form-control" name="title"  value="<?php echo $data['title']; ?>"   id="exampleInputtitle" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea class="form-control"   name="description"  id="exampleFormControlTextarea1" rows="3"><?php echo $data['description'];?></textarea>

            </div>
            <div class="mb-3">
                <label for="exampleInputitle" class="form-label">Image</label>
                <img src="../uploads/<?php echo $data['img_link']; ?>" alt="" width="100px" height="100px">
                <input type="file" class="form-control" name="dataFile" id="exampleInputtitle"   aria-describedby="emailHelp">

            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            <div class="mb-3 form-check">
            </div>
        </form>
    </div>
</section>

<?php require('../includes/footer.php'); ?>