<?php
include "main.php";
$id=$_GET['d_id'];
$sql="delete from users where id=$id";
if($conn->query($sql)){
#die("sucess");
echo"<script>alert('User deleted succesfully');</script>";
echo '<META HTTP-EQUIV="Refresh" Content="0.5; URL=main.php">';
}
else{
die ('error'.$conn->error);
}

?>