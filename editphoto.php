<?php
	include_once 'config/database.php';
	include_once 'config/connection.php';
	session_start();
	?>

	
<?php
//post like
	if((isset($_POST['like'])) && (!empty($_SESSION['username']))) {
		$image_id=$_POST['id'];
		$like = $conn->prepare("UPDATE images SET likes = likes +1 WHERE id ='$image_id'");
		$like->execute();
		var_dump($_POST);
		header ("location: gallery.php");
	} else {
		header ("location: gallery.php");
	} 
//subscription email and notifications
	if((isset($_POST['update'])) && (!empty($_SESSION['username']))) {
		$username=$_POST['username'];
		$pass = hash('whirlpool',$_POST['pass']);
		$email = $_POST['email'];
		$user_id = $_SESSION['id'];
		$subscribe = $_POST['subscribe'];
		echo $user_id;
		$edit = $conn->prepare("UPDATE users SET username = '$username', pass = '$pass', email = '$email', subscribed = '$subscribe' where id = '$user_id'");
		$edit->execute();
		var_dump($_POST);
		header ("location: gallery.php");
	} else {
		header ("location: gallery.php");
	} 

// delete photo
	if(isset($_POST['delete'])){
		$image_id=$_POST['id'];

		$del=$conn->prepare("DELETE FROM images WHERE id=$image_id");
		$del->bindParam(":id",$id,PDO::PARAM_INT);
		$del->execute();
		$del=$conn->prepare("DELETE FROM comments WHERE id=$image_id");
		$del->bindParam(":id",$id,PDO::PARAM_INT);
		$del->execute();
		header ("location: profile.php");
	}

//post comment
	if((isset($_POST['comment'])) && (!empty($_SESSION['username']))) {
		$image_id=$_POST['id'];
		$comment=$_POST['text'];
		$username=$_SESSION['username'];
		
		$comm="INSERT INTO comments (username, image_id, comment)
		VALUES ('$username', '$image_id', '$comment')";
		$conn->exec($comm);

		$select = $conn->prepare("SELECT user_id FROM images WHERE id='$image_id' ");
		$select->setFetchMode(PDO::FETCH_ASSOC);
		$select->execute();
		$data=$select->fetch();
		   $r_uid=$data['user_id'];

		$select = $conn->prepare("SELECT email,subscribed FROM users WHERE id='$r_uid' ");
		$select->setFetchMode(PDO::FETCH_ASSOC);
		$select->execute();
		$data=$select->fetch();
		   $r_email=$data['email'];
		   $r_subscribed=$data['subscribed'];
		if($r_subscribed ==1 ){
		$str = "awe jyt n like".$r_email."%27";
		mail($r_email, "WHOOHOO LIFE!!!!!","YOu have a comment!!!!");
	}
		header ("location: gallery.php");
	} else {
		header ("location: gallery.php");
	}

	//upload from local dir
	if(isset($_POST['save'])) {
		$id=$_SESSION['id'];
		$username = $_SESSION['username'];
		$images = $_FILES['profile']['name'];
		$tmp_dir = $_FILES['profile']['tmp_name'];
		$imageSize = $_FILES['profile']['size'];
			$upload_dir='uploads/';
			$ext=strtolower(pathinfo($images,PATHINFO_EXTENSION));
			$valid_extensions=array("jpeg", "jpg", "png", "gif", "pdf"); 
			$up_image=rand(1000, 1000000).".".$ext; 
			$likes=0;
			$title="PIC_".date("Y/m/d")."_".rand(1000, 1000000); 

		move_uploaded_file($tmp_dir, $upload_dir.$up_image); 
		$file = file_get_contents($upload_dir.$up_image,true );
		$upload = "data:image;base64,".base64_encode($file);

		$stmt=$conn->prepare("INSERT INTO images(username, photo, title, likes, user_id) 
		VALUES (:username, :photo, :title, :likes, :user_id)");
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':photo', $upload);
		$stmt->bindParam(':title', $title);
		$stmt->bindParam(':likes', $likes);
		$stmt->bindParam(':user_id', $id);
		if ($stmt->execute()){
			?>
				<script>
				alert("Image was successfully uploaded");
				window.location.href=('profile.php');
				 </script>
				 <?php echo "awe";
		} else {
			?>
			<script>
				alert("Error");
			   window.location.href=('profile.php');
			</script>
			<?php
		}
 }
	?>

<!DOCTYPE html>
<html>
	<head lang="en">
	<title>Personal Gallery</title>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">

	</head>

	<body>
		<ul >
		<?php if(!isset($_SESSION['email'])): ?>
		<li><a href="index.php">Home</a></li>
			<li><a href="webcam.php">Webcam</a></li>
			<li><a href="gallery.php">Gallery</a></li>
			<li><a href="profile.php">Profile</a></li>
			<li><a href="login.php">Log in</a></li> 
			<?php else: ?>  
			<li><a href="index.php">Home</a></li>
			<li><a href="webcam.php">Webcam</a></li>
			<li><a href="gallery.php">Gallery</a></li>
			<li><a href="profile.php">Profile</a></li>
			<li><a href="logout.php">Logout</a></li> 
			<?php endif ?>
		</ul>
		<h1>Personal Gallery</h1>