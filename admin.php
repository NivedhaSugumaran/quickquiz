<?php
session_start();
include "connection.php";
if (isset($_SESSION['admin'])) {
	header("location: adminhome.php");
}
if (isset($_POST['email'])&& isset($_POST['password']))  {
                  $email= mysqli_real_escape_string($conn,$_POST['email']);
                  $adminemail='adminuser';
	$password = mysqli_real_escape_string($conn , $_POST['password']);
	$adminpass = '$2y$10$8WkSLFcoaqhJUJoqjg3K8eWixJWswsICf7FTxehKmx8hpmIKYWqju';
             if($email==$adminemail){
	if (password_verify($password , $adminpass)) {
		$_SESSION['admin'] = "active";
		header("Location: adminhome.php");
	}}
	else {
		echo  "<script> alert('Wrong Username or  password');</script>";
	}
}



?>
<html>
	<head>
		<title>Quick Quiz</title>
		<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<style>
body { 
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}
body {
  background: #43C6AC;  /* fallback for old browsers */
background: -webkit-linear-gradient(to left, #F8FFAE, #43C6AC);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to left, #F8FFAE, #43C6AC); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

}
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.header {
  overflow: hidden;
  background-color: #f1f1f1;
  padding: 20px 10px;
}

.header a {
  float: left;
  color: black;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px; 
  line-height: 25px;
  border-radius: 4px;
}

.header a.logo {
  font-size: 25px;
  font-style: italic;
  color: #43C6AC;
}

.header a:hover {
  background-color: #ddd;
  color: black;
}

.header a.active {
  background-color: dodgerblue;
  color: white;
}

.header-right {
  float: right;
}

@media screen and (max-width: 500px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
  }
  
  .header-right {
    float: none;
  }
  
}
</style>
	</head>

	<body>
		<div class="header">
  <a href="index.php" class="logo">Quick Quiz&nbsp;<i class="fa fa-pen-fancy"></i></a>
  <div class="header-right">
    <a  href="index.php">Home</a>

  </div>
</div>

		<main>
			<div style="padding-left:20px">
	        <br><br>
           <center><h2>Admin Login</h2></center>

          <div class="container">
 
    <div class="form-outline">
    	<form method="POST" action="">

    <label class="form-label" ><b>Username</b> </label>
  <input type="text" name="email" class="form-control" required="" >

<br>
<label class="form-label" ><b>Password</b> </label>


  <input type="password" name="password" class="form-control" required="" >
 
   <button type="submit" name="submit">LOGIN</button>
    
  </div>
</main>
	</body>
</html>



