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
//post comment
    if((isset($_POST['comment'])) && (!empty($_SESSION['username']))) {
        $image_id=$_POST['id'];
        $username = $_SESSION['username'];
        $comment = $_POST['submit_comment'];
        $test = $conn->prepare("insert into comments (image_id,username,comment) values('$image_id', '$username', '$comment' )");
        $test->execute();
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


    <?php
    $user_id=$_SESSION['id'];

    $display = $conn->prepare("SELECT * FROM images WHERE user_id='$user_id' ORDER BY id DESC");
    $display->setFetchMode(PDO::FETCH_ASSOC);
    $display->execute();
    $i = 0;
    // $j=0;
    while ($images = $display->fetch()) {
        $id=$images['id'];
        // $title=$images['title'];
        $username=$images['username'];
        $likes=$images['likes'];


        if ($i % 3 == 0) {
            ?> <tr> <?php 
        } ?>
        <div>
        <form method="post" action="gallery.php">
            <div>
                <div><?php echo "photo by: ".$username; ?></div>
                <td><img src="<?php echo $images['photo']; ?>" alt="<?php $images['title'];?>" width='500' height='400'></td>
            </div>
            <div>
                <input type="hidden" name="id" value="<?php echo $id;?>">
                <input type="submit" name="like" value="like" id="like">
                <div><?php echo $likes." likes";?><hr></div>
            </div>

            <?php
        if($i % 3 == 0) {
            ?></tr><?php
        }
    $i++; ?> 
        </form> 
        </div> <?php
    }
?>