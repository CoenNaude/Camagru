<?php
    include_once 'config/database.php';
    include_once 'config/connection.php';
    session_start();

?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <head lang="en">
    <title>Webcam</title>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <style>

div.booth {
    width: 400px;
    height: 40%:;
    background-color:green;
    border: 5px solid rgb(0, 0, 0);
    /* margin: 0 auto; */
}
.dropbtn {
    background-color: #3498DB;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
    background-color: #2980B9;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}

.dropdown-content button img
{
    width : 10vw;
    height : 8vh;
}
.div {
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    background-color: #58C0ED;;
    color: white;
    text-align: center;
}
</style>
    </head>
    <body>
        <ul class="navbar-nav mr-auto">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.php">Camagru</a>
                <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery </a></li>&nbsp;
                <li class="nav-item"><a class="nav-link" href="profile.php">Profile </a></li>&nbsp;
            <?php if(!isset($_SESSION['email'])): ?>
                <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>&nbsp;
            <?php else: ?>
                <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>&nbsp;
            <?php endif ?>
        </ul>
        <div >
    <video id="video" width="400" height="300" autoplay="true" ondrop="drop(event)"></video>
    <<canvas id="filters" width="400" height="300"></canvas> -->

    <div>
        <button onclick="myFunction()">Filters</button>
      <div>
                <button  onclick="add_effect(0);"><img height = "50" src="images/filters/alien.png"/></button>
                <button  onclick="add_effect(1);"><img height = "50" src="images/filters/bnb.png"/></button>
                <button  onclick="add_effect(2);"><img height = "50" src="images/filters/just_do_it.png"/></button>
                <button  onclick="add_effect(3);"><img height = "50" src="images/filters/pa.png"/></button>
                <button  onclick="add_effect(4);"><img height = "50" src="images/filters/sj.png"/></button>
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
        <?php include 'footer.php';?>
    </body>
</html>