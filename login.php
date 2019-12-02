<?php  
include 'db_connection.php';

if(isset($_POST["submit"]))
{
	if(!empty($_POST['user']) && !empty($_POST['pass'])) 
	{
		$user=$_POST['user'];  
		$pass=$_POST['pass'];  
		$con = OpenCon();
		
		$query=mysqli_query($con, "SELECT * FROM admincredentials WHERE username='$user' AND password='$pass' LIMIT 1");  
		$dbusername="";
		$dbpassword="";		
		while($row=mysqli_fetch_assoc($query))  
		{  
			$dbusername=$row['username'];  
			$dbpassword=$row['password'];
		}
		if($user != $dbusername || $pass != $dbpassword)  
		{
			echo "<script>alert('Invalid username/password');document.location='login.php'</script>";
		}
		else 
		{
			session_start();  
			$_SESSION['sess_user']=$user;  
			header("Location: home.php");
		}
		CloseCon($con);
	}
}
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
	<link rel="stylesheet" href="style_login.css">
</head>
<body>
	<div>
		<nav>
		<img src="images/Presidencyuniversity.png" height="80px" >
			<ul>
				<li><pre><h1>Presidency University, Bangalore.             </h1></pre></li>
			</ul>
		</nav>
	</div>

	<div class="container">
		<form action="" method="POST">
			<div class="group">
				<input type="text" required="required" name="user"/><span class="highlight"></span><span class="bar"></span>
				<label>Username</label>
			</div>

			<div class="group">
				<input type="password" required="required" maxlength="15" name="pass" id="myinput" /><span class="highlight"></span><span class="bar"></span>
				<label>Password</label>
				
				<div class="user_tog_set" >
					<button class="button" type="button" onclick="toggle();">see/hide</button>
				</div>
				
			</div>
			
			<div class="btn-box">
				<button class="btn btn" type="submit" name="submit" >login</button>
			</div>
			
			<div class="adj-link">
				<a href="forgot_password.php" >forgot password</a>
			</div>
		</form>
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