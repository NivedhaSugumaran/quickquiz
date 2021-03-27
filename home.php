<?php 
session_start();
include "connection.php";
if (isset($_SESSION['id'])) {
$query = "SELECT * FROM questions";
$run = mysqli_query($conn , $query) or die(mysqli_error($conn));
$total = mysqli_num_rows($run);
?>
<html>
<head>
		<title>Quick quiz</title>
	
		<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   <style>
   	body {font-family: Arial, Helvetica, sans-serif;}
body {
  background: #43C6AC;  /* fallback for old browsers */
background: -webkit-linear-gradient(to left, #F8FFAE, #43C6AC);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to left, #F8FFAE, #43C6AC); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
}button {
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
	</head>
	<body>
				<div class="header">
  <a href="index.php" class="logo">Quick Quiz&nbsp;</a></header>
  <div class="header-right">
<a href="category.php">Category</a>    
    <a href="exit.php">Logout</a>
  </div>
</div>
		<main>
			<div class="container">
				<br>
				<h2 style="font-family: 'Times New Roman', Times, serif">Welcome to Quick Quiz !</h2><br>
				<p>This is just a simple quiz game to test your knowledge!</p>
				<ul><br>
				    <li><strong>Number of questions: </strong><?php echo $total; ?></li><br>
				    <li><strong>Type: </strong>Multiple Choice</li>
				</ul>
				<br><button type="button" onclick="location.href='question.php?n=1'" class="btn btn-info">Start AWS Quiz</button>
			</div>
		</main>

	</body>
</html>
<?php unset($_SESSION['score']); ?>
<?php }
else {header("location: index.php");}
?>
