<?php 
include_once 'config/connection.php';
include_once 'config/database.php';
session_start(); 

//post image
	if (isset($_POST['save'])) {
		if (isset($_SESSION['username'])) {
			$user_id=$_SESSION['id'];
			$username=$_SESSION['username'];
			$title="PIC_".date("Y/m/d")."_".rand(1000, 1000000); 
			$photo=$_POST['image']; 
			$likes=0;

			$stmt=$conn->prepare("INSERT INTO images (user_id, username, photo, title, likes) VALUES (:user_id, :username, :photo, :title, :likes)");
			$stmt->bindParam(':user_id', $user_id);
			$stmt->bindParam(':username', $username);
			$stmt->bindParam(':photo', $photo);
			$stmt->bindParam(':title', $title);
			$stmt->bindParam(':likes', $likes);
			$stmt->execute();
			header ("location: webcam.php");
		}
		else if (empty($_SESSION['username'])) {
			header ("location: webcam.php");
		}
	}
?>


<!DOCTYPE html>
<html>
	<head lang="en">
		<title>Gallery</title>

		<ul>
			<?php if(!isset($_SESSION['email'])): ?>
				<li><a href="index.php">Home</a></li>
				<li><a href="webcam.php">Webcam</a></li>
				<li><a href="profile.php">Profile</a></li>
				<li><a href="login.php">Login</a></li>
			<?php else: ?>
				<li><a href="index.php">Home</a></li>
				<li><a href="webcam.php">Webcam</a></li>
				<li><a href="profile.php">Profile</a></li>
				<li><a href="logout.php">Logout</a></li> 
			<?php endif ?>
		</ul>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
		<style>
			div.scroll {
				overflow: scroll;
				border-radius: 4px;
				border-radius: 4px;
				width: 100%;
				height: 70px;
			}
		</style>
	</head>
	<body>
		<h1>Gallery</h1>
		<?php
			$display = $conn->prepare("SELECT * FROM images ORDER BY id DESC");
			$display->setFetchMode(PDO::FETCH_ASSOC);
			$display->execute();
			$x = 0;
			$y=0;
			while ($images = $display->fetch()) {
				$id=$images['id'];
				// $title=$images['title'];
				$username=$images['username'];
				$likes=$images['likes'];


				if ($x % 3 == 0) {
					?> <tr> <?php
						} ?>
				<div>
					<form method="post" action="editphoto.php">
				<div>
				<div><?php echo "photo by: ".$username; ?></div>
					<td><img src="<?php echo $images['photo']; ?>" alt="<?php $images['title'];?>" width='500' height='400'></td>
				</div>
				<div>
					<input type="hidden" name="id" value="<?php echo $id;?>">
					<input type="hidden" name="comment_id" value="<?php echo $id;?>">
					<input type="submit" name="like" value="like" id="like">
					<div><?php echo $likes." likes";?><hr></div>
					<textarea type="text" name="text" maxlength="256" rows=2 cols="25" placeholder="post a comment"></textarea>
					<input type="submit" name="comment" value="post" id="submit">
				</div>
				<div class="scroll">
					<?php 
						$fetchComment=$conn->prepare("SELECT * FROM comments WHERE image_id='$id'");
						$fetchComment->setFetchMode(PDO::FETCH_ASSOC);
						$fetchComment->execute();
						while($result = $fetchComment->fetch()){
							$comment_comment=$result['comment'];
							$comment_user=$result['username'];
							?><?php echo $comment_user.": ".$comment_comment?><br><?php
							$y++;
						}
					?>
				</div>
				<?php
					if($x % 3 == 0) {
				?></tr><?php
			}
			$x++; ?> 
			</form> 
			</div> <?php } ?>
	</body>
		<?php include 'footer.php';?>
	</body>
</html>