<?php session_start(); ?>
<?php include "connection.php";
if (isset($_SESSION['admin'])) {
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Quick Quiz</title>
    <link rel="stylesheet" type="text/css" href="css/style1.css">
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
  width: normal;
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
</head>


  <body>
   <div class="header">
  <a href="index.php" class="logo">Quick Quiz&nbsp;<i class="fa fa-pen-fancy"></i></a>
  <div class="header-right">
    <a  href="index.php">Home</a>
    <a href="add.php" class="start">Add Question</a>
    <a href="allquestions.php" class="start">All Questions</a>
    <a href="players.php" class="start">Players</a>
    <a href="exit.php">Logout</a>
  </div>
</div>
   <center><button type="button" onclick="location.href='allquestions.php'" class="btn btn-light">All AWS Question</button>&nbsp;&nbsp;<button type="button" onclick="location.href='allquestions1.php'" class="btn btn-light">All GCP Question</button></center></center>
 <center><h2 style="font-family: 'Times New Roman', Times, serif"> All AWS Questions</h2></center>


  <table class="data-table">

    <thead>
      <tr>
        <th>Q.NO</th>
        <th>Question</th>
        <th>Option 1</th>
        <th>Option 2</th>
        <th>Option 3</th>
        <th>Option 4</th>
        <th>Correct Answer </th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
        
        <?php 
            
            $query = "SELECT * FROM questions ORDER BY qno ASC";
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
                echo "<td>$qno</td>";
                echo "<td>$question</td>";
                echo "<td>$option1</td>";
                echo "<td>$option2</td>";
                echo "<td>$option3</td>";
                echo "<td>$option4</td>";
                echo "<td>$Answer</td>";
                echo "<td> <a href='editquestion.php?qno=$qno'> Edit </a></td>";
        echo "<td> <a href='delete.php?qno=$qno'> Delete</a></td>";
                echo "</tr>";
             }
         }
 ?></tbody> 
 </table> 
</body>
</html>

<?php } 
else {
  header("location: admin.php");
}
?>


