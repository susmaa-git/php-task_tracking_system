
<?php

require('../connection/config.php');
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $select= "SELECT *FROM files where id= $id";
    $select_result= mysqli_query($conn, $select);
    $data= $select_result->fetch_assoc();
    
    $oldfilelink = $data['img_link']; //file link from database
    $finallink = '../uploads/' . $oldfilelink;
    unlink($finallink);

    $get_select="DELETE FROM files WHERE id=$id";
    $select_result = mysqli_query($conn, $get_select);
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php\">";
    
}








?>