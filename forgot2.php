
<!DOCTYPE html>
<html>
<head>
	<title>Forgot Password in PHP & MySQL</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
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
