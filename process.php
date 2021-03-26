<?php 
session_start();
include "connection.php";
if (isset($_SESSION['id'])) {
   
	if(!isset($_SESSION['score'])) {
		$_SESSION['score'] = 0;
	}
    
	if ($_POST) {
        $newtime = time();
    if ( $newtime > $_SESSION['time_up']) {
    //echo "<script>alert('time up');
//window.location.href='results.php';</script>";
}
else {
        $_SESSION['start_time'] = $newtime;
		$qno = $_POST['number'];
        $_SESSION['quiz'] = $_SESSION['quiz'] + 1;
		$selected_choice = $_POST['userans'];
		$nextqno = $qno+1;
		$chk="";  
				$storeArray = Array();
				foreach((array)$selected_choice as $chk1)  
				   {  
					  
						$chk .= $chk1.","; 
				   } 
					
				$chk=substr($chk,0,-1);
				$user=$chk;
								

		$query1 = "SELECT correct_answer FROM questions WHERE qno= '$qno' ";
        $run1 = mysqli_query($conn , $query1) or die(mysqli_error($conn));
        if(mysqli_num_rows($run1) > 0 ) {
        	$row = mysqli_fetch_array($run1);
        	$correct_answer = $row['correct_answer'];
        }
        if ($correct_answer == $user) {
        	$_SESSION['score']++;
        }

        $query2 = "SELECT * FROM questions ";
        $run1 = mysqli_query($conn , $query2) or die(mysqli_error($conn));
        $totalqn = mysqli_num_rows($run1);

        if ($qno == $totalqn) {
        	header("location: results.php");
        }
        else {
        	header("location: question.php?n=".$nextqno);
        }
		
    
 
		
    
}
}
else {
    header("location: home.php");
}
}
else {
	header("location: home.php");
}
if(isset($_POST['prev'])) { 
	$qno = $_POST['number'];
		$prevqno = $qno-1;
            header("location: question.php?n=".$prevqno);
        } 

?>
