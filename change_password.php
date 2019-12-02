<?php  
include 'db_connection.php';

if(isset($_POST["submit"]))
{
	if(!empty($_POST['cpass']) && !empty($_POST['npass'])) 
	{
		$cpass=$_POST['cpass'];  
		$npass=$_POST['npass'];  
		$con = OpenCon();
		
		$query=mysqli_query($con, "SELECT * FROM admincredentials WHERE  password='$cpass' LIMIT 1");  
		$dbusername="";
		$dbpassword="";		
		while($row=mysqli_fetch_assoc($query))  
		{  
			$dbusername=$row['username'];  
			$dbpassword=$row['password'];
		}
		if($cpass != $dbpassword)  
		{
			echo "<script>alert('Invalid password');document.location='home.php'</script>";
		}
		else 
		{
			//update query
			$sql = "UPDATE admincredentials SET password='$npass' WHERE username='$dbusername'";
			if(mysqli_query($con, $sql)){
				echo "<script>alert('Successfully updated password');document.location='home.php'</script>";	
			}
			else
			{
				echo "<script>alert('Please retry after sometime !!! server didnot respond');document.location='home.php'</script>";
			}
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
    <title>new password</title>
    <!-- Bootstrap CSS file -->
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css" >
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" >
	<link rel="stylesheet" href="style_change.css">
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
				<input type="text" required="required" maxlength="15" name="cpass"/><span class="highlight"></span><span class="bar"></span>
				<label>Current password</label>
			</div>

			<div class="group">
				<input type="password" required="required" maxlength="15" name="npass" id="myinput" /><span class="highlight"></span><span class="bar"></span>
				<label>New password</label>
				
				<div class="user_tog_set" >
					<button class="button" type="button" onclick="toggle();">see/hide</button>
				</div>
				
			</div>
			
			<div class="btn-box">
				<button class="btn btn" type="submit" name="submit" >Change</button>
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