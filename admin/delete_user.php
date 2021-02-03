<?php
include('../functions.php');
$sql = "DELETE FROM users WHERE id='" . $_GET["id"] . "'";
mysqli_query($db,$sql);
echo 'Deleted successfully.';
header("Location:home.php");
?>
