
<!DOCTYPE html>
<html>
<head>
	<title>Forgot Password in PHP & MySQL</title>
</head>
<body>
    	<form method="post" action="forgot.php">
    	    <h1>Forgot Password</h1>
   		    <div><input type="text" name="email" placeholder="Email" required><br><br></div>
   		    <div><input class="input" type="submit" name="forgot" value="Send Password"><br><br></div>
        	
        	<div><a href="login.php">&nbsp;Back to Login</a></div>
      </form>
	</div>
</body>
</html>

<?php
    include 'footer.php';
?>
