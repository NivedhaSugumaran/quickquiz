<!DOCTYPE html>
<html lang="en">
<head>
  <title>Choose test category</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<style>
	body {
  background: #43C6AC;  /* fallback for old browsers */
background: -webkit-linear-gradient(to left, #F8FFAE, #43C6AC);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to left, #F8FFAE, #43C6AC); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

}
.card-header{
	font-size: 20px;
	font-family: "Times New Roman", Times, serif;
}
h2{
	font-family:American Typewriter, serif;
	font-weight: 100;
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
<body>
	<div class="header">
  <a href="index.php" class="logo">Quick Quiz&nbsp;<i class="fa fa-pen-fancy"></i></a>
  <div class="header-right">
    <a href="exit.php">Logout</a>
  </div>
</div>
	<div class="container">
 <center> <h2>Choose Your Cloud Category</h2>
 	<br> <br>
<div class="card" align="center" >
  <b><div class="card-header">
    Amazon Web Services</b>
  </div>
  <div class="card-body">
    
    <p class="card-text">Let's Go.</p>
    <center><input type="submit" class="btn btn-primary btn-lg" onclick="location.href='home.php'" value="AWS" name="aws">
   
  </div>
</div>
<br>

<div class="card" align="center" >
  <b><div class="card-header">
    Google Cloud Platform
  </div></b>
  <div class="card-body">
    
    <p class="card-text">Let's Go.</p>
    <center><center><input type="submit" class="btn btn-primary btn-lg" onclick="location.href='home1.php'" value="GCP" name="gcp">
 
   
  </div>
</div>

 

</body>
</html>
