<?php
$conn = mysqli_connect("ls-368e16b6922a409f3c8f6c38fa4222ae912f9d6d.ct5zdyhxsqlg.ap-south-1.rds.amazonaws.com", "admin", "12345678", "quiz") or die("could not connect" . mysqli_error($conn) ) ;
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
