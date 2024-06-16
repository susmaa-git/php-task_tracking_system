<?php require('../includes/header.php'); ?>
<?php require('../includes/navbar.php'); ?>
<?php require('../includes/sidebar.php'); ?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Manage files</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">FILE</li>
                <li class="breadcrumb-item active">Manage FILE</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Manage File</h5>
                        <a name="" id="" class="btn btn-primary" href="create.php" role="button">Create file</a>


                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th class="col">SN</th>
                                    <th class="col">title</th>
                                    <th class="col">description</th>
                                    <th class="col">image</th>
                                    <th class="col">Action</th>
                            </thead>
                            <tbody>
                                <?php
                                $select = "SELECT * FROM files";
                                $get_select = mysqli_query($conn, $select);
                                $i = 1;
                                while ($data = mysqli_fetch_array($get_select)) {                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $i++; ?></th>
                                        <td><?php echo $data['title']; ?></td>
                                        <td><?php echo $data['description']; ?></td>
                                        <td>
                                            <img src="../uploads/<?php echo $data['img_link']; ?>" alt="" height="100px" width="100px">
                                        </td>

                                        <td>
                                            <a href="edit.php?id=<?php echo $data['id']; ?>" class="btn btn-sm btn-primary" role="button">EDIT</a>
                                            <a href="view.php?id=<?php echo $data['id']; ?>" class="btn btn-sm btn-primary" role="button">VIEW</a>
                                            <a href="delete.php?id=<?php echo $data['id']; ?>" class="btn btn-sm btn-danger" role="button" onclick="return confirm('Do you want to delete?')">DELETE</a>

                                        </td>
                                    <?php
                                }
                                    ?>
                                    </tr>





                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->

<?php require('../includes/footer.php'); ?>