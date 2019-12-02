<?php  
include 'db_connection.php';

if(isset($_POST["submit"]))
{
	if(!empty($_POST['mail'])) 
	{
		$mail=$_POST['mail'];  
		
		$con = OpenCon();
		
		$query=mysqli_query($con, "SELECT * FROM admincredentials WHERE  username='$mail' LIMIT 1");  
		$dbusername="";
		$dbpassword="";		
		while($row=mysqli_fetch_assoc($query))  
		{  
			$dbusername=$row['username'];  
			$dbpassword=$row['password'];
		}
		if($mail != $dbusername)  
		{
			echo "<script>alert('Invalid mail id');document.location='login.php'</script>";
		}
		else 
		{
			//update query
			//$sql = "UPDATE admincredentials SET password='$dbpassword' WHERE username='$dbusername'";
			//if(mysqli_query($con, $sql)){
				//echo "<script>alert('Successfully sent');document.location='login.php'</script>";	
				// mailer code
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
/*			use PHPMailer\PHPMailer\PHPMailer;
			use PHPMailer\PHPMailer\SMTP;
			use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
			require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
			$mail = new PHPMailer(true);

			try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    				$mail->SMTPDebug = 0;
   				$mail->isSMTP();                                            // Send using SMTP
    				$mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    				$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    				$mail->Username   = '123sayeedaalam@gmail.com';                     // SMTP username
    				$mail->Password   = '';                               // SMTP password
   				$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
				$mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    				$mail->setFrom('123sayeedaalam@gmail.com', 'testing');
    				$mail->addAddress($dbusername, '2016cse136');     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    				$mail->isHTML(true);                                  // Set email format to HTML
    				$mail->Subject = 'UP mail testing';
    				$mail->Body    = '$dbpassword';
    				$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    				$mail->send();
    				echo 'Mail has been sent';
				} catch (Exception $e) {
    					echo "Mail could not be sent. Mailer Error: {$mail->ErrorInfo}";
				}
			}
			else
			{*/
				echo "<script>alert('Please retry after sometime !!! server didnot respond');document.location='login.php'</script>";
			//}
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
				<h5>Enter the registered mail id </br></h5>		
			</div>

			<div class="group">
				<input type="text" required="required" name="mail"  /><span class="highlight"></span><span class="bar"></span>
				<label>Mail ID</label>
				
			</div>
			
			<div class="btn-box">
				<button class="btn btn" type="submit" name="submit" >Submit</button>
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