<?php 
session_start();
if (isset($_SESSION['admin'])) {
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Quick Quiz</title>
		<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	</head>
	<style>
	body {
  background: #43C6AC;  /* fallback for old browsers */
background: -webkit-linear-gradient(to left, #F8FFAE, #43C6AC);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to left, #F8FFAE, #43C6AC); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

}	

.container {
  padding: 16px;
}

* {box-sizing: border-box;}

body { 
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
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

	<body>
		<div class="header">
  <a href="index.php" class="logo">Quick Quiz&nbsp;<i class="fa fa-pen-fancy"></i></a>
  <div class="header-right">
    <a  href="admin.php">Home</a>
    <a href="exit.php">Logout</a>

  </div>
</div>
<main>
<div class="container">
	<br>
	<h2>Welcome back, Admin</h2><br><br>
	 <center><button type="button" onclick="location.href='add.php'" class="btn btn-info btn-lg btn-block">Add Question</button></center>
        <br><br>
        <center><button type="button" onclick="location.href='addcsv.php'" class="btn btn-info btn-lg btn-block">Upload Questions(.csv)</button></center>
	<br><br>
	<center><button type="button" onclick="location.href='allquestions.php'" class="btn btn-info btn-lg btn-block">All Questions</button></center><br><br>
	<center><button type="button" onclick="location.href='players.php'" class="btn btn-info btn-lg btn-block">Players</button></center><br>
</div>
</main>
<?php } 
else {
		header("location: admin.php");
	}
?>
