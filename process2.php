<?php 
session_start();
include "connection.php";
if (isset($_SESSION['id'])) {
   
	if(!isset($_SESSION['score1'])) {
		$_SESSION['score1'] = 0;
	}
    
	if ($_POST) {
        $newtime = time();
    if ( $newtime > $_SESSION['time_up']) {
    echo "<script>alert('time up');
    window.location.href='results2.php';</script>";
}
else {
        $_SESSION['start_time'] = $newtime;
		$qno = $_POST['number1'];
        $_SESSION['quiz'] = $_SESSION['quiz'] + 1;
		//$selected_choice = $_POST['choice'];
		$userselected = $_POST['userans'];
				$chk="";  
				$storeArray = Array();
				foreach((array)$userselected as $chk1)  
				   {  
					  
						$chk .= $chk1.","; 
				   } 
					
				$chk=substr($chk,0,-1);
				$user=$chk;
												
 			 												
		


		$selected_choice = $user;
		$nextqno = $qno+1;
	

		$query = "SELECT correct_answer FROM gcpquestions WHERE qno= '$qno' ";

    
    $run = mysqli_query($conn , $query) or die(mysqli_error($conn));
        if(mysqli_num_rows($run) > 0 ) {
        	$row = mysqli_fetch_array($run);
        	$correct_answer = $row['correct_answer'];
			
        }
        if ($correct_answer == $selected_choice) {
        	$_SESSION['score1']++;
        //$run = mysqli_query($conn , $sample) or die(mysqli_error($conn));
    
		}

        $query1 = "SELECT * FROM gcpquestions ";
        $run = mysqli_query($conn , $query1) or die(mysqli_error($conn));
        $totalqn = mysqli_num_rows($run);

        if ($qno == $totalqn) {
        	header("location: results2.php");
        }
        else {
       	header("location: question2.php?q=".$nextqno);
       }
		
    
 
		
    
}
}
else {
    header("location: home1.php");
}
}
else {
	header("location: home1.php");
}
if(isset($_POST['prev'])) { 
	$qno = $_POST['number1'];
		$prevqno = $qno-1;
            header("location: question2.php?q=".$prevqno);
        } 

?>
