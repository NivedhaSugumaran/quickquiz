<?php session_start();?>
<?php include "connection.php";
?>
<html>
<head>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<style>

@charset "UTF-8";
@import url(https://fonts.googleapis.com/css?family=Open+Sans:300,400,700);

body {
  font-family: 'Open Sans', sans-serif;
  font-weight: 300;
  line-height: 1.42em;
  color:black;
  
  background: #43C6AC;  
background: -webkit-linear-gradient(to left, #F8FFAE, #43C6AC);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to left, #F8FFAE, #43C6AC);
}

h1 {
  font-size:2em; 
  font-weight: 400;
  line-height:1em;
  text-align: center;
  color: #4DC3FA;
}

h2 {
  font-size:1em; 
  font-weight: 200;
  text-align: center;
  display: block;
  line-height:1em;
  padding-bottom: 2em;
  color: #FB667A;
}

h2 a {
  font-weight: 700;
  text-transform: uppercase;
  color: #FB667A;
  text-decoration: none;
}

.blue { color: #185875; }
.yellow { color: #FFF842; }

.container th h1 {
	  font-weight: normal;
	  font-size: 1em;
  text-align: left;
  color: #185875;
}

.container td {
	  font-weight: normal;
	  font-size: 1em;
  -webkit-box-shadow: 0 2px 2px -2px #0E1119;
	   -moz-box-shadow: 0 2px 2px -2px #0E1119;
	        box-shadow: 0 2px 2px -2px #0E1119;
}

.container {
	  text-align: left;
	  overflow: hidden;
	  width: 100%;
	  margin: 0 auto;
  display: table;
  padding: 0 0 8em 0;
}

.container td, .container th {
	  padding-bottom: 1%;
	  padding-top: 2%;
    
}

/* Background-color of the odd rows */
.container tr:nth-child(odd) {
	  background-color: #ccffee;
}

/* Background-color of the even rows */
.container tr:nth-child(even) {
	  background-color:  #f2f2f2;
}

.container th {
	  background-color:   #d1e0e0;
}

.container td:first-child { color: #FB667A; }

.container tr:hover {
   background-color: #ffffb3;
-webkit-box-shadow: 0 6px 6px -6px #0E1119;
	   -moz-box-shadow: 0 6px 6px -6px #0E1119;
	        box-shadow: 0 6px 6px -6px #0E1119;
}

.container td:hover {
  background-color: #e6ffe6;
  color: #403E10;
  font-weight: bold;
  
  box-shadow: #7F7C21 -1px 1px, #7F7C21 -2px 2px, #7F7C21 -3px 3px, #7F7C21 -4px 4px, #7F7C21 -5px 5px, #7F7C21 -6px 6px;
  transform: translate3d(6px, -6px, 0);
  
  transition-delay: 0s;
	  transition-duration: 0.4s;
	  transition-property: all;
  transition-timing-function: line;
}

@media (max-width: 800px) {
.container td:nth-child(4),
.container th:nth-child(4) { display: none; }
}
.header {
  overflow: hidden;
  background-color: #f1f1f1;
  padding: 10px 10px;
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
<div class="header">
  <a href="index.php" class="logo">Quick Quiz&nbsp;<i class="fa fa-pen-fancy"></i></a>
  <div class="header-right">
    <a  href="home1.php">Home</a>
        <a href="exit.php">Logout</a>
  </div>
&nbsp;</head>
<body>

  
  	
</div>
<h1><span class="blue">GCP ANSWERS</span></h1> 
</br>
<h2 class="blue">YOUR SCORE : <?php 
		$email=$_SESSION['email'];
		//$query = "SELECT score1 from users where email='$email'";
		//$run = mysqli_query($conn , $query) or die(mysqli_error($conn));
		$row= $_SESSION['score1'];
		echo $row;?>
<br>
	<?php	echo $_SESSION['email']; ?>
 		</h2>
		 
                   <center>  <input type="submit" name="generate_pdf"  class="btn btn-success" onclick="location.href='trial.php?q'"  value="Generate PDF" />  </center>
                    <br>
                   
	
<table class="container">
	<thead>
		<tr>
			<th><h1 style="font-size:25px;">Qno&nbsp;&nbsp;</h1></th>
			<th><h1 style="font-size:25px;"><center>Question</center></h1></th>
			<th><h1 style="font-size:25px;"><center>A</center></h1></th>
			<th><h1 style="font-size:25px;"><center>B</center></h1></th>
			<th><h1 style="font-size:25px;"><center>C</center></h1></th>
	        <th><h1 style="font-size:25px;"><center>D</center></h1></th>
			<th><h1 style="font-size:25px;"><center>Correct Answer</center></h1></th>
	
		</tr>
	</thead>
	<tbody>
	  <?php 
            
            $query = "SELECT * FROM gcpquestions ORDER BY qno ASC";
			//$query = "SELECT * FROM questions ORDER BY qid DESC";

            $select_questions = mysqli_query($conn, $query) or die(mysqli_error($conn));
            if (mysqli_num_rows($select_questions) > 0 ) {
            while ($row = mysqli_fetch_array($select_questions)) {
			
                $qno = $row['qno'];
                $question = $row['question'];
                $option1 = $row['ans1'];
                $option2 = $row['ans2'];
                $option3 = $row['ans3'];
                $option4 = $row['ans4'];
                $Answer = $row['correct_answer'];
                echo "<tr>";
			
                echo "<td>	$qno</td>";
                echo "<td>$question</td>";
                echo "<td>$option1</td>";
                echo "<td>$option2</td>";
                echo "<td>$option3</td>";
                echo "<td>$option4</td>";
                echo "<td>$Answer</td>";
               


              
                echo "</tr>";
             }
         }
        ?>
	
	
	</tbody>
</table>
</body>
</html>