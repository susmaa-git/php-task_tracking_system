<?php require('../connection/config.php');?>
<?php
if(isset($_GET['id'])){
$id = $_GET['id'];
$delete = "DELETE FROM users WHERE id = $id";
$get_delete = mysqli_query($conn, $delete);
echo "<meta http-equiv=\"refresh\"content=\"2;URL = index.php\">";

}

?>