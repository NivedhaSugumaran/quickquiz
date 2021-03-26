<?php 
session_start();
include "connection.php";

if (isset($_SESSION['id'])) {
	
	if (isset($_GET['n']) && is_numeric($_GET['n'])) {
	        $qno = $_GET['n'];
	        if ($qno == 1) {
	        	$_SESSION['quiz'] = 1;
	        }
	        }
			

	        else {
	        	header('location: question.php?n='.$_SESSION['quiz']);
	        } 
	        if (isset($_SESSION['quiz']) ) {
			$query = "SELECT * FROM questions WHERE qno = '$qno'" ;
			$run = mysqli_query($conn , $query) or die(mysqli_error($conn));
			if (mysqli_num_rows($run) > 0) {
				$row = mysqli_fetch_array($run);
				$qno = $row['qno'];
                 $question = $row['question'];
                 $ans1 = $row['ans1'];
                 $ans2 = $row['ans2'];
                 $ans3 = $row['ans3'];
                 $ans4 = $row['ans4'];
                 $correct_answer = $row['correct_answer'];
                 $_SESSION['quiz'] = $qno;
                 $checkqsn = "SELECT * FROM questions" ;
                 $runcheck = mysqli_query($conn , $checkqsn) or die(mysqli_error($conn));
                 $countqsn = mysqli_num_rows($runcheck);
                 $time = time();
                 $_SESSION['start_time'] = $time;
                 $allowed_time = $countqsn * 40;
                 $_SESSION['time_up'] = $_SESSION['start_time'] + ($allowed_time * 600) ;
                 

			}
			else {
				echo "<script> alert('something went wrong');
			window.location.href = 'process.php'; </script> " ;
			}
		}
		else {
			echo "session of quiz".$_SESSION['quiz'];
			echo "qno".$qno;
		//echo "<script> alert('goin to prev');
			//window.location.href = 'home.php'; </script> " ;
	}
?>
<?php 
$total = "SELECT * FROM questions ";
$run = mysqli_query($conn , $total) or die(mysqli_error($conn));
$totalqn = mysqli_num_rows($run);

?>
<html>
	<head>
		<title>Quick Quiz</title>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   <style>
   	body {font-family: Arial, Helvetica, sans-serif;}
body {
  background: #43C6AC;  /* fallback for old browsers */
background: -webkit-linear-gradient(to left, #F8FFAE, #43C6AC);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to left, #F8FFAE, #43C6AC); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

}button {
  background-color: black;
  color: white;
  padding: 10px 10px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width:normal;
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
  .previous {
  background-color: #f1f1f1;
  color: black;
}

  
}
   </style>
	</head>

	<body>
		<div class="header">
  <a href="index.php" class="logo">Quick Quiz&nbsp;<i class="fa fa-pen-fancy"></i></a>
  <div class="header-right">
    <a  href="index.php">Home</a>
    <a href="exit.php">Logout</a>
  </div>
</div>
<br>&nbsp;&nbsp;&nbsp;<div class="container">
<div class="align-items-center">
  
    <div class="item active">
      <div class="col-md-10 col-xs-10 "></div>
      <div class="col-md-15 col-xs-15">
        <div class="panel panel-primary">
          <div class="panel-heading">
        <div class= "current"><h3>Question <?php echo $qno; ?> of <?php echo $totalqn; ?></h3></div>
        <p style="font-size: 20px"class="question"><?php echo $question; ?></p>
        <form method="post" action="process.php">
        
          </div>
          <div class="panel-body" style="font-size: 20px;">
          <?php if($row['qtype']==0){?>
  <input required type="radio" name="userans[]" value="<?php echo $row['ans1'];?>">&nbsp;<?php echo $row['ans1']; ?><br>
  <input required type="radio" name="userans[]" value="<?php echo $row['ans2'];?>">&nbsp;<?php echo $row['ans2'];?><br>
  <input required type="radio" name="userans[]" value="<?php echo $row['ans3'];?>">&nbsp;<?php echo $row['ans3']; ?><br>
  <input required type="radio" name="userans[]" value="<?php echo $row['ans4'];?>">&nbsp;<?php echo $row['ans4']; ?><br>
  <?php } else if($row['qtype']==1){?> 
  <input  type="checkbox" name="userans[]" value="<?php echo $row['ans1'];?>">&nbsp;<?php echo $row['ans1']; ?><br>
  <input  type="checkbox" name="userans[]" value="<?php echo $row['ans2'];?>">&nbsp;<?php echo $row['ans2'];?><br>
  <input  type="checkbox" name="userans[]" value="<?php echo $row['ans3'];?>">&nbsp;<?php echo $row['ans3']; ?><br>
  <input  type="checkbox" name="userans[]" value="<?php echo $row['ans4'];?>">&nbsp;<?php echo $row['ans4']; ?><br>

<?php 
 }?>
 <br><br>
 <div class="panel-footer">
          <?php 
          if($qno>1)
          {
           echo'<button type="submit" name="prev">Prev</button>';
          }
          ?>
          
          <button  type="submit" style="float:right;" value="Next">Next</button>
        <input type="hidden" name="number" value="<?php echo $qno;?>">
          

            
  </div>  
</div>
</body>
</html>

<?php } 
else {
	header("location: home.php");
}
?>