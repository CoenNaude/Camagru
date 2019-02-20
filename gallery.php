<?php 
    include_once 'config/connection.php';
    include_once 'config/database.php';
    session_start(); 

    //post image
    if (isset($_POST['save'])) { 
        if (isset($_SESSION['username'])) {   
        print_r($_SESSION);
        print_r($_POST);
        echo 'awebrazz';         
            $user_id=$_SESSION['id'];
            echo $user_id;
            $username=$_SESSION['username'];
            echo $username;

            $title="PIC_".date("Y/m/d")."_".rand(1000, 1000000); //assign image title
            $photo=$_POST['image']; //name of hidden input from form
            $likes=0;     //assign default likes

            $stmt=$conn->prepare("INSERT INTO images (user_id, username, photo, title, likes) VALUES (:user_id, :username, :photo, :title, :likes)");
            $stmt->bindParam(':user_id', $user_id);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':photo', $photo);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':likes', $likes);
            echo 'awe123';
            $stmt->execute();
            echo 'awe456';
            header ("location: webcam.php");
        } elseif (empty($_SESSION['username'])) { 
            header ("location: webcam.php");
        }

    }

?>




<!DOCTYPE html>
<html>
    <head lang="en">
    <title>Gallery</title>
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
        <h1>Gallery</h1>

<?php
    $display = $conn->prepare("SELECT * FROM images ORDER BY id DESC");
    $display->setFetchMode(PDO::FETCH_ASSOC);
    $display->execute();


    $i = 0;
    // $j=0;
    while ($images = $display->fetch()) {
        $id=$images['id'];
        // $title=$images['title'];
        $username=$images['username'];
        $likes=$images['likes'];

        $display2 = $conn->prepare("SELECT * FROM comments where image_id = $id ORDER BY id ASC");
        $display2->setFetchMode(PDO::FETCH_ASSOC);
        $display2->execute();
        


        if ($i % 3 == 0) {
            ?> <tr> <?php 
        } ?>
        <div>

        <form method="post" action="editphoto.php">
            <div>
                <div><?php echo "photo by: ".$username; ?></div>
                <td><img src="<?php echo $images['photo']; ?>" alt="<?php $images['title'];?>" width='500' height='400'></td>
            </div>
            <div>
                <?php
            while ($comments = $display2->fetch()) {
            $comm_user = $comments['username'];
            $comm=$comments['comment'];
            echo $comm_user."  said:";
            echo "<br>";
            echo nl2br($comm);
            echo "<br>";
        }?>
            </div>
            <div>
                <div><input type="text" name="submit_comment" placeholder="comment" required><br><br></div>
                <input type="hidden" name="id" value="<?php echo $id;?>">
                <input type="submit" name="comment" value="comment" id="comment">
            </div>

            <?php
        if($i % 3 == 0) {
            ?></tr><?php
        }
    $i++; ?> 
        </form> 


        <form method="post" action="editphoto.php">
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

    </body>

        <?php include 'footer.php';?>   

</html>