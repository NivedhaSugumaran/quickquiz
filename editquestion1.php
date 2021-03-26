<?php session_start(); ?>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
<?php include "connection.php";
if (isset($_SESSION['admin'])) {
  ?>
<?php 
if (isset($_GET['qno'])) {
  $qno = mysqli_real_escape_string($conn , $_GET['qno']);
  if (is_numeric($qno)) {
    $query = "SELECT * FROM gcpquestions WHERE qno = '$qno' ";
    $run = mysqli_query($conn, $query) or die(mysqli_error($conn));
    if (mysqli_num_rows($run) > 0) {
      while ($row = mysqli_fetch_array($run)) {
         $qno = $row['qno'];
                 $question = $row['question'];
                 $ans1 = $row['ans1'];
                 $ans2 = $row['ans2'];
                 $ans3 = $row['ans3'];
                 $ans4 = $row['ans4'];
                 $correct_answer = $row['correct_answer'];
      }
    }
    else {
      echo "<script> alert('error');
      window.location.href = 'allquestions1.php'; </script>" ;
    }
  }
  else {
    header("location: allquestions1.php");
  }
}
else
{
  $qno = mysqli_real_escape_string($conn , $_GET['qno']);
  if (is_numeric($qno)) {
    $query = "SELECT * FROM gcpquestions WHERE qno = '$qno' ";
    $run = mysqli_query($conn, $query) or die(mysqli_error($conn));
    if (mysqli_num_rows($run) > 0) {
      while ($row = mysqli_fetch_array($run)) {
         $qno = $row['qno'];
                 $question = $row['question'];
                 $ans1 = $row['ans1'];
                 $ans2 = $row['ans2'];
                 $ans3 = $row['ans3'];
                 $ans4 = $row['ans4'];
                 $correct_answer = $row['correct_answer'];
      }
    }
    else {
      echo "<script> alert('error');
      window.location.href = 'allquestions1.php'; </script>" ;
    }
  }
  else {
    header("location: allquestions1.php");
  }
}


?>
<?php 
if(isset($_POST['submit'])) {
  $question =htmlentities(mysqli_real_escape_string($conn , $_POST['question']));
  $choice1 = htmlentities(mysqli_real_escape_string($conn , $_POST['choice1']));
  $choice2 = htmlentities(mysqli_real_escape_string($conn , $_POST['choice2']));
  $choice3 = htmlentities(mysqli_real_escape_string($conn , $_POST['choice3']));
  $choice4 = htmlentities(mysqli_real_escape_string($conn , $_POST['choice4']));
  $correct_answer = mysqli_real_escape_string($conn , $_POST['answer']);
    $checkbox1=$_POST['op'];  
$chk="";  
foreach($checkbox1 as $chk1)  
   {  
     if($chk1=="a"){ 
        $chk .= $choice1.","; 
   }
   if($chk1=="b"){ 
        $chk .= $choice2.","; 
   }
     if($chk1=="c"){ 
        $chk .= $choice3.","; 
   }
     if($chk1=="d"){ 
        $chk .= $choice4.","; 
   }   
   }  
$chk=substr($chk,0,-1);

  $query = "UPDATE gcpquestions SET question = '$question' , ans1 = '$choice1' , ans2= '$choice2' , ans3 = '$choice3' , ans4 = '$choice4' , correct_answer = '$chk' WHERE qno = '$qno' ";
  $run = mysqli_query($conn , $query) or die(mysqli_error($conn));
  if (mysqli_affected_rows($conn) > 0 ) {
    echo "<script>alert('Question successfully updated');
    window.location.href= 'allquestions1.php'; </script> " ;
  }
  else {
    "<script>alert('error, try again!'); </script> " ;
  }
}

?>




<!DOCTYPE html>
<html>
  <head>
    <title>Quick Quiz</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
  </head>


  <body>
        <div class="header">
  <a href="index.php" class="logo">Quick Quiz&nbsp;<i class="fa fa-pen-fancy"></i></a>
  <div class="header-right">
    <a  href="index.php">Home</a>
    <a href="add.php" class="start">Add Question</a>
  <a href="allquestions1.php" class="start">All Questions</a>
  <a href="players.php" class="start">Players</a>
    <a href="exit.php">Logout</a>
  </div>
</div>

    <main>
      <div class="container">
        <h2>Edit question...</h2>
        <form method="post" action="">

        <div class="form-group">
      <label for="text">Question: </label>
    <input type="textarea" class="form-control" aria-label="With textarea" required="" value="<?php echo $question; ?>"name="question">
      
    </div>
  <div class="form-group">
      <label for="text">Question Type: </label>
    <select name="qtype" id="qtype">
  <option value="0">Single option</option>
  <option value="1">Multiple Options</option>
  
</select>
    </div>
    
      
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <div class="input-group-text">
      <input type="checkbox" aria-label="Checkbox for following text input" name="op[]" value="a">
    </div>
  </div>
  <input type="text" class="form-control" aria-label="Text input with checkbox" required="" value="<?php echo $ans1; ?>" name="choice1" >
</div>

<div class="input-group mb-3">
  <div class="input-group-prepend">
    <div class="input-group-text">
      <input type="checkbox" aria-label="Checkbox for following text input" name="op[]"  value="b">
    </div>
  </div>
  <input type="text" class="form-control" aria-label="Text input with checkbox" required="" value="<?php echo $ans2; ?>" name="choice2" >
</div>
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <div class="input-group-text">
      <input type="checkbox" aria-label="Checkbox for following text input" name="op[]" value="c">
    </div>
  </div>
  <input type="text" class="form-control" aria-label="Text input with checkbox" required="" value="<?php echo $ans3; ?>" name="choice3" >
</div>

  <div class="input-group mb-3">
  <div class="input-group-prepend">
    <div class="input-group-text">
      <input type="checkbox" aria-label="Checkbox for following text input" name="op[]" value="d">
    </div>
  </div>
  <input type="text" class="form-control" aria-label="Text input with checkbox" required="" value="<?php echo $ans4; ?>" name="choice4">

  </div>

            
            <input type="submit" name="submit" value="Submit">
          </p>
        </form>
      </div>
    </main>

    

  </body>
</html>

<?php } 
else {
  header("location: admin.php");
}
?>