<?php
include '../php/connection.php';
$a_id = $_GET['id'];
$sql = "DELETE FROM package WHERE package_id = '$a_id' ";
mysqli_query($conn,$sql);
header('Location: packages.php');

?>