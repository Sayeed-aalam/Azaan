<?php   
session_start();  
unset($_SESSION['sess_user']);  
session_destroy();  
echo "<script>alert('Successfully logged out!!!');document.location='login.php'</script>";
?>