<?php  
include "connection.php";
if(isset($_POST["submit"]))
{
 if($_FILES['file']['name'])
 {
  $filename = explode(".", $_FILES['file']['name']);
  if($filename[1] == 'csv')
  {
   $handle = fopen($_FILES['file']['tmp_name'], "r");
   while($data = fgetcsv($handle))
   {
 $qtype = mysqli_real_escape_string($conn, $data[0]);  
$question = mysqli_real_escape_string($conn, $data[1]);  
$ans1 = mysqli_real_escape_string($conn, $data[2]);  
$ans2 = mysqli_real_escape_string($conn, $data[3]);  
$ans3 = mysqli_real_escape_string($conn, $data[4]);  
$ans4= mysqli_real_escape_string($conn, $data[5]);
$correct_answer = mysqli_real_escape_string($conn, $data[6]);
 if($_POST['qcat']== 0)
 {
                $query = "INSERT into questions(qtype,question,ans1,ans2,ans3,ans4,correct_answer) values('$qtype','$question','$ans1','$ans2','$ans3','$ans4','$correct_answer')";
              mysqli_query($conn, $query);
 }
else if ($_POST['qcat']== 1)
{  $query = "INSERT into gcpquestions(qtype,question,ans1,ans2,ans3,ans4,correct_answer) values('$qtype','$question','$ans1','$ans2','$ans3','$ans4','$correct_answer')";
              mysqli_query($conn, $query); }
   }
   fclose($handle);
   echo "<script>alert('Import done');</script>";
   //clearstatcache();

  }
 }
}
?>  
<html>
<head>

  <title>Quick Quiz</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href= 
"https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> 
    <script src="https://kit.fontawesome.com/577845f6a5.js" 
        crossorigin="anonymous"> 
    </script> 
  
   
  <title>Quick Quiz</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
   </head>

	<body>
		<div class="header">
  <a href="index.php" class="logo">Quick Quiz&nbsp;<i class="fa fa-pen-fancy"></i></a>
  <div class="header-right">
    <a  href="adminhome.php">Home</a>
    <a href="add.php" class="start">Add Individual Question</a>
	<a href="allquestions.php" class="start">All Questions</a>
	<a href="players.php" class="start">Players</a>
    <a href="exit.php">Logout</a>
  </div>
</div>
  

 <br><center><h2 style="font-family: 'Times New Roman',Times,sans-serif;
  font-size: 25px;"><b>Welcome Admin.. Upload Questions in .csv format here</b></h2></center><br>
  <div class="container ">
    <div class="row align-items-center ">
        <div class="col-6 mx-auto">
            <div class="jumbotron">
                <form method="post" enctype="multipart/form-data">
  <label style="font-family: 'Times New Roman',Times,sans-serif;
  font-size: 20px;">Question Category: </label><br><br>
  <select class="form-control form-control-lg" style="font-family:'Times New Roman',Times,sans-serif ;font-weight:bold;font-size:20px;width:400px;"name="qcat" id="qcat">
        <option style="font-family:'Times New Roman',Times,sans-serif ;font-weight:bold;" value="0">AWS</option>
        <option style="font-family:'Times New Roman',Times,sans-serif ;font-weight:bold;"value="1">GCP</option>   
    </select>
    <br><br>
    <div class="form-group">
    
    <label style="font-family: 'Times New Roman',Times,sans-serif;
  font-size: 20px;">Select CSV File:</label><br/>
    <br><input type="file" name="file" />
    <br><br>
    <input type="submit" name="submit" value="Import" class="btn btn-primary" />
   </div>
   </div>
  </form>
            </div>
        </div>
    </div>
</div>
	
  
  </div>

  <br />
  
 </body>  
</html>

