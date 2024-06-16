<?php require('../includes/header.php'); ?>
<?php require('../includes/navbar.php'); ?>
<?php require('../includes/sidebar.php'); ?>


<section class="py-5">
    <div class="container">
        <div class="d-flex justify-content-end">
            <p class=""> <a name="" id="" class="btn btn-primary btn-sm" href="index.php" role="button">Manage task</a>
            </p>
        </div>


        <?php


        if (isset($_SESSION['id'])) {
            $id = $_SESSION['id'];
            $user_select = "SELECT * FROM users WHERE id = $id";
            $get_select = mysqli_query($conn, $user_select);
        }

        $select = "SELECT id FROM taskboard ";
        $get_select = mysqli_query($conn, $select);
        if ($get_select->num_rows > 0) {
            $row = $get_select->fetch_assoc();
            $taskboard_id = $row['id'];
        }

        ?>

        <?php


        if (isset($_POST['create'])) {
            $user_id = $id;
            $board_id = $taskboard_id;
            $tasktitle = $_POST['title'];
            $description  = $_POST['description'];
            $start_time = $_POST['start_time'];
            $end_time = $_POST['end_time'];
            if ($user_id != "" && $board_id != "" && $tasktitle != "" && $description != "" && $start_time != "" && $end_time != "") {
                $insert = "INSERT INTO tasks(user_id,board_id,title,description,start_time, end_time)VALUES('$user_id','$board_id','$tasktitle','$description','$start_time','$end_time')";
                $get_insert = mysqli_query($conn, $insert);
                if ($get_insert) {
        ?>
                    <div class="alert alert-dismissible fade show" role="alert">
                        <strong>User is added successful</strong>
                        <button type="button" class="btn-close" aria-label="close" data-bs-dismiss="alert"></button>
                    </div>

                <?php
                    echo "<meta http-equiv=\"refresh\"content=\"2;URL= index.php\">";
                } else {
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

        ?>




        <section class="py-5">
            <div class="container w-50">
                <h4>Add Tasks</h4>
                <form action="#" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="exampleInputTitle" class="form-label">Title</label>
                        <input type="text" class="form-control" id="exampleInputTitle" name="title" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label"> Description</label>
                        <input type="text" class="form-control" id="exampleFormControlTextarea1" name="description" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="starttime" class="form-label">Start time</label>
                        <input type="time" class="form-control" id="starttime" name="start_time" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="endtime" class="form-label">End</label>
                        <input type="time" class="form-control" id="endtime" name="end_time" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <!-- Button trigger modal -->

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">

                                            <?php
                                            $select = "SELECT * FROM files";
                                            $get_select = mysqli_query($conn, $select);
                                            while ($result = mysqli_fetch_array($get_select)) {
                                            ?>
                                                <style>
                                                    [type=radio]:checked+img {
                                                        outline: 3px solid red;



                                                    }

                                                    input[type=radio] {
                                                        opacity: 0;
                                                    }
                                                </style>
                                                <label class="col-lg-3 col-md-4 col-sm-6 col-12">
                                                    <input type="radio" name="data_file" value="<?php echo $result['img_link']; ?>">
                                                    <img src="<?php echo '../uploads/' . $result['img_link']; ?>" alt="" srcset="" height="100" width="100">

                                                </label>

                                            <?php
                                            }


                                            ?>


                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="selectImage()">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Choose files</label>
                    </div>
                    <div class="mb-3">
                        <input type="text" id="select_image" readonly class="form-control" name="files">
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            choose image
                        </button>

                    </div>
                    <button type="submit" class="btn btn-primary" name="create">Submit</button>
                    <div class="mb-3 form-check">
                    </div>
                </form>
            </div>
        </section>


    </div>
</section>
<script>
    function selectImage() {
        let selectimage = document.querySelector('input[name = data_file]:checked').value;
        document.getElementById('select_image').value = selectimage;
    }
</script>
<?php require('../includes/footer.php'); ?>