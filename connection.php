<?php
$conn = mysqli_connect("localhost", "root", "", "php-kuiz") or die("could not connect" . mysqli_error($conn) ) ;
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
