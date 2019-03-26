<?php
include '../php/connection.php';
$a_id = $_GET['id'];
$sql = "UPDATE reserve SET state = 'Approved' WHERE reserve_id = '$a_id' ";
mysqli_query($conn,$sql);
header('Location: dashboard.php');

?>