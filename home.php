<?php  

?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <title>Industrial Practice Administrative</title>
    <!-- Bootstrap CSS file -->
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css" >
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" >
	<link rel="stylesheet" href="style_home.css">
</head>
<body>
	<div>
	<nav>
	<img src="images/Presidencyuniversity.png" height="80px" >
		<ul>
			<li><pre><h1>Presidency University, Bangalore.              </h1></pre></li>
		</ul>
	</nav>
	</div>
	<h2>IndustrialPracctice Management System</h2>
	
	<div class="sidenav">
	  <a href="#">Home</a>
	  <a href="change_mail.php" >Change mail id</a>
	  <a href="change_password.php" >Change password</a>
	  <a href="logout.php">Logout</a>
	</div>
	
</body>
<script>
	function toggle() {
		var x = document.getElementById("myinput");
		if (x.type === "password") {
			x.type = "text";
		} else {
			x.type = "password";
		}
	}
</script>
</html>