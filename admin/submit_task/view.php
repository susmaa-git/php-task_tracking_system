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

              ?>
        <form action="#" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="exampleInputitle" class="form-label">Title</label>
                <input type="text" class="form-control" name="title"  value="<?php echo $data['title']; ?>"   id="exampleInputtitle"  read-only aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea class="form-control" readonly  name="description"  id="exampleFormControlTextarea1" rows="3"><?php echo $data['description'];?></textarea>

            </div>
            <div class="mb-3">
                <label for="exampleInputitle" class="form-label">Image</label>
                <img src="../uploads/<?php echo $data['img_link']; ?>" alt="" width="100px" height="100px">
                <input type="file" class="form-control" name="dataFile" id="exampleInputtitle"    read-only aria-describedby="emailHelp">

            </div>
            <div class="mb-3 form-check">
            </div>
        </form>
    </div>
</section>

<?php require('../includes/footer.php'); ?>