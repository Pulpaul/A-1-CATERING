<?php
include 'php/connection.php';
$a_id = $_GET['id'];
$sql = "DELETE FROM reserve WHERE reserve_id = '$a_id' ";
mysqli_query($conn,$sql);
header('Location: index.php');

?>