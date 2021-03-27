<?php
if(isset($_POST["qno"]) && !empty($_POST["qno"])){
    require_once "connection.php";
    $sql = "DELETE FROM questions WHERE qno = ?";
    if($stmt = mysqli_prepare($conn, $sql)){
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        $param_id = trim($_POST["qno"]);
        if(mysqli_stmt_execute($stmt)){
            echo '<script> alert(" Records deleted successfully. ");</script>';
            header("location: allquestions.php");
            exit();
        }
	else
	{
		echo '<script>alert("failed")</script>';
	
	}
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
	} else{if(empty(trim($_GET["qno"]))){header("location: allquestions.php");
        exit();
    }
}}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>Delete Record</h1>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-danger fade in">
                            <input type="hidden" name="qno" value="<?php echo trim($_GET["qno"]); ?>"/>
                            <p>Are you sure you want to delete this record?</p><br>
                            <p>
                                <input type="submit" value="Yes" class="btn btn-danger">
                                <a href="allquestions.php" class="btn btn-default">No</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
