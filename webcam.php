<?php
    include_once 'config/database.php';
    include_once 'config/connection.php';
    session_start();

?>

<!DOCTYPE html>
<html>
    <head lang="en">
    <title>Home</title>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        <ul>
        <?php if(!isset($_SESSION['email'])): ?>
        <li><a href="index.php">Home</a></li>
            <li><a href="gallery.php">Gallery</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="login.php">Log in</a></li>
            <div><h1>Camagru</h1></div>
            <?php else: ?>  
            <li><a href="index.php">Home</a></li>
            <li><a href="gallery.php">Gallery</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="./resource/logout.php">Logout</a></li> 
            <div><h1>Camagru</h1></div> 
            <?php endif ?>
        </ul>

<div>
    <video id="video" width="400" height="300" autoplay="true" ondrop="drop(event)"></video>
    <!-- <canvas id="filters" width="400" height="300"></canvas> -->

    <div>
        <button onclick="myFunction()">Filters</button>
            <div id="myDropdown" class="dropdown-content">
                <button  onclick="add_effect(0);"><img src="images/filters/12.png"/></button>
                <button  onclick="add_effect(1);"><img src="images/filters/crown.png"/></button>
                <button  onclick="add_effect(2);"><img src="images/filters/om.png"/></button>
                <button  onclick="add_effect(3);"><img src="images/filters/Pokeball.png"/></button>
                <button  onclick="add_effect(4);"><img src="images/filters/wunhunnit.png"/></button>
                <button  onclick="add_effect(5);"><img src="images/filters/leaf.png"/></button>
                <button  onclick="add_effect(6);"><img src="images/filters/dealwithit.png"/></button>
                <button  onclick="add_effect(7);"><img src="images/filters/jay.png"/></button>
                <button  onclick="add_effect(8);"><img src="images/filters/thug_life.png"/></button>
            </div>
    </div>
    <button id ="capture" onclick="snap();">Take Photo</button>
    <canvas id="filters" width="400" height="300"></canvas>
    <canvas id="canvas" width="400" height="300"></canvas>

    <form action="gallery.php" method="post">
        <input id="camera" type="hidden" name="image">
        <input type=submit name="save" value="save">
    </form>
 </div>
 
 <script>
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
         <script src="./js/camera.js"></script>

         <div class="footer">
            <p>Copyright &copy; gdaames - Wethinkcode_- <?php echo date('Y') ?>, All rights reserved.</p>
    </div>
    </body>
</html>